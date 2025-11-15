@extends('layouts.app')

@section('title', 'Adatbázis – Notebook kínálat')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">
        Adatbázis – Notebook kínálat
    </h1>

    <div class="rounded-xl border border-zinc-800 overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-zinc-900">
                <tr>
                    <th class="px-3 py-2 text-left">Gyártó</th>
                    <th class="px-3 py-2 text-left">Típus</th>
                    <th class="px-3 py-2 text-left">Processzor</th>
                    <th class="px-3 py-2 text-left">OS</th>
                    <th class="px-3 py-2 text-left">Memória</th>
                    <th class="px-3 py-2 text-left">HDD/SSD</th>
                    <th class="px-3 py-2 text-left">VGA</th>
                    <th class="px-3 py-2 text-right">Ár</th>
                    <th class="px-3 py-2 text-right">DB</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $r)
                    <tr class="border-t border-zinc-800">
                        <td class="px-3 py-2">{{ $r['gyarto'] }}</td>
                        <td class="px-3 py-2">{{ $r['tipus'] }}</td>
                        <td class="px-3 py-2">{{ $r['proc'] }}</td>
                        <td class="px-3 py-2">{{ $r['os'] }}</td>
                        <td class="px-3 py-2">{{ $r['mem'] }}</td>
                        <td class="px-3 py-2">{{ $r['hdd'] }}</td>
                        <td class="px-3 py-2">{{ $r['gpu'] }}</td>
                        <td class="px-3 py-2 text-right">{{ $r['ar'] }}</td>
                        <td class="px-3 py-2 text-right">{{ $r['db'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($items->hasPages())
        <div class="mt-4">
            {{ $items->links() }}
        </div>
    @endif
@endsection
