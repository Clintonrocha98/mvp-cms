<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Dividers;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class DividerBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'divider';
    }

    public static function label(): string
    {
        return 'Divisor';
    }

    public static function schema(): array
    {
        return DividerSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return DividerData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.divider.'.$variant;
    }
}
