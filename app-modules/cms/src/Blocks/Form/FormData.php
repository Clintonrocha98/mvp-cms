<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Blocks\Form;

use ClintonRocha\CMS\Contracts\BlockData;

final readonly class FormData implements BlockData
{
    public function __construct(
        public string $formId,
        public string $title,
        public ?string $description,
        public string $submitLabel,
        public string $variant,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            formId: $data['form_id'],
            title: $data['title'],
            description: $data['description'] ?? null,
            submitLabel: $data['submit_label'] ?? 'Enviar',
            variant: $data['variant'] ?? 'card',
        );
    }

    public function toArray(): array
    {
        return [
            'form_id' => $this->formId,
            'title' => $this->title,
            'description' => $this->description,
            'submit_label' => $this->submitLabel,
            'variant' => $this->variant,
        ];
    }
}
