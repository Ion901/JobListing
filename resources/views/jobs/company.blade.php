<x-layout>
    <div class="space-y-10">

          @if (request()->routeIs('company'))
            {{ Breadcrumbs::render('companies') }}
        @endif

        <x-forms.final-form />
        <x-sorting-compartiment />

        <section>
            <div class="space-y-10">
                <div class="text-center px-5 py-4 w-full rounded-xl border-white/10 bg-white/6">
                    <div class="grid grid-cols-[repeat(auto-fill,minmax(170px,auto))] justify-items-center gap-1">
                        @foreach ($employers as $employer)
                        <x-employer-card :data="$employer"
                        aditionalStyle="mx-auto md:max-h-[50px] aspect-3/2 object-contain"
                        width="100" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section>
            <x-section-heading>Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
