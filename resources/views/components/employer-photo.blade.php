@props(['photo', 'width' => 220, 'height' => 220, 'aditionalStyle' => ''])

@if($photo->path && Storage::disk('public')->exists($photo->path))
    <img
        src="{{ asset('storage/' . $photo->path) }}"
        alt="no image"
        class="rounded-xl {{ $aditionalStyle }}"
        width="{{ $width }}"
        height="{{ $height }}"
        data-name="imgGallery"
        loading="lazy"
    >
@endif
