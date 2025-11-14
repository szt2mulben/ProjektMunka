import AppLayout from '@/layouts/app-layout';
import { Head, Link, usePage } from '@inertiajs/react';

type Row = {
  id: number;
  gyarto: string;
  tipus: string;
  proc: string;
  os: string;
  mem: string;
  hdd: string;
  gpu: string;
  ar: string;
  db: number;
};
type Props = { items: { data: Row[]; links: any[] } };

export default function DatabaseIndex() {
  const { props } = usePage<Props>();
  const rows = props.items.data;

  return (
    <AppLayout>
      <Head title="Adatbázis" />

      <h1 className="text-2xl font-semibold mb-4">Adatbázis – Notebook kínálat</h1>

      <div className="rounded-xl border border-zinc-800 overflow-x-auto">
        <table className="w-full text-sm">
          <thead className="bg-zinc-900">
            <tr>
              <th className="px-3 py-2 text-left">Gyártó</th>
              <th className="px-3 py-2 text-left">Típus</th>
              <th className="px-3 py-2 text-left">Processzor</th>
              <th className="px-3 py-2 text-left">OS</th>
              <th className="px-3 py-2 text-left">Memória</th>
              <th className="px-3 py-2 text-left">HDD/SSD</th>
              <th className="px-3 py-2 text-left">VGA</th>
              <th className="px-3 py-2 text-right">Ár</th>
              <th className="px-3 py-2 text-right">DB</th>
            </tr>
          </thead>
          <tbody>
            {rows.map((r) => (
              <tr key={r.id} className="border-t border-zinc-800">
                <td className="px-3 py-2">{r.gyarto}</td>
                <td className="px-3 py-2">{r.tipus}</td>
                <td className="px-3 py-2">{r.proc}</td>
                <td className="px-3 py-2">{r.os}</td>
                <td className="px-3 py-2">{r.mem}</td>
                <td className="px-3 py-2">{r.hdd}</td>
                <td className="px-3 py-2">{r.gpu}</td>
                <td className="px-3 py-2 text-right">{r.ar}</td>
                <td className="px-3 py-2 text-right">{r.db}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </AppLayout>
  );
}
