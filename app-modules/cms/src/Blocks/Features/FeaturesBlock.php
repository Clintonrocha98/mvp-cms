<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Features;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class FeaturesBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'features';
    }

    public static function label(): string
    {
        return 'Recursos';
    }

    public static function schema(): array
    {
        return FeaturesSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return FeaturesData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.features.'.$variant;
    }
}
