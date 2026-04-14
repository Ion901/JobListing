@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="no image">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
