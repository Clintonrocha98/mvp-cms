<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Testimonials;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Contracts\BlockDefinition;

class TestmonialBlock implements BlockDefinition
{
    public static function type(): string
    {
        return 'testimonials';
    }

    public static function variants(): array
    {
        return [
            'grid' => 'Grid',
            'cards' => 'Cards',
        ];
    }

    public static function label(): string
    {
        return 'Testimonials';
    }

    public static function schema(): array
    {
        return TestimonialsSchema::schema();
    }

    public static function fromModel(array $data): BlockData
    {
        return TestimonialsData::fromArray($data);
    }

    public static function view(string $variant): string
    {
        return 'cms::blocks.testimonials.'.$variant;
    }
}
