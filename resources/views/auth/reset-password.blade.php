<x-layout>
    <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8 dark">
        <x-page-heading class="text-3xl font-extrabold text-gray-900 dark:text-white">New password</x-page-heading>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-gray-800 px-7 py-7 rounded-t-lg">

                <h1 class="font-lora text-2xl font-semibold text-white leading-snug tracking-tight">
                    Set your new <em class="not-italic text-red-400">password?</em>
                </h1>
                <p class="text-sm text-white/50 mt-1.5 leading-relaxed">
                    Choose a strong password and confirm it below.
                </p>
            </div>
            <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-b-lg sm:px-10 sm:pb-6 sm:shadow">

                <x-forms.form method="POST" action="{{ route('password.update',['token' => $token]) }}">

                    <input type="hidden" name="token" value="{{ $token }}">

                   <x-forms.input label="Email address" name="email" type="text" id="email"
                        data-testid="username" autocomplete="email" readonly class="cursor-not-allowed text-stone-400 focus:outline-none" value="{{ $email }}" />

                    <x-forms.input label="New Password" id="password" name="password" type="password"
                        data-testid="password" autocomplete="current-password" class="px-3 py-2.5 pr-9">
                        <x-forms.checkbox-password targetId="#password" />
                    </x-forms.input>
                    <x-forms.bar-password />


                    <x-forms.input label="Password Confirmation" id="password_confirmation" name="password_confirmation"
                        type="password" data-testid="password" autocomplete="password_confirmation">
                        <x-forms.checkbox-password targetId="#password_confirmation" />
                    </x-forms.input>
                    <p class="text-xs hidden" id="match-msg"></p>

                    <x-forms.submit-button>Reset your password </x-forms.submit-button>
                </x-forms.form>

                <div class="m-auto mt-6 w-fit md:mt-8">
                    <span class="m-auto text-gray-400">Back to
                        <x-forms.link-action text="Sign in" link="/login"
                            class="font-medium text-indigo-400 hover:text-indigo-500 underline" />
                    </span>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        @vite('resources/js/validationPassword.js')
    @endpush
</x-layout>
