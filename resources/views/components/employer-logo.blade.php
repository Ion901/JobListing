@props(['employer', 'width' => 100, 'height' => '50px', 'aditionalStyle' => ''])

@if($employer->logo && Storage::disk('public')->exists($employer->logo))
    <img
        src="{{ asset('storage/' . $employer->logo) }}"
        alt="{{ $employer->company_name }}"
        class="rounded-xl {{ $aditionalStyle }}"
        width="{{ $width }}"
        height="{{ $height }}"
    >
@else
    <img
        src="{{ asset('storage/logos/default_company.jpg') }}"
        alt="Default logo"
        class="rounded-xl {{ $aditionalStyle }}"
        width="{{ $width }}"
        height="{{ $height }}"
    >
@endif
