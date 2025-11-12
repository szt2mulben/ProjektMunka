import React from "react";
import { Head, Link, usePage } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";
import type { SharedData } from "@/types";

type Stat = { label: string; value: string };
type Feature = { title: string; text: string };
type Product = { sku: string; name: string; cpu: string; ram: string; ssd: string; price: string };

// A szerverről érkező company prop típusa
type Company = { name: string; tagline: string };

// A teljes Inertia props ezen az oldalon: a közös SharedData + a saját company propunk
type HomePageProps = SharedData & { company?: Company };

const DEFAULT_COMPANY: Company = {
  name: "ReNew Kft.",
  tagline: "Gyárilag felújított notebookok – jobb, mint az új.",
};

const stats: Stat[] = [
  { label: "Ellenőrzött készülék", value: "2 300+" },
  { label: "Átlagos megtakarítás", value: "≈ 35%" },
  { label: "Garanciaidő", value: "12–36 hó" },
];

const usp: Feature[] = [
  {
    title: "Gyári felújítás",
    text: "ISO-folyamat szerint ellenőrizve; hibás alkatrészek cserélve, újrapasztázás, tisztítás és végteszt.",
  },
  {
    title: "Valódi garancia",
    text: "Minden géphez számla és 12–36 hónap jótállás. Vállalati minőség, lakossági biztonság.",
  },
  {
    title: "Fenntarthatóság",
    text: "Akár 200 kg CO₂-t spórolhatsz meg készülékenként – kevesebb e-hulladék, hosszabb élettartam.",
  },
  {
    title: "Azonnali átvétel",
    text: "Raktárkészletről szállítunk; személyes átvétel és futár is elérhető.",
  },
];

const featured: Product[] = [
  { sku: "RN-T14-G3", name: "ThinkPad T14 G3", cpu: "Ryzen 7 PRO", ram: "16 GB", ssd: "512 GB NVMe", price: "249 990 Ft" },
  { sku: "RN-L7400", name: "Latitude 7400", cpu: "Core i7", ram: "16 GB", ssd: "512 GB NVMe", price: "219 990 Ft" },
  { sku: "RN-ELITE", name: "HP EliteBook 840 G7", cpu: "Core i5", ram: "16 GB", ssd: "256 GB NVMe", price: "189 990 Ft" },
  { sku: "RN-MBP16", name: "MacBook Pro 16” (Intel)", cpu: "Core i9", ram: "32 GB", ssd: "1 TB NVMe", price: "459 990 Ft" },
];

export default function HomeIndex() {
  const { company } = usePage<HomePageProps>().props;
  const companyData = company ?? DEFAULT_COMPANY;

  return (
    <AppLayout>
      <Head title={`Főoldal — ${companyData.name}`} />

      <section className="relative overflow-hidden rounded-2xl border border-zinc-800 bg-gradient-to-br from-zinc-900 to-zinc-800 p-8 md:p-12">
        <div className="max-w-3xl">
          <span className="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 text-sm text-emerald-300">
            {companyData.name} • Gyárilag felújított notebookok
          </span>

          <h1 className="mt-4 text-3xl md:text-5xl font-bold tracking-tight">
            Jobb, mint az új — <span className="text-emerald-400">gyári felújítás</span>, korrekt ár, valódi garancia.
          </h1>

          <p className="mt-4 text-zinc-300 text-lg">
            Seholország fővárosában működünk, kizárólag gondosan válogatott, vállalati kategóriás notebookokat kínálunk —
            <b> jelentős megtakarítással</b> az új árhoz képest.
          </p>

          <div className="mt-6 flex flex-wrap gap-3">
            <a
              href="#products"
              className="rounded-lg px-5 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-medium"
              aria-label="Ugrás a kiemelt termékekhez"
            >
              Kiemelt gépek
            </a>
            <Link
              href="/uzenetek"
              className="rounded-lg px-5 py-3 bg-zinc-700 hover:bg-zinc-600 text-white font-medium"
            >
              Érdeklődés / Ajánlat
            </Link>
          </div>
        </div>

        <div className="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-emerald-600/20 blur-3xl" />
        <div className="pointer-events-none absolute -right-10 top-32 h-56 w-56 rounded-full bg-emerald-400/10 blur-2xl" />
      </section>

      <section className="mt-8 grid gap-6 md:grid-cols-2">
        {usp.map((u, i) => (
          <article key={i} className="rounded-xl border border-zinc-800 p-6 hover:border-zinc-700 transition">
            <h2 className="text-lg font-semibold">{u.title}</h2>
            <p className="mt-2 text-zinc-300 leading-relaxed">{u.text}</p>
          </article>
        ))}
      </section>

      <section className="mt-8 grid gap-6 md:grid-cols-3">
        {stats.map((s, i) => (
          <div key={i} className="rounded-xl border border-zinc-800 p-6 text-center">
            <div className="text-3xl font-bold">{s.value}</div>
            <div className="mt-1 text-zinc-400">{s.label}</div>
          </div>
        ))}
      </section>

      <section id="products" className="mt-10">
        <h2 className="text-xl font-semibold mb-4">Kiemelt kínálat</h2>

        <div className="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
          {featured.map((p) => (
            <article key={p.sku} className="rounded-xl border border-zinc-800 p-5 hover:border-zinc-700 transition">
              <div className="aspect-[4/3] w-full overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900/60" />

              <div className="mt-3 text-sm text-zinc-400">{p.sku}</div>
              <h3 className="text-lg font-semibold">{p.name}</h3>

              <ul className="mt-2 text-zinc-300 text-sm space-y-1">
                <li>CPU: {p.cpu}</li>
                <li>Memória: {p.ram}</li>
                <li>Tárhely: {p.ssd}</li>
              </ul>

              <div className="mt-3 flex items-center justify-between">
                <div className="text-xl font-bold">{p.price}</div>
                <Link
                  href="/uzenetek"
                  className="rounded-md px-3 py-1.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-medium"
                >
                  Érdeklődöm
                </Link>
              </div>
            </article>
          ))}
        </div>

        <p className="mt-3 text-sm text-zinc-400">
          * Az árak tájékoztató jellegűek, készlettől függően változhatnak.
        </p>
      </section>

      <section className="mt-10 rounded-xl border border-zinc-800 p-6">
        <h2 className="text-xl font-semibold">Hogyan lesz „jobb, mint az új”?</h2>
        <ol className="mt-3 grid gap-4 md:grid-cols-4 list-decimal pl-6 text-zinc-300">
          <li>Eszközvizsgálat (akku, kijelző, billentyűzet, portok, hűtés)</li>
          <li>Alkatrészcsere (SSD/akku/ventilátor, ahol szükséges)</li>
          <li>Teljes tisztítás, újrapasztázás, BIOS-frissítés</li>
          <li>Windows aktiválás, „clean image”, végteszt & minőségellenőrzés</li>
        </ol>
      </section>

      <section className="mt-10 grid gap-6 md:grid-cols-3">
        {[
          { name: "Gábor", text: "Számla, garancia, gyakorlatilag új állapot — az EliteBook hibátlan." },
          { name: "Lilla", text: "Gyors ügyintézés, korrekt kommunikáció; a ThinkPad csendes és erős." },
          { name: "Márk", text: "Fenntartható és olcsóbb is — teljesen elégedett vagyok." },
        ].map((t, i) => (
          <blockquote key={i} className="rounded-xl border border-zinc-800 p-6">
            <p className="text-zinc-300">“{t.text}”</p>
            <footer className="mt-3 text-sm text-zinc-400">— {t.name}</footer>
          </blockquote>
        ))}
      </section>

      <section id="contact" className="mt-10 rounded-2xl border border-zinc-800 p-6 bg-zinc-900/40">
        <h2 className="text-xl font-semibold">Lépj kapcsolatba velünk</h2>
        <p className="mt-2 text-zinc-300">
          Írj üzenetet az oldalon, vagy keress e-mailben:{" "}
          <a className="underline" href="mailto:info@renew.example">info@renew.example</a>
        </p>
        <div className="mt-4 flex gap-3">
          <Link href="/uzenetek" className="rounded-lg px-5 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-medium">
            Üzenet küldése
          </Link>
          <a href="#products" className="rounded-lg px-5 py-3 bg-zinc-700 hover:bg-zinc-600 text-white font-medium">
            Kínálat megtekintése
          </a>
        </div>
      </section>
    </AppLayout>
  );
}
