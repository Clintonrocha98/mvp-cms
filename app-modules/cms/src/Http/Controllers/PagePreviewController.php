<?php

declare(strict_types=1);

namespace ClintonRocha\CMS\Http\Controllers;

use App\Http\Controllers\Controller;
use ClintonRocha\CMS\Models\Page;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PagePreviewController extends Controller
{
    public function show(string $slug): Factory|View
    {
        $page = Page::query()
            ->with('blocks')
            ->whereSlug($slug)
            ->first();

        return view('cms::pages.preview', ['page' => $page]);
    }
}
