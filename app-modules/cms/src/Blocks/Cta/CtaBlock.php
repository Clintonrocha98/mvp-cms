<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Cta;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class CtaBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'cta';
    }

    public static function variants(): array
    {
        return [
            'solid' => 'Fundo sólido',
            'outline' => 'Fundo claro',
        ];
    }

    public static function label(): string
    {
        return 'Call to Action';
    }

    public static function schema(): array
    {
        return CtaSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return CtaData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.cta.'.$variant;
    }
}
