@extends('layouts.app')

@section('title', 'Új processzor felvitele')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Új processzor felvitele</h1>

    <form action="{{ route('processors.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block mb-1">Gyártó</label>
            <input type="text" name="gyarto" value="{{ old('gyarto') }}"
                   class="w-full px-3 py-2 rounded bg-zinc-800 text-white">
            @error('gyarto')
                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Típus</label>
            <input type="text" name="tipus" value="{{ old('tipus') }}"
                   class="w-full px-3 py-2 rounded bg-zinc-800 text-white">
            @error('tipus')
                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit"
                    class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded">
                Mentés
            </button>
            <a href="{{ route('processors.index') }}"
               class="px-4 py-2 bg-zinc-700 text-white rounded">
                Mégse
            </a>
        </div>
    </form>
@endsection
