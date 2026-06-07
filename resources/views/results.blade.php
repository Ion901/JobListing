<x-layout>

    <x-forms.final-form />

    <div class="space-y-6">
        @if ($jobs->isEmpty())
            <x-panel class="p-8 flex flex-col">
                <x-section-heading>Nu am găsit rezultate</x-section-heading>
                <p class="mt-2 text-sm text-gray-400">
                    Încearcă altă căutare sau schimbă filtrul.
                </p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <x-forms.link-action :link="route('jobs')" class="hover:text-blue-600 transition-colors duration-200">
                        Vezi toate joburile
                    </x-forms.link-action>
                    <x-forms.link-action :link="route('home')" class="hover:text-blue-600 transition-colors duration-200">
                        Acasă
                    </x-forms.link-action>
                </div>
            </x-panel>
        @else

            @foreach ($jobs as $job)
                <x-job-card-wide :$job />
            @endforeach

        @endif

    </div>
</x-layout>
