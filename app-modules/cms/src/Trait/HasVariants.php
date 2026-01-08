<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Trait;

use ClintonRocha\CMS\Registry\BlockRegistry;
use Filament\Forms\Components\Select;

trait HasVariants
{
    protected static function variantField(
        string $blockType
    ): Select {
        return Select::make('data.variant')
            ->label('Components')
            ->options(fn () => BlockRegistry::variants($blockType))
            ->required();
    }
}
