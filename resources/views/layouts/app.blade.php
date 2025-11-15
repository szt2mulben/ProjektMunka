<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ReNew Kft.')</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100 flex">
    <aside class="w-64 bg-white shadow-md p-4">
        <h1 class="text-xl font-bold mb-4">ReNew Kft.</h1>

        <nav class="space-y-2">
            <a href="{{ route('home') }}" class="block hover:underline">Főoldal</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block hover:underline">Vezérlőpult</a>
                <a href="{{ route('adatbazis.index') }}" class="block hover:underline">Notebook adatbázis</a>
                <a href="{{ route('messages.index') }}" class="block hover:underline">Üzenetek</a>

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
