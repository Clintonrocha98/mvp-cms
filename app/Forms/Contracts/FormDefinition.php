<?php

namespace App\Forms\Contracts;

interface FormDefinition
{
    public function fields(): array;

    public function rules(): array;

    public function handle(array $data): void;
}
