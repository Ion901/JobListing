<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500&display=swap"
    rel="stylesheet">

<x-layout>
    <div class="max-w-[580px] mx-auto flex flex-col gap-4">



        {{-- Email Card --}}
        <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">

            {{-- Header --}}
            <div class="bg-[#1a1a2e] px-8 py-8 flex flex-col gap-5">

                {{-- Headline --}}
                <h1 class="font-lora text-2xl sm:text-3xl font-semibold text-white leading-snug tracking-tight max-w-xs">
                    Confirm your <em class="not-italic text-red-400">email</em> to get started
                </h1>
            </div>

            {{-- Body --}}
            <div class="px-8 py-8 flex flex-col gap-5">

                {{-- Greeting --}}
                <p class="text-sm text-stone-500 leading-relaxed">
                    Hi, <span class="font-medium text-stone-800">{{ auth()->user()->email }}</span>,
                </p>

                {{-- Message --}}
                <p class="text-sm text-stone-500 leading-relaxed">
                    Thanks for signing up. Please verify your email address so we know it's really you.
                    This keeps your account secure and ensures you never miss important updates.
                </p>

                @if(!session('message'))
                {{-- CTA Block --}}
                <div
                    class="bg-red-50 border border-red-100 rounded-xl px-6 py-6 flex flex-col items-center gap-3 text-center">
                    {{-- Expiry badge --}}
                    <span
                        class="inline-flex items-center gap-1.5 text-xs font-medium text-amber-700 bg-amber-100 px-3 py-1 rounded-full">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="6.5" stroke="currentColor" stroke-width="1.5" />
                            <path d="M8 5v3.5l2 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        Expires in 24 hours
                    </span>

                    <p class="text-xs font-medium tracking-widest uppercase text-red-500">Action required</p>

                    {{-- Verify Button --}}
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button
                            class="inline-block bg-red-500 hover:bg-red-600 active:scale-95 transition-all duration-150 text-white text-sm font-medium px-10 py-3 rounded-lg">
                            Verify my email
                        </button>
                    </form>


                    <div class="flex items-center">
                    <p class="text-xs text-stone-400">Something is wrong,       </p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button class='pl-2 font-bold underline text-blue-400 cursor-pointer'>
                            Resend code here
                        </button>
                    </form>
                </div>

            </div>
            @else
            <p class="text-xl text-red-500">{{session('message')}}</p>
            @endif


        </div>
    </div>
</x-layout>
