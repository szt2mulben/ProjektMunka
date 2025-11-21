<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ReNew Kft.')</title>

    @vite('resources/css/app.css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen bg-gray-100 flex">

    <aside class="w-64 bg-white shadow-md p-4 flex flex-col">

        <h1 class="text-xl font-bold mb-6">ReNew Kft.</h1>

        <div class="mb-8">
            @guest
                <div class="space-y-2">
                    <a href="{{ route('login') }}"
                       class="block bg-blue-600 hover:bg-blue-500 text-white text-center py-2 rounded">
                        Bejelentkezés
                    </a>
                    <a href="{{ route('register') }}"
                       class="block bg-green-600 hover:bg-green-500 text-white text-center py-2 rounded">
                        Regisztráció
                    </a>
                </div>
            @endguest

            @auth
                <div x-data="{ open: false }" class="relative">

                    <button @click="open = !open"
                            class="w-full flex items-center bg-gray-200 hover:bg-gray-300 p-3 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         @click.away="open = false"
                         x-transition
                         class="absolute left-0 mt-2 w-full bg-white border rounded shadow-lg p-4 z-50">

                        <div class="text-sm text-gray-600 mb-1">Bejelentkezve:</div>
                        <div class="font-semibold mb-4">{{ auth()->user()->name }}</div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-500 text-white py-2 rounded">
                                Kijelentkezés
                            </button>
                        </form>
                    </div>

                </div>
            @endauth
        </div>

        <nav class="space-y-2 flex-1">
            <a href="{{ route('home') }}" class="block hover:underline">Főoldal</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block hover:underline">Vezérlőpult</a>
                <a href="{{ route('adatbazis.index') }}" class="block hover:underline">Notebook adatbázis</a>
                <a href="{{ route('messages.index') }}" class="block hover:underline">Üzenetek</a>

                <a href="{{ route('processors.index') }}" class="block hover:underline">
                    Processzorok (CRUD)
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="block hover:underline">Admin</a>
                @endif
            @endauth
        </nav>

    </aside>

    <main class="flex-1 p-6">
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
