@props(['employer','width' => 90,'aditionalStyle' => ''])
<img src="{{ asset('/storage/logos/'.$employer->logo) }}" alt="no image" class="rounded-xl {{$aditionalStyle}}" width="{{$width}}">
