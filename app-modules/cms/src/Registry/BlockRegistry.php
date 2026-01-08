<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Registry;

use ClintonRocha\CMS\Contracts\BlockDefinition;
use Illuminate\Support\Str;
use InvalidArgumentException;

final class BlockRegistry
{
    public static function resolve(string $type): BlockDefinition
    {
        $studly = Str::studly($type);

        $class = sprintf('ClintonRocha\CMS\Blocks\%s\%sBlock', $studly, $studly);

        throw_unless(class_exists($class), InvalidArgumentException::class, sprintf('Block %s não encontrado', $type));

        return new $class;
    }

    public static function variants(string $type): array
    {
        $path = base_path(
            'app-modules/cms/resources/views/components/blocks/'.$type
        );

        if (! is_dir($path)) {
            return [];
        }

        return collect(glob($path.'/*.blade.php'))
            ->mapWithKeys(function ($file): array {
                $variant = basename($file, '.blade.php');

                return [
                    $variant => Str::headline($variant),
                ];
            })
            ->all();
    }

    public static function options(): array
    {
        $base = base_path('app-modules/cms/src/Blocks');

        return collect(glob($base.'/*/*Block.php'))
            ->mapWithKeys(function (string $path): array {
                /** @var BlockDefinition $class */
                $class = self::classFromPath($path);

                return [
                    $class::type() => $class::label(),
                ];
            })
            ->all();
    }

    private static function classFromPath(string $path): string
    {
        $path = realpath($path);

        $srcPath = realpath(base_path('app-modules/cms/src'));

        $relative = str_replace($srcPath.DIRECTORY_SEPARATOR, '', $path);

        return 'ClintonRocha\\CMS\\'.str_replace(
            [DIRECTORY_SEPARATOR, '.php'],
            ['\\', ''],
            $relative
        );
    }
}
