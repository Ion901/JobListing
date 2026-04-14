<x-layout>
    <div class="space-y-10">
        <x-forms.final-form />
        <x-sorting-compartiment />


        <section>
            <div class="space-y-10">
                <div class="text-center px-5 py-4 w-full rounded-xl border-white/10 bg-white/6">
                    <div class="grid grid-cols-3 justify-items-center gap-1">
                        @foreach ($tags as $tag)
                            <x-by-tags :data="$tag" />
                        @endforeach
                    </div>

                </div>
            </div>

        </section>
    </div>
</x-layout>
