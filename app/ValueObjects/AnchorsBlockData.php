<?php

namespace App\ValueObjects;

use App\Contract\BlockData;

final class AnchorsBlockData implements BlockData
{
    /** @var AnchorItem[] */
    public array $items;

    public function __construct(
        array $items,
        public string $variant,
    ) {
        $this->items = array_map(
            fn(array $item) => AnchorItem::fromArray($item),
            $items
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            items: $data['items'] ?? [],
            variant: $data['variant'] ?? 'menu',
        );
    }

    public function view(): string
    {
        return "blocks.anchors.{$this->variant}";
    }

    public function toArray(): array
    {
        return [
            'items' => array_map(
                fn(AnchorItem $item) => $item->toArray(),
                $this->items
            ),
            'variant' => $this->variant,
        ];
    }
}
