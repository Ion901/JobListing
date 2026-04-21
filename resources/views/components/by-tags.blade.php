@props(['data' => ''])


<a href="{{ route('tags.show', $data) }}">
    {{ $data->name}}
</a>

