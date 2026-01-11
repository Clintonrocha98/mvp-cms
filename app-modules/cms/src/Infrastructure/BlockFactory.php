<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Infrastructure;

use ClintonRocha\CMS\Contracts\BlockDefinition;
use Illuminate\Support\Str;
use InvalidArgumentException;

final class BlockFactory
{
    private static array $instances = [];

    public static function make(string $type): BlockDefinition
    {
        if (isset(self::$instances[$type])) {
            return self::$instances[$type];
        }

        $studly = Str::studly($type);

        $nameSpace = rtrim((string) config('cms.blocks.namespace', 'ClintonRocha\\CMS\\Blocks'), '\\');

        $class = $nameSpace.'\\'.$studly.'\\'.$studly.'Block';

        if (!class_exists($class)) {
            throw new InvalidArgumentException(sprintf('Block %s não encontrado', $type));
        }


        return self::$instances[$type] = new $class;
    }
}
