<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Contracts;

interface BlockDefinition
{
    public static function type(): string;

    public static function label(): string;

    public static function schema(): array;

    public static function fromModel(array $data): BlockData;

    public static function view(string $variant): string;
}
