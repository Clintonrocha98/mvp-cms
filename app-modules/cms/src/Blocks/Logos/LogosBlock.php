<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Logos;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class LogosBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'logos';
    }

    public static function label(): string
    {
        return 'Logos de Clientes';
    }

    public static function schema(): array
    {
        return LogosSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return LogosData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.logos.'.$variant;
    }
}
