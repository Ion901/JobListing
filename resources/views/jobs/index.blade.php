<x-layout>
    <div class="space-y-10">

        <x-forms.final-form />

        @if (request()->routeIs('jobs'))
            <x-sorting-compartiment />

            <section class="text-center p-5 bg-white/5 rounded-xl">
                <div class="grid grid-cols-[repeat(auto-fit,minmax(170px,auto))] gap-1 justify-items-center">
                    @foreach ($jobs as $job)
                        <x-employer-card :job="$job"
                            aditionalStyle="mx-auto max-h-[40px] md:max-h-[65px] aspect-3/2 object-contain "
                            width="130" />
                    @endforeach
                </div>
            </section>
        @else
            <section class="pt-10">
                <x-section-heading>Featured Jobs</x-section-heading>

                <div class="grid lg:grid-cols-3 gap-8 mt-6">
                    @foreach ($featured as $job)
                        <x-job-card :$job />
                    @endforeach
                </div>
            </section>

            <section>
                <x-section-heading>Tags</x-section-heading>
                <div class="mt-6 space-x-1">
                    @foreach ($tags as $tag)
                        <x-tag :$tag />
                    @endforeach

                </div>
            </section>
        @endif

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
