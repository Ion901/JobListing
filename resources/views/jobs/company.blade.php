<x-layout>
    <div class="space-y-10">

        <x-forms.final-form />
        <x-sorting-compartiment />

        <section>
            <div class="space-y-10">
                <div class="text-center px-5 py-4 w-full rounded-xl border-white/10 bg-white/6">
                    <div class="grid grid-cols-[repeat(auto-fill,minmax(170px,auto))] justify-items-center gap-1">
                        @foreach ($employers as $employer)
                        <x-employer-card :data="$employer"
                        aditionalStyle="mx-auto max-h-[40px] md:max-h-[50px] aspect-3/2 object-contain"
                        width="100" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
