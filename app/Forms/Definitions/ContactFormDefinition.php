<?php

namespace App\Forms\Definitions;

use App\Forms\Contracts\FormDefinition;

final class ContactFormDefinition implements FormDefinition
{
    public function fields(): array
    {
        return [
            'name' => 'Nome',
            'email' => 'Email',
            'message' => 'Mensagem',
        ];
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ];
    }

    public function handle(array $data): void
    {
        // salvar no banco
        // enviar email
        // disparar evento
        dd($data);
    }
}
