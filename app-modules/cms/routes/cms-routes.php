<?php

declare(strict_types=1);

use ClintonRocha\CMS\Http\Controllers\FormController;
use ClintonRocha\CMS\Http\Controllers\PagePreviewController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug}', [PagePreviewController::class, 'show']);
Route::post('/forms/{formId}', [FormController::class, 'submit']);
