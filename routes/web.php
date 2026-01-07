<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PagePreviewController;
use Illuminate\Support\Facades\Route;

Route::get('/{id}', [PagePreviewController::class, 'show']);
Route::post('/forms/{formId}', [FormController::class, 'submit']);
