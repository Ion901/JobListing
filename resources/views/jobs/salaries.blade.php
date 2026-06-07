<x-layout>
    <div class="space-y-10">

        <x-panel class="flex-col gap-y-12 py-12 px-12">
        @if (request()->routeIs('salaries'))
            {{ Breadcrumbs::render('salaries') }}
        @endif



        {{-- <x-forms.final-form /> --}}
        <x-sorting-compartiment />
    </x-panel>

        <section>
            <x-section-heading>Salary Insights</x-section-heading>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-panel class="flex-col gap-y-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Jobs with salary</p>
                    <p class="text-2xl font-bold">{{ $salaryStats['count'] }}</p>
                </x-panel>
                <x-panel class="flex-col gap-y-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Average salary</p>
                    <p class="text-2xl font-bold">${{ number_format($salaryStats['average']) }}</p>
                </x-panel>
                <x-panel class="flex-col gap-y-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Highest salary</p>
                    <p class="text-2xl font-bold">${{ number_format($salaryStats['max']) }}</p>
                </x-panel>
                <x-panel class="flex-col gap-y-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Lowest salary</p>
                    <p class="text-2xl font-bold">${{ number_format($salaryStats['min']) }}</p>
                </x-panel>
            </div>
        </section>

        <section>
            <x-section-heading>Salary Ranges</x-section-heading>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                @foreach ($salaryRanges as $range => $total)
                    <x-panel class="items-center justify-between">
                        <p class="font-semibold">{{ $range }}</p>
                        <span class="text-sm text-gray-300">{{ $total }} jobs</span>
                    </x-panel>
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Top Paying Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @forelse ($jobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <p class="text-sm text-gray-400">
                        Nu exista joburi cu salariu publicat momentan.
                    </p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
