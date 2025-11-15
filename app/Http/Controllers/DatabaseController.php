<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class DatabaseController extends Controller
{
    public function index()
    {
        $laptops = Laptop::with(['processor','operatingSystem'])
            ->orderBy('ar', 'desc')
            ->paginate(20)
            ->through(fn($l) => [
                'id'      => $l->id,
                'gyarto'  => $l->gyarto,
                'tipus'   => $l->tipus,
                'proc'    => $l->processor?->gyarto.' '.$l->processor?->tipus,
                'os'      => $l->operatingSystem?->nev,
                'mem'     => $l->memoria.' MB',
                'hdd'     => $l->merevlemez.' GB',
                'gpu'     => $l->videovezerlo,
                'ar'      => number_format($l->ar, 0, ',', ' ').' Ft',
                'db'      => $l->db,
            ]);

        return view('database.index', [
            'items' => $laptops,
        ]);
    }
}
