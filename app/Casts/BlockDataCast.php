<?php

namespace App\Casts;

use App\Contract\BlockData;
use App\ValueObjects\AnchorsBlockData;
use App\ValueObjects\CtaBlockData;
use App\ValueObjects\DividerBlockData;
use App\ValueObjects\FeaturesBlockData;
use App\ValueObjects\FooterBlockData;
use App\ValueObjects\FormBlockData;
use App\ValueObjects\HeroBlockData;
use App\ValueObjects\ImageBlockData;
use App\ValueObjects\LogosBlockData;
use App\ValueObjects\TestimonialsBlockData;
use App\ValueObjects\TextBlockData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BlockDataCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): BlockData
    {
        $data = json_decode($value, true) ?? [];

        return match ($model->type) {
            'hero' => HeroBlockData::fromArray($data),
            'text' => TextBlockData::fromArray($data),
            'cta' => CtaBlockData::fromArray($data),
            'form' => FormBlockData::fromArray($data),
            'features' => FeaturesBlockData::fromArray($data),
            'testimonials' => TestimonialsBlockData::fromArray($data),
            'logos' => LogosBlockData::fromArray($data),
            'image' => ImageBlockData::fromArray($data),
            'anchors' => AnchorsBlockData::fromArray($data),
            'divider' => DividerBlockData::fromArray($data),
            'footer' => FooterBlockData::fromArray($data),

        };
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value instanceof BlockData
            ? $value->toArray()
            : $value
        );
    }
}
