<x-layout>
    <x-page-heading>Create a Job</x-page-heading>

    <x-forms.form action="/jobs" method="POST">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90.000 USD"/>
        <x-forms.input label="Location" name="location" placeholder="Kinter Park, Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option >Part Time</option>
            <option >Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acne.com/jobs/cep-wanted"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input label="Tags(comma separated)" name="tags" placeholder="Laracasts, video, education"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
