<x-layout>
    <div class="space-y-10">

         @if (request()->routeIs('career'))
            {{ Breadcrumbs::render('career') }}
        @endif

        <x-forms.final-form />
        <x-sorting-compartiment />

        <section>
            <x-panel class="flex-col gap-y-4 p-6">
                <x-page-heading class="text-left mb-0 text-3xl">Career Hub</x-page-heading>
                <p class="text-sm text-gray-400">
                    Construieste-ti cariera pas cu pas: invata skill-uri utile, pregateste CV-ul si aplica mai eficient.
                </p>
                <div class="flex flex-wrap gap-3">
                    <x-forms.link-action :link="route('jobs')"
                        class="bg-blue-700 px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                        Explore Jobs
                    </x-forms.link-action>
                    <x-forms.link-action :link="route('salaries')"
                        class="border border-white/20 px-4 py-2 rounded-md hover:border-white/40 transition-colors duration-200">
                        View Salaries
                    </x-forms.link-action>
                </div>
            </x-panel>
        </section>

        <section>
            <x-section-heading>Career Paths</x-section-heading>
            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <x-panel class="flex-col gap-y-2">
                    <h3 class="font-bold text-lg">Frontend Developer</h3>
                    <p class="text-sm text-gray-400">HTML, CSS, JavaScript, React/Vue, UX basics, portfolio projects.
                    </p>
                </x-panel>
                <x-panel class="flex-col gap-y-2">
                    <h3 class="font-bold text-lg">Backend Developer</h3>
                    <p class="text-sm text-gray-400">PHP/Laravel, API design, SQL, authentication, testing and
                        deployment.</p>
                </x-panel>
                <x-panel class="flex-col gap-y-2">
                    <h3 class="font-bold text-lg">QA Engineer</h3>
                    <p class="text-sm text-gray-400">Manual testing, test cases, automation basics, bug reporting
                        quality.</p>
                </x-panel>
            </div>
        </section>

        <section>
            <x-section-heading>CV & Interview Toolkit</x-section-heading>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <x-panel class="flex-col gap-y-3">
                    <h3 class="font-bold text-lg">CV Checklist</h3>
                    <ul class="inline text-sm list-inside text-gray-400 list-disc pl-5 space-y-1">
                        <li>Headline clar + 2-3 randuri despre experienta.</li>
                        <li>Rezultate masurabile pentru fiecare rol.</li>
                        <li>Skill-uri relevante pentru jobul targetat.</li>
                        <li>Link-uri catre proiecte (GitHub/portfolio).</li>
                    </ul>
                </x-panel>
                <x-panel class="flex-col gap-y-3">
                    <h3 class="font-bold text-lg">Interview Prep</h3>
                    <ul class="text-sm list-inside text-gray-400 list-disc pl-5 space-y-1">
                        <li>Pregateste 3 proiecte explicate pe impact.</li>
                        <li>Exerseaza raspunsuri la intrebari comportamentale.</li>
                        <li>Pregateste intrebari despre echipa si rol.</li>
                        <li>Studiaza compania inainte de interviu.</li>
                    </ul>
                </x-panel>
            </div>
        </section>

        <section>
            <x-section-heading>Top Skills in Demand</x-section-heading>
            <div class="mt-6 flex flex-wrap gap-2">
                @forelse ($topTags as $tag)
                    <x-tag :$tag />
                @empty
                    <p class="text-sm text-gray-400">Nu exista skill-uri disponibile momentan.</p>
                @endforelse
            </div>
        </section>

        <section>
            <x-section-heading>Recommended Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @forelse ($featuredJobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <p class="text-sm text-gray-400">Nu exista joburi recomandate momentan.</p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
