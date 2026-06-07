<x-layout>

    <div class="space-y-10">
        @if(request()->routeIs('jobs'))
        {{ Breadcrumbs::render((string) request()->path()) }}
        @endif

        <x-forms.final-form />

        @if (request()->routeIs('jobs'))
            <x-sorting-compartiment />

            <section class="text-center p-5 bg-white/5 rounded-xl">
                <div class="grid grid-cols-[repeat(auto-fit,minmax(170px,auto))] gap-1 justify-items-center">
                    @forelse ($employers as $employer)
                        <x-employer-card :data="$employer"
                            aditionalStyle="mx-auto max-h-[40px] md:max-h-[65px] aspect-3/2 object-contain"
                            width="130" />
                    @empty
                        <p class="text-sm text-gray-400 py-8 col-span-full">
                            Nu există companii de afișat momentan.
                        </p>
                    @endforelse
                </div>
            </section>
        @else
            <section class="pt-10">
                <x-section-heading>Featured Jobs</x-section-heading>

                <div class="grid lg:grid-cols-3 gap-8 mt-6">
                    @forelse ($featured as $job)
                        <x-job-card :$job />
                    @empty
                        <p class="text-sm text-gray-400 col-span-full">
                            Nu există joburi recomandate încă.
                        </p>
                    @endforelse
                </div>
            </section>

            <section>
                <x-section-heading>Tags</x-section-heading>
                <div class="mt-6 space-x-1">
                    @forelse ($tags as $tag)
                        <x-tag :$tag />
                    @empty
                        <p class="text-sm text-gray-400">Nu există tag-uri disponibile.</p>
                    @endforelse

                </div>
            </section>
        @endif

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @forelse ($jobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <p class="text-sm text-gray-400">Nu există joburi recente de afișat.</p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
