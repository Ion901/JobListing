<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
    
     <script src="https://kit.fontawesome.com/d258707c8d.js" crossorigin="anonymous"></script>
</head>

<body class="bg-black text-white">

    <nav id="navbar" class="sticky top-0 left-0 w-full z-50 flex justify-between items-center py-4 px-10 border-b border-white/10 bg-black/70 backdrop-blur transition-transform duration-300 ease-in-out">

        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="no image">
            </a>
        </div>

        <div class="space-x-6 font-bold">
            <a href="{{ route('jobs') }}">Jobs</a>
            <a href="#">Career</a>
            <a href="#">Salaries</a>
            <a href="#">Companies</a>
            <a href="/weather">Weather</a>
        </div>

        @auth
            <div class="space-x-6 font-bold flex">
                <a href="/jobs/create">Post a Job</a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')

                    <button>Log Out</button>
                </form>
            </div>
        @endauth

        @guest
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
            </div>
        @endguest
    </nav>
    <div class="px-10">
        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
