<section class="text-center py-5">
    <h1 class="font-bold text-4xl">Let's find your next Job</h1>

    <x-forms.form action="/search" class="mt-6">
        <x-forms.input name="q" :label="false" placeholder="Web Developer..."
            class="rounded-xl border border-white/10 bg-white/6 px-5 py-4 w-full max-w-xl"></x-forms.input>
    </x-forms.form>

</section>
