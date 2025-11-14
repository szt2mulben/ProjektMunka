import React from 'react';
import { Head, useForm, usePage } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { route } from 'ziggy-js';

type MessageRow = {
  id: number;
  subject: string;
  message: string;
  created_at: string;
};

type PageProps = {
  messages: MessageRow[];
};

export default function MessagesPage() {
  const { messages } = usePage<PageProps>().props;

  const { data, setData, post, processing, errors } = useForm({
    subject: '',
    message: '',
  });

  const submit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    post(route('messages.store'));
  };

  return (
    <AppLayout>
      <Head title="Kapcsolat / Üzenetek" />

      <h1 className="text-2xl font-semibold mb-4">Kapcsolat</h1>
      <p className="text-zinc-400 mb-6">
        Itt tudsz üzenetet küldeni az oldal tulajdonosának, és lentebb
        megtekintheted az eddig elküldött üzeneteket.
      </p>

      <form onSubmit={submit} className="space-y-4 max-w-xl mb-10">
        <div>
          <label className="block mb-1">Tárgy</label>
          <input
            type="text"
            className="w-full px-3 py-2 rounded bg-zinc-800 text-white"
            value={data.subject}
            onChange={(e) => setData('subject', e.target.value)}
          />
          {errors.subject && (
            <div className="text-red-400 text-sm">{errors.subject}</div>
          )}
        </div>

        <div>
          <label className="block mb-1">Üzenet</label>
          <textarea
            className="w-full px-3 py-2 rounded bg-zinc-800 text-white"
            rows={5}
            value={data.message}
            onChange={(e) => setData('message', e.target.value)}
          />
          {errors.message && (
            <div className="text-red-400 text-sm">{errors.message}</div>
          )}
        </div>

        <button
          type="submit"
          disabled={processing}
          className="px-4 py-2 rounded bg-emerald-600 hover:bg-emerald-500 text-white"
        >
          Küldés
        </button>
      </form>

      <section>
        <h2 className="text-xl font-semibold mb-3">Elküldött üzenetek</h2>

        {messages.length === 0 ? (
          <p className="text-zinc-400 text-sm">
            Még nem érkezett egyetlen üzenet sem.
          </p>
        ) : (
          <div className="rounded-xl border border-zinc-800 overflow-x-auto">
            <table className="w-full text-sm">
              <thead className="bg-zinc-900">
                <tr>
                  <th className="px-3 py-2 text-left whitespace-nowrap">
                    Küldés ideje
                  </th>
                  <th className="px-3 py-2 text-left">Tárgy</th>
                  <th className="px-3 py-2 text-left">Üzenet</th>
                </tr>
              </thead>
              <tbody>
                {messages.map((m) => (
                  <tr key={m.id} className="border-t border-zinc-800">
                    <td className="px-3 py-2 whitespace-nowrap">
                      {m.created_at}
                    </td>
                    <td className="px-3 py-2">{m.subject}</td>
                    <td className="px-3 py-2">{m.message}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        )}
      </section>
    </AppLayout>
  );
}
