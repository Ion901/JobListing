<x-layout>
    <div class="space-y-10">
        @if (request()->routeIs('applications'))
            {{ Breadcrumbs::render('applications') }}
        @endif
    </div>

    <!-- Header Section -->
    <x-panel
        class="flex items-center justify-between w-full py-4 px-6 mt-4 border-blue-800! bg-gradient-to-r from-blue-900/20 to-transparent">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-800" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="text-xl font-semibold text-gray-300">All Applications</span>
        </div>
        <div class="px-4 py-2 bg-blue-800 text-white rounded-xl font-medium">
            {{ $applications->count() }} {{ Str::plural('application', $applications->count()) }}
        </div>
    </x-panel>

    <!-- Column Headers -->
    <x-panel class="flex justify-around mt-6 py-3 px-6 bg-gray-50 border-b-2 border-gray-200">
        <p class="flex text-lg font-semibold text-gray-400">Job</p>
        <p class="flex text-lg font-semibold text-gray-400">Application Date</p>
        <p class="flex text-lg font-semibold text-gray-400">Status</p>
        <p class="flex text-lg font-semibold text-gray-400">Employer</p>
    </x-panel>

    <!-- Applications List -->
    <div class="space-y-3 mt-2">
        @forelse ($applications as $application)
            <x-panel
                class="flex items-center py-4 px-6 mt-2 hover:shadow-lg transition-all duration-300 border-l-4 border-l-blue-800 bg-white">
                <div class="flex justify-between w-full items-center">
                    <!-- Job Title -->
                    <div class="flex-1">
                        <h3
                            class="text-lg font-semibold text-gray-100 hover:text-blue-800 transition-colors cursor-pointer">
                            {{ $application->title }}
                        </h3>

                    </div>

                    <!-- Application Date -->
                    <div class="flex-1 text-center">
                        <div class="text-gray-100 font-medium">{{ $application->pivot->created_at->format('d F Y') }}
                        </div>
                        <div class="text-sm text-gray-100">{{ $application->pivot->created_at->format('H:i') }}</div>
                    </div>

                    <div class="flex-1 text-center">
                        <div class="text-gray-100 font-medium">{{ strtoUpper($application->pivot->status) }}
                        </div>
                    </div>

                    <!-- Employer Info -->
                    <div class="flex-1 flex items-center gap-3 justify-end">
                        @if ($application->employer->logo && Storage::disk('public')->exists('logos/'.$application->employer->logo))
                            <img src="{{ asset('/storage/logos/' . $application->employer->logo) }}"
                                alt="{{ $application->employer->company_name }} logo"
                                class="w-12 h-12 rounded-lg object-cover border border-gray-200 shadow-sm">
                        @else

                            <div class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                <span
                                    class="text-xl font-bold text-gray-100">{{ substr($application->employer->company_name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="text-right">
                            <p class="font-medium text-gray-100">{{ $application->employer->company_name }}</p>
                            <p class="text-sm text-gray-100">Employer</p>
                        </div>
                    </div>
                </div>
            </x-panel>
        @empty
            <x-panel class="flex flex-col items-center justify-center py-16 mt-4 bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-gray-100 text-lg">No applications yet</p>
                <p class="text-gray-400 text-sm mt-1">Start applying to jobs to see them here</p>
            </x-panel>
        @endforelse
    </div>

</x-layout>
