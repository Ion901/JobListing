<x-layout>

    <div class="space-y-10">
        @if (request()->routeIs('job'))
            {{ Breadcrumbs::render('job', $job) }}
        @endif

        <section>
            <x-panel class="gap-x-6 items-center">
                <div class="flex items-center align-content-center">
                    <x-employer-logo :employer="$job->employer" :width="150"
                        aditionalStyle="mx-auto max-h-[80px] md:max-h-[110px] aspect-3/2 object-contain" />
                </div>

                <div class="flex-1 space-y-4">
                    <a href="{{ route('company.show',$job->employer->company_slug) }}" class="text-sm text-gray-400">{{ $job->employer->company_name }}</a>

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
            <x-panel class="md:col-span-2 flex-col gap-y-4 prose [&_ul]:list-disc [&_ul]:pl-5 [&_li_p]:m-0">
                <x-section-heading>Detalii pozitie</x-section-heading>
                {!! str($job->description)->sanitizeHtml() !!}

            </x-panel>

            <x-panel class="flex-col gap-y-4">
                <x-section-heading>Rezumat</x-section-heading>
                <div class="space-y-2 text-lg font-light text-gray-300">
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-building pr-2"></i>Companie:</span>
                        {{ $job->employer->company_name }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-map-pin pr-2"></i>Locatie:</span> {{ $job->location }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-clock pr-2"></i>Program:</span> {{ $job->schedule }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-wallet pr-2"></i>Salariu:</span> De la {{ round($job->salary, -2) }}
                        $
                    </p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-graduation-cap pr-2"></i>Studii:</span>
                        {{ $job->education ?? 'Nespecificat' }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-briefcase pr-2"></i>Experiența de muncă:</span>
                        {{ $job->experience->level ?? 'Nespecificat' }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-calendar pr-2"></i>Data actualizarii</span>
                        {{ $job->updated_at->format('d M Y') }}</p>
                    <p class="flex flex-col"><span class="font-bold text-white"><i
                                class="fa-solid fa-calendar pr-2"></i>Email</span> {{ $job->employer->email }}</p>
                </div>
            </x-panel>
        </section>

        <section>
            <x-panel class="flex-col gap-y-5">
                <x-section-heading>Aplicare rapida</x-section-heading>
                <x-forms.button class="w-[70%] m-auto" data-target="#modal-send">Trimite CV</x-forms.button>
                 @if ($errors->any())
                            <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-4 mb-4">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-400 text-sm">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Succes --}}
                        @if (session('success'))
                            <div class="bg-green-500/10 border border-green-500/30 rounded-lg p-4 mb-4">
                                <p class="text-green-400 text-sm">{{ session('success') }}</p>
                            </div>
                        @endif
                <div class=" fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden flex" id="modal-send">

                    <div class="relative">
                        {{-- Erori --}}

                        <div class="absolute top-2 right-2 p-2 cursor-pointer z-99" id="close-modal">
                            <i class="fa-solid fa-x pointer-events-none"></i>
                        </div>
                        <x-forms.form s.form action="{{ route('cv',$job) }}" method="post" enctype="multipart/form-data"
                            class="w-md space-y-6 p-15 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-2xl ">
                            @csrf
                            <h1 class="font-bold text-3xl text-white text-center">
                                Atașează CV-ul
                            </h1>
                            <x-forms.input hidden name="company_email" value="{{ $job->employer->email }}" />
                            <x-forms.input hidden name="company_job" value="{{ $job->title }}" />

                            <x-forms.input label="Nume complet" name="candidate_name" placeholder="John Doe"
                                class="bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:border-blue-400 w-12" />

                            <x-forms.input label="Email" name="candidate_email" type="email"
                                placeholder="john@example.com"
                                class="bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:border-blue-400" />

                            <x-forms.input label="Link CV" name="candidate_cv" type="file" accept=".pdf,.doc,.docx"
                                class="bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:border-blue-400 file:bg-blue-600 file:text-white file:px-4 file:py-2 file:border-0 file:rounded file:cursor-pointer file:font-medium hover:file:bg-blue-700 file:mr-4" />

                            <x-forms.button
                                class="bg-blue-600 hover:bg-blue-700 text-white rounded py-2 px-6 font-bold w-full transition">
                                Trimite
                            </x-forms.button>
                        </x-forms.form>

                    </div>
                </div>
            </x-panel>
        </section>

        <section>
            <div class="mt-6 space-y-6">
                @forelse ($otherJobs as $otherJob)
                    <x-section-heading>Alte joburi ale companiei</x-section-heading>
                    <x-job-card-wide :job="$otherJob" />
                @empty
                @endforelse
            </div>

        </section>
    </div>
    @push('scripts')
        @vite('resources/js/toggleModal.js')
    @endpush
</x-layout>
