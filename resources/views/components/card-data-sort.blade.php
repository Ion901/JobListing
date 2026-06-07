@props(['data' => '', 'alphabet' => ''])
<div class="text-center px-5 py-4 w-full rounded-xl border-white/10 bg-white/6">
    <div class="grid grid-cols-[repeat(auto-fit,minmax(170px,auto))] gap-2 justify-items-center">

        @foreach ($alphabet as $letter)
            @if (array_key_exists($letter, $data))
                <div>
                    <h2>{{ $letter }}</h2>
                    @foreach ($data[$letter] as $jobs)
                        <x-forms.link-action link="{{ '/search/'.Str::slug($jobs) }}" class="inline-block hover:text-blue-800 transition-colors duration-300">{{ $jobs }}</x-forms.link-action>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
