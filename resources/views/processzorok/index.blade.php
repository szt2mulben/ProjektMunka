@extends('layouts.app')

@section('title', 'Processzorok – CRUD')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Processzorok – CRUD</h1>

        <a href="{{ route('processors.create') }}"
           class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded">
            Új processzor felvitele
        </a>
    </div>

    <div class="rounded-xl border border-zinc-800 overflow-x-auto bg-white">
        <table class="w-full text-sm">
            <thead class="bg-zinc-900 text-white">
                <tr>
                    <th class="px-3 py-2 text-left">ID</th>
                    <th class="px-3 py-2 text-left">Gyártó</th>
                    <th class="px-3 py-2 text-left">Típus</th>
                    <th class="px-3 py-2 text-left">Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processors as $p)
                    <tr class="border-t border-zinc-200">
                        <td class="px-3 py-2">{{ $p->id }}</td>
                        <td class="px-3 py-2">{{ $p->gyarto }}</td>
                        <td class="px-3 py-2">{{ $p->tipus }}</td>
                        <td class="px-3 py-2 space-x-2 whitespace-nowrap">
                            <a href="{{ route('processors.edit', $p) }}"
                               class="inline-block px-2 py-1 text-xs rounded bg-blue-600 hover:bg-blue-500 text-white">
                                Módosítás
                            </a>

                            <form action="{{ route('processors.destroy', $p) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Biztosan törlöd ezt a processzort?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 text-xs rounded bg-red-600 hover:bg-red-500 text-white">
                                    Törlés
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($processors->hasPages())
        <div class="mt-4">
            {{ $processors->links() }}
        </div>
    @endif
@endsection
