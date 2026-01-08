<?php

namespace ClintonRocha\CMS;

use ClintonRocha\CMS\Filament\Resources\Pages\PageResource;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class CmsPanelPlugin implements Plugin
{
    public function getId(): string
    {
        return 'cms';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            PageResource::class
        ])->colors([
            'primary' => Color::Blue,
            ...Color::all()
        ]);
    }

    public function boot(Panel $panel): void
    {
    }
}
