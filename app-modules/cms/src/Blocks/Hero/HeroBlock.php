<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Hero;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class HeroBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'hero';
    }

    public static function variants(): array
    {
        return [
            'center' => 'Centralizado',
            'split' => 'Texto + Imagem',
        ];
    }

    public static function label(): string
    {
        return 'Hero';
    }

    public static function schema(): array
    {
        return HeroSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return HeroData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms.blocks.hero.'.$variant;
    }
}
