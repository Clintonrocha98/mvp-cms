<?php

namespace App\Filament\Schemas;

use App\Contract\BlockSchema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class AnchorsBlockSchema implements BlockSchema
{

    public static function schema(): array
    {
        return [
            Select::make('data.variant')
                ->label('Estilo')
                ->options([
                    'menu' => 'Menu horizontal',
                    'list' => 'Lista',
                    'buttons' => 'Botões',
                ])
                ->default('menu')
                ->required(),

            Repeater::make('data.items')
                ->label('Links')
                ->schema([
                    TextInput::make('label')
                        ->label('Texto')
                        ->required(),

                    TextInput::make('target')
                        ->label('ID do destino (sem #)')
                        ->helperText('Ex: features, pricing, contato')
                        ->required(),
                ])
                ->minItems(1)
                ->required(),
        ];
    }
}
