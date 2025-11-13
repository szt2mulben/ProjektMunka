import React from "react";
import { Head, useForm, usePage } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

export default function MessagesPage() {
  const { data, setData, post, processing, errors } = useForm({
    subject: "",
    message: "",
  });

  const { flash } = usePage().props as { flash?: { success?: string } };

  const submit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    post("/uzenetek");
  };

  return (
    <AppLayout>
      <Head title="Kapcsolat / Üzenetküldés" />

      <h1 className="text-2xl font-semibold mb-4">Kapcsolat</h1>
      <p className="text-zinc-400 mb-6">
        Itt tudsz üzenetet küldeni az oldal tulajdonosának.
      </p>

      {flash?.success && (
        <div className="mb-4 rounded bg-emerald-600/20 px-4 py-2 text-emerald-200">
          {flash.success}
        </div>
      )}

      <form onSubmit={submit} className="space-y-4 max-w-xl">
        <div>
          <label className="block mb-1">Tárgy</label>
          <input
            type="text"
            className="w-full px-3 py-2 rounded bg-zinc-800 text-white"
            value={data.subject}
            onChange={(e) => setData("subject", e.target.value)}
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
            onChange={(e) => setData("message", e.target.value)}
          />
          {errors.message && (
            <div className="text-red-400 text-sm">{errors.message}</div>
          )}
        </div>

        <button
          type="submit"
          disabled={processing}
          className="px-4 py-2 rounded bg-emerald-600 hover:bg-emerald-500 text-white disabled:opacity-70"
        >
          {processing ? "Küldés..." : "Küldés"}
        </button>
      </form>
    </AppLayout>
  );
}
