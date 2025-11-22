@extends('layouts.app')

@section('title', 'Admin felület – ReNew Kft.')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Admin felület</h1>

    <p class="text-gray-600 mb-6">
        Üdv, <span class="font-semibold">{{ auth()->user()->name }}</span>!
        Ez az adminisztrációs felület.
    </p>

    <div class="grid gap-4 md:grid-cols-3 mb-8">
        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <h2 class="font-semibold mb-2">Processzorok (CRUD)</h2>
            <p class="text-sm text-gray-600 mb-3">
                A processzorok táblájának kezelése.
            </p>
            <a href="{{ route('processors.index') }}"
               class="inline-block px-3 py-2 bg-emerald-600 hover:bg-emerald-500 text-white text-sm rounded">
                Processzorok kezelése
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <h2 class="font-semibold mb-2">Notebook adatbázis</h2>
            <p class="text-sm text-gray-600 mb-3">
                A rögzített notebookok áttekintése.
            </p>
            <a href="{{ route('adatbazis.index') }}"
               class="inline-block px-3 py-2 bg-blue-600 hover:bg-blue-500 text-white text-sm rounded">
                Notebook lista
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <h2 class="font-semibold mb-2">Üzenetek</h2>
            <p class="text-sm text-gray-600 mb-3">
                A regisztrált felhasználók üzenetei.
            </p>
            <a href="{{ route('messages.index') }}"
               class="inline-block px-3 py-2 bg-gray-800 hover:bg-gray-700 text-white text-sm rounded">
                Üzenetek megnyitása
            </a>
        </div>
    </div>
@endsection
