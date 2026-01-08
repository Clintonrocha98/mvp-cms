@props(['data' => []])

@php
    /** @var \ClintonRocha\CMS\Blocks\Dividers\DividerData $data */
@endphp

<div class="flex items-center justify-center {{ $data->spacingClass() }}">
    <span class="text-gray-400 text-xl">•</span>
</div>
