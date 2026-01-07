<?php

namespace App\Filament\Schemas;

use App\Contract\BlockSchema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

final class FormBlockSchema implements BlockSchema
{

    public static function schema(): array
    {
        return [
            Select::make('data.form_id')
                ->label('Formulário')
                ->options([
                    'contact' => 'Contato',
                ])
                ->required(),

            TextInput::make('data.title')
                ->label('Título')
                ->required(),

            Textarea::make('data.description')
                ->label('Descrição'),

            TextInput::make('data.submit_label')
                ->label('Texto do botão')
                ->default('Enviar'),

            Select::make('data.variant')
                ->label('Layout')
                ->options([
                    'card' => 'Card',
                    'inline' => 'Inline',
                ])
                ->default('card'),
        ];

    }
}
