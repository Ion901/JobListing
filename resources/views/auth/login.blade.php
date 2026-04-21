<x-layout>
    <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8 dark">
        <x-page-heading class="text-3xl font-extrabold text-gray-900 dark:text-white">Log In</x-page-heading>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">

                <x-forms.form method="POST" action="/login">
                    <x-forms.input label="Email address/ Username" name="email" type="text" id="email"
                        data-testid="username" autocomplete="email"
                        class="block w-full appearance-none rounded-md border border-gray-300 px-3! py-2.5! placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm" />

                    <x-forms.input label="Password" id="password" name="password" type="password"
                        data-testid="password" autocomplete="current-password"
                        class="block w-full appearance-none rounded-md border border-gray-300 px-3! py-2.5! placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm" />

                    <div class="flex items-center justify-between">
                        <x-forms.checkbox name="remember_me" label="Remember Me"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:text-white dark:border-gray-600 dark:focus:ring-indigo-400 disabled:cursor-wait disabled:opacity-50" />

                        <x-forms.link-action text="Forgot your password" link="{{ route('password.request') }}"
                            class="font-medium text-indigo-400 hover:text-indigo-500" />
                    </div>

                    <x-forms.submit-button>Log In</x-forms.submit-button>
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
                    <span class="m-auto text-gray-400">Don't have an account?
                        <x-forms.link-action text="Create
                            Account" link="/register"
                            class="font-medium text-indigo-400 hover:text-indigo-500" />
                    </span>
                </div>
            </div>
        </div>
    </div>


</x-layout>
