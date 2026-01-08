<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeBlockCommand extends Command
{
    protected $signature = 'cms:make-block
        {name : Block name (StudlyCase)}
        {--variants= : Command separated variants (ex: default,grid)}
        {--force : Overwrite existing block}';

    protected $description = 'Create a new CMS block';

    private array $createdFiles = [];

    public function handle(Filesystem $files): int
    {
        $name = Str::studly($this->argument('name'));
        $slug = Str::kebab($name);

        $blockPath = base_path("app-modules/cms/src/Blocks/{$name}");
        $viewPath = base_path("app-modules/cms/resources/views/components/blocks/{$slug}");

        if ($files->exists($blockPath) && !$this->option('force')) {
            $this->components->error("Block {$name} already exists.");
            return self::FAILURE;
        }

        $variants = $this->option('variants')
            ? array_map('trim', explode(',', $this->option('variants')))
            : ['default'];

        $files->makeDirectory($blockPath, 0755, true);
        $files->makeDirectory($viewPath, 0755, true);

        $this->makeFromStub($files, 'block.stub', "{$blockPath}/{$name}Block.php", [
            'name' => $name,
            'slug' => $slug,
        ]);

        $this->makeFromStub($files, 'data.stub', "{$blockPath}/{$name}Data.php", [
            'name' => $name,
        ]);

        $this->makeFromStub($files, 'schema.stub', "{$blockPath}/{$name}Schema.php", [
            'name' => $name,
            'slug' => $slug,
        ]);

        foreach ($variants as $variant) {
            $this->makeFromStub(
                $files,
                'view.stub',
                "{$viewPath}/{$variant}.blade.php",
                [
                    'name' => $name,
                    'slug' => $slug,
                    'variant' => $variant,
                ]
            );
        }

        $this->components->info("CMS block {$name} created successfully.");
        $this->line('');
        $this->line('Created files:');

        foreach ($this->createdFiles as $file) {
            $this->line('  • '.$file);
        }

        return self::SUCCESS;
    }

    protected function makeFromStub(
        Filesystem $files,
        string $stub,
        string $target,
        array $data
    ): void {
        $stubPath = base_path("app-modules/cms/stubs/{$stub}");

        $content = $files->get($stubPath);

        foreach ($data as $key => $value) {
            $content = str_replace('{{ '.$key.' }}', $value, $content);
        }

        $files->put($target, $content);
        $this->createdFiles[] = $this->relativePath($target);
    }

    protected function relativePath(string $path): string
    {
        return str_replace(base_path().DIRECTORY_SEPARATOR, '', $path);
    }
}
