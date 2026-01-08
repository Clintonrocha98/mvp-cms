<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Models;

use ClintonRocha\CMS\Contracts\BlockData;
use ClintonRocha\CMS\Database\Factories\PageBlockFactory;
use ClintonRocha\CMS\Enums\BlockType;
use ClintonRocha\CMS\ValueObjects\AnchorsBlockData;
use ClintonRocha\CMS\ValueObjects\CtaBlockData;
use ClintonRocha\CMS\ValueObjects\DividerBlockData;
use ClintonRocha\CMS\ValueObjects\FeaturesBlockData;
use ClintonRocha\CMS\ValueObjects\FooterBlockData;
use ClintonRocha\CMS\ValueObjects\FormBlockData;
use ClintonRocha\CMS\ValueObjects\HeroBlockData;
use ClintonRocha\CMS\ValueObjects\ImageBlockData;
use ClintonRocha\CMS\ValueObjects\LogosBlockData;
use ClintonRocha\CMS\ValueObjects\TestimonialsBlockData;
use ClintonRocha\CMS\ValueObjects\TextBlockData;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(PageBlockFactory::class)]
class PageBlock extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'type', 'position', 'data'];

    protected function casts(): array
    {
        return [
            'type' => BlockType::class,
            'data' => 'array',
        ];
    }

    public function pageContent(): BlockData
    {
        return match ($this->type) {
            BlockType::Hero => HeroBlockData::fromArray($this->data),
            BlockType::Text => TextBlockData::fromArray($this->data),
            BlockType::CTA => CtaBlockData::fromArray($this->data),
            BlockType::Form => FormBlockData::fromArray($this->data),
            BlockType::Features => FeaturesBlockData::fromArray($this->data),
            BlockType::Testimonials => TestimonialsBlockData::fromArray($this->data),
            BlockType::Logos => LogosBlockData::fromArray($this->data),
            BlockType::Image => ImageBlockData::fromArray($this->data),
            BlockType::Anchors => AnchorsBlockData::fromArray($this->data),
            BlockType::Divider => DividerBlockData::fromArray($this->data),
            BlockType::Footer => FooterBlockData::fromArray($this->data),
        };
    }
}
