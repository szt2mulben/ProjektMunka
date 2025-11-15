@extends('layouts.app')

@section('title', 'Kapcsolat / Üzenetek')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Kapcsolat</h1>
    <p class="text-zinc-400 mb-6">
        Itt tudsz üzenetet küldeni az oldal tulajdonosának, és lentebb
        megtekintheted az eddig elküldött üzeneteket.
    </p>

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-200">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('messages.store') }}" method="POST" class="space-y-4 max-w-xl mb-10">
        @csrf

        <div>
            <label for="subject" class="block mb-1">Tárgy</label>
            <input
                type="text"
                id="subject"
                name="subject"
                class="w-full px-3 py-2 rounded bg-zinc-800 text-white"
                value="{{ old('subject') }}"
            >
            @error('subject')
                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message" class="block mb-1">Üzenet</label>
            <textarea
                id="message"
                name="message"
                rows="5"
                class="w-full px-3 py-2 rounded bg-zinc-800 text-white"
            >{{ old('message') }}</textarea>
            @error('message')
                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button
            type="submit"
            class="px-4 py-2 rounded bg-emerald-600 hover:bg-emerald-500 text-white"
        >
            Küldés
        </button>
    </form>

    <section>
        <h2 class="text-xl font-semibold mb-3">Elküldött üzenetek</h2>

        @if ($messages->isEmpty())
            <p class="text-zinc-400 text-sm">
                Még nem érkezett egyetlen üzenet sem.
            </p>
        @else
            <div class="rounded-xl border border-zinc-800 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-900">
                        <tr>
                            <th class="px-3 py-2 text-left whitespace-nowrap">
                                Küldés ideje
                            </th>
                            <th class="px-3 py-2 text-left">Tárgy</th>
                            <th class="px-3 py-2 text-left">Üzenet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $m)
                            <tr class="border-t border-zinc-800">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    {{ $m->created_at->format('Y.m.d H:i') }}
                                </td>
                                <td class="px-3 py-2">{{ $m->subject }}</td>
                                <td class="px-3 py-2">{{ $m->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
