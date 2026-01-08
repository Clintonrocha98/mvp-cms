<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Dividers;

use ClintonRocha\CMS\Contracts\BlockSchema;
use ClintonRocha\CMS\Registry\BlockRegistry;
use Filament\Forms\Components\Select;

final class DividerSchema implements BlockSchema
{
    public static function schema(): array
    {
        return [
            Select::make('data.variant')
                ->label('Estilo')
                ->options(fn () => BlockRegistry::resolve('divider')::variants())
                ->default('line')
                ->required(),

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
