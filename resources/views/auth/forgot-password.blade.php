<x-layout>
    <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8 dark">
        <x-page-heading class="text-3xl font-extrabold text-gray-900 dark:text-white">Forgot your
            password</x-page-heading>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md ">
            <div class="bg-gray-800 px-7 py-7 rounded-t-lg">

                <h1 class="font-lora text-2xl font-semibold text-white leading-snug tracking-tight">
                    Forgot your <em class="not-italic text-red-400">password?</em>
                </h1>
                <p class="text-sm text-white/50 mt-1.5 leading-relaxed">
                    No worries. Enter your email and we'll send you a reset link.
                </p>
            </div>
            <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-b-lg sm:px-10 sm:pb-6 sm:shadow">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @else
                    <x-forms.form method="POST" action="{{ route('password.email') }}">
                        <x-forms.input label="Email address/ Username" name="email" type="text" id="email"
                            data-testid="username" autocomplete="email"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3! py-2.5! placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm" />

                        <x-forms.submit-button>Send Reset Link</x-forms.submit-button>
                    </x-forms.form>
                @endif
                <div class="m-auto mt-6 w-fit md:mt-8">
                    <span class="m-auto text-gray-400">Remembered your password?
                        <x-forms.link-action text="Sign In" link="{{ route('login') }}"
                            class="font-medium text-indigo-400 hover:text-indigo-500 underline" />
                    </span>
                </div>
            </div>
        </div>
    </div>

</x-layout>
