@props(['employer','width' => 90,'aditionalStyle' => ''])
<img src="{{ asset('/storage/'.$employer->logo) }}" alt="no image" class="rounded-xl {{$aditionalStyle}}" width="{{$width}}">
