@props(['data' => []])

@php
    /** @var \ClintonRocha\CMS\Blocks\Dividers\DividerData $data */
@endphp

<div class="{{ $data->spacingClass() }}">
    <hr class="border-gray-200">
</div>
