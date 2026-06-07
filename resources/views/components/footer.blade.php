<footer class="mt-16 border-t border-white/10 bg-black/70">
    <div class="max-w-[986px] mx-auto px-4 py-10">
        <div class="grid gap-8 md:grid-cols-3">
            <div class="space-y-3">
                <a href="/" class="inline-flex items-center">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions logo" class="h-8 w-auto">
                </a>
                <p class="text-sm text-gray-400">
                    Gaseste oportunitati potrivite si aplica rapid la joburile care conteaza pentru tine.
                </p>
                <div class="flex items-center gap-3 text-gray-300">
                    <a href="#" aria-label="Google" class="hover:text-white transition-colors duration-200">
                        <x-icons.google class="h-5 w-5" width="20px" height="20px" />
                    </a>
                    <a href="#" aria-label="GitHub" class="hover:text-white transition-colors duration-200">
                        <x-icons.github class="h-5 w-5" width="20px" height="20px" />
                    </a>
                </div>
            </div>

            <div>
                <x-section-heading>Explore</x-section-heading>
                <div class="mt-4 flex flex-col gap-2 text-sm text-gray-300">
                    <x-forms.link-action :link="route('jobs')" class="hover:text-white transition-colors duration-200">
                        Jobs
                    </x-forms.link-action>
                    <x-forms.link-action :link="route('company')" class="hover:text-white transition-colors duration-200">
                        Companii
                    </x-forms.link-action>
                    <x-forms.link-action :link="route('tags')" class="hover:text-white transition-colors duration-200">
                        Tag-uri
                    </x-forms.link-action>
                    <x-forms.link-action :link="route('studies')" class="hover:text-white transition-colors duration-200">
                        Studii
                    </x-forms.link-action>
                </div>
            </div>

            <div>
                <x-section-heading>Account</x-section-heading>
                <div class="mt-4 flex flex-col gap-2 text-sm text-gray-300">
                    @guest
                        <x-forms.link-action link="/register" class="hover:text-white transition-colors duration-200">
                            Sign Up
                        </x-forms.link-action>
                        <x-forms.link-action :link="route('login')" class="hover:text-white transition-colors duration-200">
                            Log In
                        </x-forms.link-action>
                    @endguest

                    @auth
                        <x-forms.link-action :link="route('panel')" class="hover:text-white transition-colors duration-200">
                            Dashboard
                        </x-forms.link-action>

                        @if (auth()->user()->isEmployee())
                            <x-forms.link-action :link="route('applications')" class="hover:text-white transition-colors duration-200">
                                My Applications
                            </x-forms.link-action>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-white/10 pt-4 text-xs text-gray-500 flex flex-wrap gap-2 justify-between">
            <p>&copy; {{ now()->year }} Pixel Positions. All rights reserved.</p>
        </div>
    </div>
</footer>
