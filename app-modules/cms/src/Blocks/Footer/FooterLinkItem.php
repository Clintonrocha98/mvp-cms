<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Footer;

final class FooterLinkItem
{
    public function __construct(
        public string $label,
        public string $url,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            label: $data['label'] ?? '',
            url: $data['url'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'url' => $this->url,
        ];
    }
}
