<?php

namespace App\Forms;

use App\Forms\Contracts\FormDefinition;
use App\Forms\Definitions\ContactFormDefinition;
use InvalidArgumentException;

final class FormRegistry
{
    public static function get(string $formId): FormDefinition
    {
        return match ($formId) {
            'contact' => new ContactFormDefinition(),
            default => throw new InvalidArgumentException('Formulário inválido'),
        };
    }
}
