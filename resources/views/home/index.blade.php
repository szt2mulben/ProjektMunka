@extends('layouts.app')

@section('title', 'Főoldal')

@section('content')
    @php
        $companyData = $company ?? [
            'name' => 'ReNew Kft.',
            'tagline' => 'Gyárilag felújított notebookok – jobb, mint az új.',
        ];

        $stats = [
            ['label' => 'Ellenőrzött készülék', 'value' => '2 300+'],
            ['label' => 'Átlagos megtakarítás', 'value' => '≈ 35%'],
            ['label' => 'Garanciaidő', 'value' => '12–36 hó'],
        ];

        $usp = [
            [
                'title' => 'Gyári felújítás',
                'text'  => 'ISO-folyamat szerint ellenőrizve; hibás alkatrészek cserélve, újrapasztázás, tisztítás és végteszt.',
            ],
            [
                'title' => 'Valódi garancia',
                'text'  => 'Minden géphez számla és 12–36 hónap jótállás. Vállalati minőség, lakossági biztonság.',
            ],
            [
                'title' => 'Fenntarthatóság',
                'text'  => 'Akár 200 kg CO₂-t spórolhatsz meg készülékenként – kevesebb e-hulladék, hosszabb élettartam.',
            ],
            [
                'title' => 'Azonnali átvétel',
                'text'  => 'Raktárkészletről szállítunk; személyes átvétel és futár is elérhető.',
            ],
        ];

        $featured = [
            ['sku' => 'RN-T14-G3', 'name' => 'ThinkPad T14 G3',          'cpu' => 'Ryzen 7 PRO',       'ram' => '16 GB', 'ssd' => '512 GB NVMe', 'price' => '249 990 Ft'],
            ['sku' => 'RN-L7400',  'name' => 'Latitude 7400',            'cpu' => 'Core i7',           'ram' => '16 GB', 'ssd' => '512 GB NVMe', 'price' => '219 990 Ft'],
            ['sku' => 'RN-ELITE',  'name' => 'HP EliteBook 840 G7',      'cpu' => 'Core i5',           'ram' => '16 GB', 'ssd' => '256 GB NVMe', 'price' => '189 990 Ft'],
            ['sku' => 'RN-MBP16',  'name' => 'MacBook Pro 16” (Intel)',  'cpu' => 'Core i9',           'ram' => '32 GB', 'ssd' => '1 TB NVMe',   'price' => '459 990 Ft'],
        ];

        $testimonials = [
            ['name' => 'Gábor', 'text' => 'Számla, garancia, gyakorlatilag új állapot — az EliteBook hibátlan.'],
            ['name' => 'Lilla', 'text' => 'Gyors ügyintézés, korrekt kommunikáció; a ThinkPad csendes és erős.'],
            ['name' => 'Márk',  'text' => 'Fenntartható és olcsóbb is — teljesen elégedett vagyok.'],
        ];
    @endphp

    <section class="relative overflow-hidden rounded-2xl border border-zinc-800 bg-gradient-to-br from-zinc-900 to-zinc-800 p-8 md:p-12">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 text-sm text-emerald-300">
                {{ $companyData['name'] }} • Gyárilag felújított notebookok
            </span>

            <h1 class="mt-4 text-3xl md:text-5xl font-bold tracking-tight">
                Jobb, mint az új — <span class="text-emerald-400">gyári felújítás</span>, korrekt ár, valódi garancia.
            </h1>

            <p class="mt-4 text-zinc-300 text-lg">
                Seholország fővárosában működünk, kizárólag gondosan válogatott, vállalati kategóriás notebookokat kínálunk —
                <b>jelentős megtakarítással</b> az új árhoz képest.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a
                    href="#products"
                    class="rounded-lg px-5 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-medium"
                    aria-label="Ugrás a kiemelt termékekhez"
                >
                    Kiemelt gépek
                </a>

                <a
                    href="{{ route('messages.index') }}"
                    class="rounded-lg px-5 py-3 bg-zinc-700 hover:bg-zinc-600 text-white font-medium"
                >
                    Érdeklődés / Ajánlat
                </a>
            </div>
        </div>

        <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-emerald-600/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-10 top-32 h-56 w-56 rounded-full bg-emerald-400/10 blur-2xl"></div>
    </section>

    <section class="mt-8 grid gap-6 md:grid-cols-2">
        @foreach ($usp as $u)
            <article class="rounded-xl border border-zinc-800 p-6 hover:border-zinc-700 transition">
                <h2 class="text-lg font-semibold">{{ $u['title'] }}</h2>
                <p class="mt-2 text-zinc-300 leading-relaxed">{{ $u['text'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="mt-8 grid gap-6 md:grid-cols-3">
        @foreach ($stats as $s)
            <div class="rounded-xl border border-zinc-800 p-6 text-center">
                <div class="text-3xl font-bold">{{ $s['value'] }}</div>
                <div class="mt-1 text-zinc-400">{{ $s['label'] }}</div>
            </div>
        @endforeach
    </section>

    <section id="products" class="mt-10">
        <h2 class="text-xl font-semibold mb-4">Kiemelt kínálat</h2>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($featured as $p)
                <article class="rounded-xl border border-zinc-800 p-5 hover:border-zinc-700 transition">
                    <div class="aspect-[4/3] w-full overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900/60"></div>

                    <div class="mt-3 text-sm text-zinc-400">{{ $p['sku'] }}</div>
                    <h3 class="text-lg font-semibold">{{ $p['name'] }}</h3>

                    <ul class="mt-2 text-zinc-300 text-sm space-y-1">
                        <li>CPU: {{ $p['cpu'] }}</li>
                        <li>Memória: {{ $p['ram'] }}</li>
                        <li>Tárhely: {{ $p['ssd'] }}</li>
                    </ul>

                    <div class="mt-3 flex items-center justify-between">
                        <div class="text-xl font-bold">{{ $p['price'] }}</div>
                        <a
                            href="{{ route('messages.index') }}"
                            class="rounded-md px-3 py-1.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-medium"
                        >
                            Érdeklődöm
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <p class="mt-3 text-sm text-zinc-400">
            * Az árak tájékoztató jellegűek, készlettől függően változhatnak.
        </p>
    </section>

    <section class="mt-10 rounded-xl border border-zinc-800 p-6">
        <h2 class="text-xl font-semibold">Hogyan lesz „jobb, mint az új”?</h2>
        <ol class="mt-3 grid gap-4 md:grid-cols-4 list-decimal pl-6 text-zinc-300">
            <li>Eszközvizsgálat (akku, kijelző, billentyűzet, portok, hűtés)</li>
            <li>Alkatrészcsere (SSD/akku/ventilátor, ahol szükséges)</li>
            <li>Teljes tisztítás, újrapasztázás, BIOS-frissítés</li>
            <li>Windows aktiválás, „clean image”, végteszt &amp; minőségellenőrzés</li>
        </ol>
    </section>

    <section class="mt-10 grid gap-6 md:grid-cols-3">
        @foreach ($testimonials as $t)
            <blockquote class="rounded-xl border border-zinc-800 p-6">
                <p class="text-zinc-300">“{{ $t['text'] }}”</p>
                <footer class="mt-3 text-sm text-zinc-400">— {{ $t['name'] }}</footer>
            </blockquote>
        @endforeach
    </section>

    <section id="contact" class="mt-10 rounded-2xl border border-zinc-800 p-6 bg-zinc-900/40">
        <h2 class="text-xl font-semibold">Lépj kapcsolatba velünk</h2>
        <p class="mt-2 text-zinc-300">
            Írj üzenetet az oldalon, vagy keress e-mailben:
            <a class="underline" href="mailto:info@renew.example">info@renew.example</a>
        </p>
        <div class="mt-4 flex gap-3">
            <a
                href="{{ route('messages.index') }}"
                class="rounded-lg px-5 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-medium"
            >
                Üzenet küldése
            </a>
            <a
                href="#products"
                class="rounded-lg px-5 py-3 bg-zinc-700 hover:bg-zinc-600 text-white font-medium"
            >
                Kínálat megtekintése
            </a>
        </div>
    </section>
@endsection
