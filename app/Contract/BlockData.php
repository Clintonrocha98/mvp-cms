<?php

namespace App\Contract;

interface BlockData
{
    public static function fromArray(array $data): self;

    public function toArray(): array;

    public function view(): string;
}
