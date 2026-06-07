@props(['data' => '','class'=>""])


<a href="{{ route('tags.show', $data->slug) }}" class="{{ $class }}">
    {{ $data->name}}
</a>

