<?php

namespace App\Http\Controllers;

use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function index()
    {
        $processors = Processor::orderBy('gyarto')->orderBy('tipus')->paginate(20);

        return view('processzorok.index', [
            'processors' => $processors,
        ]);
    }

    public function create()
    {
        return view('processzorok.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gyarto' => ['required', 'string', 'max:255'],
            'tipus'  => ['required', 'string', 'max:255'],
        ]);

        Processor::create($validated);

        return redirect()
            ->route('processors.index')
            ->with('success', 'Processzor sikeresen rögzítve!');
    }

    public function edit(Processor $processor)
    {
        return view('processzorok.edit', [
            'processor' => $processor,
        ]);
    }

    public function update(Request $request, Processor $processor)
    {
        $validated = $request->validate([
            'gyarto' => ['required', 'string', 'max:255'],
            'tipus'  => ['required', 'string', 'max:255'],
        ]);

        $processor->update($validated);

        return redirect()
            ->route('processors.index')
            ->with('success', 'Processzor sikeresen módosítva!');
    }

    public function destroy(Processor $processor)
    {
        $processor->delete();

        return redirect()
            ->route('processors.index')
            ->with('success', 'Processzor sikeresen törölve!');
    }
}
