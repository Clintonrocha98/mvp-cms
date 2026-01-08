<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Form;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class FormBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'form';
    }

    public static function label(): string
    {
        return 'Formulário';
    }

    public static function schema(): array
    {
        return FormSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return FormData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.form.'.$variant;
    }
}
