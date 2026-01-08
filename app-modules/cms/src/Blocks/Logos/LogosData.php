<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Logos;

use ClintonRocha\CMS\Contracts\BlockData;

final class LogosData implements BlockData
{
    /** @var ClientLogoItem[] */
    public array $items;

    public function __construct(
        array $items,
        public string $variant,
        public int $columns,
    ) {
        $this->items = array_map(
            ClientLogoItem::fromArray(...),
            $items
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            items: $data['items'] ?? [],
            variant: $data['variant'] ?? 'grid',
            columns: (int) ($data['columns'] ?? 5),
        );
    }

    public function gridClass(): string
    {
        return match ($this->columns) {
            3 => 'grid-cols-2 sm:grid-cols-3',
            4 => 'grid-cols-2 sm:grid-cols-4',
            6 => 'grid-cols-3 sm:grid-cols-6',
            default => 'grid-cols-2 sm:grid-cols-5',
        };
    }

    public function toArray(): array
    {
        return [
            'items' => array_map(
                fn (ClientLogoItem $item) => $item->toArray(),
                $this->items
            ),
            'variant' => $this->variant,
            'columns' => $this->columns,
        ];
    }
}
