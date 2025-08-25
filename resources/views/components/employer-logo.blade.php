@props(['employer','width' => 90])
<img src="{{ asset('/storage/'.$employer->logo) }}" alt="no image" class="rounded-xl" width="{{$width}}">
