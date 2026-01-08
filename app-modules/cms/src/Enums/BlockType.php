<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Enums;

use Filament\Support\Contracts\HasLabel;

enum BlockType: string implements HasLabel
{
    case Hero = 'hero';
    case Text = 'text';
    case CTA = 'cta';
    case Form = 'form';
    case Features = 'features';
    case Testimonials = 'testimonials';
    case Logos = 'logos';
    case Image = 'image';
    case Anchors = 'anchors';
    case Divider = 'divider';
    case Footer = 'footer';

    public function getLabel(): string
    {
        return match ($this) {
            self::Hero => 'Hero',
            self::Form => 'Formulário',
            self::Features => 'Recursos',
            self::Testimonials => 'Depoimentos',
            self::Logos => 'Logos',
            self::Image => 'Imagem',
            self::Footer => 'Rodapé',
        };
    }
}
