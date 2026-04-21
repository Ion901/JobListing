<x-layout>
    <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8 dark">
        <x-page-heading class="text-3xl font-extrabold text-gray-900 dark:text-white">Register</x-page-heading>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">

                <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
                    <x-forms.input label="Email address/ Username" name="email" type="text" id="email"
                        data-testid="username" autocomplete="email" />

                    <x-forms.input label="Password" id="password" name="password" type="password"
                        data-testid="password" autocomplete="current-password" class="px-3 py-2.5 pr-9">
                        <x-forms.checkbox-password targetId="#password" />
                    </x-forms.input>
                 <x-forms.bar-password />


                    <x-forms.input label="Password Confirmation" id="password_confirmation" name="password_confirmation"
                        type="password" data-testid="password" autocomplete="password_confirmation">
                        <x-forms.checkbox-password targetId="#password_confirmation" />
                    </x-forms.input>
                     <p class="text-xs hidden" id="match-msg"></p>

                    <div class="flex items-center justify-evenly">
                        <x-forms.radio name="role" label="Find a job" value="resume" class="w-6 h-4 p-5" targetId="#resume"/>
                        <x-forms.radio name="role" label="Find employers" value="vacancy" class="w-6 h-4 p-"
                            targetId="#employer-data" />
                    </div>

                    <div id="employer-data" class="hidden">
                        <x-forms.input label="Employer Name" name="employer" />
                        <x-forms.input label="Employer Logo" name="logo" type="file" />

                    </div>


                    <x-forms.submit-button>Register </x-forms.submit-button>
                </x-forms.form>

                <div class="mt-6">
                    <x-forms.divider text="Or continue with" />

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <x-forms.link-action link="{{ route('socialite.redirect','google') }}">
                            <x-forms.button
                                class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white dark:bg-gray-700 px-4 py-2 text-sm font-medium text-gray-500 dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 disabled:cursor-wait disabled:opacity-50">
                                <x-icons.google />
                            </x-forms.button>
                        </x-forms.link-action>

                        <x-forms.link-action link="{{ route('socialite.redirect','github') }}">
                            <x-forms.button
                                class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white dark:bg-gray-700 px-4 py-2 text-sm font-medium text-gray-500 dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 disabled:cursor-wait disabled:opacity-50">
                                <x-icons.github />
                            </x-forms.button>
                        </x-forms.link-action>
                    </div>

                </div>

                <div class="m-auto mt-6 w-fit md:mt-8">
                    <span class="m-auto text-gray-400">Already have an account?
                        <x-forms.link-action text="Log In" link="/login"
                            class="font-medium text-indigo-400 hover:text-indigo-500" />
                    </span>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        @vite('resources/js/validationPassword.js')
    @endpush
</x-layout>

