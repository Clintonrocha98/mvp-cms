<?php

namespace App\Http\Controllers;

use App\Forms\FormRegistry;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request, string $formId)
    {
        $form = FormRegistry::get($formId);

        $validated = $request->validate($form->rules());

        $form->handle($validated);

        return back()->with('success', true);
    }
}
