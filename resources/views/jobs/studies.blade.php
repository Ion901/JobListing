<x-layout>
    <div class="space-y-10">
        @if (request()->routeIs('studies'))
            {{ Breadcrumbs::render('studies') }}
        @endif

        <x-forms.final-form />
        <x-sorting-compartiment />
        <x-card-data-sort :data="$indexedCollection" :alphabet="$alphabet" />

    </div>
</x-layout>
