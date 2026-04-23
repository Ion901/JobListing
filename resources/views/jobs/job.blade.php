<x-layout>

    <div class="space-y-10">
        @if (request()->routeIs('job'))
            {{ Breadcrumbs::render('job', $job) }}
        @endif

        <section>
            <x-panel class="gap-x-6 items-start">
                <div class="flex items-center justify-center">
                    <x-employer-logo :employer="$job->employer" :width="120"
                        aditionalStyle="mx-auto max-h-[80px] md:max-h-[110px] aspect-3/2 object-contain" />
                </div>

                <div class="flex-1 space-y-4">
                    <a href="{{ route('company') }}" class="text-sm text-gray-400">{{ $job->employer->company_name }}</a>

                    <x-page-heading class="text-left mb-0 text-3xl">{{ $job->title }}</x-page-heading>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                            <x-tag :$tag size="small" />
                        @endforeach
                    </div>

                    <p class="text-sm text-gray-400">Actualizat: {{ $job->created_at->diffForHumans() }}</p>
                </div>
            </x-panel>
        </section>

        <section class="grid gap-6 md:grid-cols-3">
            <x-panel class="md:col-span-2 flex-col gap-y-4">
                <x-section-heading>Detalii pozitie</x-section-heading>
                {!! $job->description !!}
            </x-panel>

            <x-panel class="flex-col gap-y-4">
                <x-section-heading>Rezumat</x-section-heading>
                <div class="space-y-2 text-lg font-light text-gray-300">
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-building pr-2"></i>Companie:</span> {{ $job->employer->company_name }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-map-pin pr-2"></i>Locatie:</span> {{ $job->location }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-clock pr-2"></i>Program:</span> {{ $job->schedule }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-wallet pr-2"></i>Salariu:</span> De la {{ round($job->salary,-2) }} $</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-graduation-cap pr-2"></i>Studii:</span> {{ $job->education ?? "Nespecificat" }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-briefcase pr-2"></i>Experiența de muncă:</span> {{ $job->experience->level ?? "Nespecificat" }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i class="fa-solid fa-calendar pr-2"></i>Data actualizarii</span> {{ $job->updated_at->format('d M Y') }}</p>
                </div>
            </x-panel>
        </section>

        <section>
            <x-panel class="flex-col gap-y-5">
                <x-section-heading>Aplicare rapida</x-section-heading>
                <x-forms.form action="{{ $job->url }}" method="GET" target="_blank" class="max-w-none space-y-4">
                    <x-forms.input label="Nume complet" name="candidate_name" placeholder="John Doe" />
                    <x-forms.input label="Email" name="candidate_email" type="email" placeholder="john@example.com" />
                    <x-forms.input label="Link CV" name="candidate_cv" placeholder="https://example.com/cv-john-doe" />

                    <x-forms.button class="bg-blue-800 rounded py-2 px-6 font-bold w-full md:w-auto">
                        Continua spre pagina companiei
                    </x-forms.button>
                </x-forms.form>
            </x-panel>
        </section>
    </div>
</x-layout>
