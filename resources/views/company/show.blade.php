<x-layout>
    <div class="space-y-10 relative">

        @if (request()->routeIs('company.show'))
            {{ Breadcrumbs::render('companies.show', $employer) }}
        @endif

        <x-panel id="modal-container"
            class="fixed inset-0 z-50 flex hidden bg-white/10 backdrop-blur-md border items-center justify-center hover:shadow-none hover:border-transparent">

            <!-- image container -->
            <div class="absolute w-4/5 flex flex-col items-center gap-4" style="height: 80vh;">

                <div class="flex items-center gap-4 flex-1 min-h-0 w-full">

                    {{-- buton prev in flux --}}
                    <button id="prev" class="text-4xl p-3 rounded-full shrink-0 cursor-pointer hover:text-gray-200 hover:scale-[0.99]">
                        <i class="fa-solid fa-circle-left"></i>
                    </button>

                    {{-- imaginea in mijloc --}}
                    <img src="{{ asset('') }}" alt="no image" id="img-modal"
                        class="flex-1 h-full object-contain min-w-0 transition-all duration-300 ease-out opacity-100 scale-95">

                    {{-- buton next in flux --}}
                    <button id="next" class="text-4xl p-3 rounded-full shrink-0 cursor-pointer hover:text-gray-200 hover:scale-[0.99]">
                        <i class="fa-solid fa-circle-right"></i>
                    </button>

                </div>

                <div class="flex w-full justify-center">
                    <div class="thumbnail w-fit flex gap-2 ">

                    </div>
                </div>
            </div>

            <button id="close"
                class="absolute top-4 right-4 text-white w-10 h-10 rounded-full bg-gray-400 flex items-center justify-center cursor-pointer hover:text-gray-200">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </x-panel>

        <x-panel class="gap-x-6 items-center">
            <div class="flex items-center align-content-center">
                <x-employer-logo :employer="$employer" :width="150"
                    aditionalStyle="mx-auto max-h-[80px] md:max-h-[110px] aspect-3/2 object-contain" />
            </div>

            <div class="flex-1 space-y-4">

                <x-page-heading class="text-left mb-4! text-3xl">{{ $employer->company_name }}</x-page-heading>
                <p class="text-lg"><a href="#jobs">Joburi disponibile: {{ $employer->job->count() }}</a></p>
                <p class="text-sm text-gray-400">Creat: {{ $employer->created_at->diffForHumans() }}</p>
            </div>
        </x-panel>

        <section class="grid gap-6 md:grid-cols-3">
            <x-panel class="md:col-span-2 flex-col gap-y-4 prose [&_ul]:list-disc [&_ul]:pl-5 [&_li_p]:m-0">
                <x-section-heading>Quick about us</x-section-heading>
                {!! str($employer?->description->description)->sanitizeHtml() !!}

            </x-panel>

            <x-panel class="flex-col gap-y-4">
                <x-section-heading>About Us</x-section-heading>
                <div class="space-y-2 text-lg font-light text-gray-300">
                    <p class="flex flex-col">
                        <span class="font-bold text-white"><i class="fa-solid fa-building pr-2"></i>Company Name:
                        </span>
                        {{ $employer->company_name }}
                    </p>
                    <p class="flex flex-col">
                        <span class="font-bold text-white"><i class="fa-solid fa-building pr-2"></i>Phone Number:
                        </span>
                        {{ $employer->phone }}
                    </p>

                    <p class="flex flex-col">
                        <span class="font-bold text-white">
                            <i class="fa-solid fa-calendar pr-2"></i>Email
                        </span>
                        {{ $employer->email }}
                    </p>
                </div>
            </x-panel>
        </section>

        <section>
            @if ($employer->photos->count())
                <div class="text-center px-5 py-4 w-full rounded-xl border-white/10 bg-white/6">
                    <div class="grid grid-cols-[repeat(auto-fill,minmax(200px,auto))] justify-items-center gap-1 ">
                        @foreach ($employer->photos as $photo)
                        <div class="overflow-hidden rounded-xl">
                            <x-employer-photo :photo="$photo"
                                    aditionalStyle="mx-auto h-full md:max-h-[150px] object-cover transition-transform duration-500 hover:scale-110 hover:cursor-pointer" />
                        </div>
                        @endforeach
                    </div>
                </div>
            @else
            @endif
        </section>

        <section>
            <div class="mt-6 space-y-6" id="jobs">
                <x-section-heading>Company jobs</x-section-heading>
                @forelse ($employer->job as $job)
                    <x-job-card-wide :job="$job" />
                @empty
                @endforelse
            </div>

        </section>

        @push('scripts')
            @vite('resources/js/imageViewer.js')
        @endpush

    </div>
</x-layout>
