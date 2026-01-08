<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Footer;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class FooterBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'footer';
    }

    public static function label(): string
    {
        return 'Rodapé';
    }

    public static function schema(): array
    {
        return FooterSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return FooterData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.footer.'.$variant;
    }
}
