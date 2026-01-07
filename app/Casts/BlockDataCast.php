<?php

namespace App\Casts;

use App\Contract\BlockData;
use App\ValueObjects\CtaBlockData;
use App\ValueObjects\HeroBlockData;
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
