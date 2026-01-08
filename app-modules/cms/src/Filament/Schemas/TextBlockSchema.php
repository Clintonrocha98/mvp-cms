<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Filament\Schemas;

use ClintonRocha\CMS\Contracts\BlockSchema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;

final class TextBlockSchema implements BlockSchema
{
    public static function schema(): array
    {
        return [
            Select::make('data.variant')
                ->label('Tipo de texto')
                ->options([
                    'simple' => 'Texto simples',
                    'rich' => 'Texto rico',
                ])
                ->default('simple')
                ->required()
                ->live()
                ->afterStateUpdated(fn(Select $component) => $component
                    ->getContainer()
                    ->getComponent('textVariantFields')
                    ->getChildSchema()
                    ->fill()
                ),

            Select::make('data.width')
                ->label('Largura')
                ->options([
                    'narrow' => 'Estreita',
                    'normal' => 'Normal',
                    'wide' => 'Larga',
                ])
                ->required()
                ->default('normal'),

            Select::make('data.align')
                ->label('Alinhamento')
                ->options([
                    'left' => 'Esquerda',
                    'center' => 'Centralizado',
                ])
                ->required()
                ->default('left'),

            Grid::make()
                ->schema(fn(Get $get): array => match ($get('data.variant')) {
                    'rich' => [
                        RichEditor::make('data.text')
                            ->label('Conteúdo')
                            ->required(),
                    ],
                    default => [
                        Textarea::make('data.text')
                            ->label('Conteúdo')
                            ->rows(6)
                            ->required(),
                    ],
                })
                ->key('textVariantFields'),

        ];

    }
}
