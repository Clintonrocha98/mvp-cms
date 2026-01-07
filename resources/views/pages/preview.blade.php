@foreach ($page->blocks as $block)
    <x-dynamic-component
        :component="$block->data->view()"
        :data="$block->data"
    />
@endforeach
