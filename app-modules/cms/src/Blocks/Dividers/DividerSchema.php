<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Dividers;

use ClintonRocha\CMS\Contracts\BlockSchema;
use ClintonRocha\CMS\Trait\HasVariants;
use Filament\Forms\Components\Select;

final class DividerSchema implements BlockSchema
{
    use HasVariants;

    public static function schema(): array
    {
        return [
            self::variantField('divider'),

            Select::make('data.spacing')
                ->label('Margem vertical')
                ->options([
                    'sm' => 'Pequena',
                    'md' => 'Média',
                    'lg' => 'Grande',
                ])
                ->default('md'),
        ];
    }
}
