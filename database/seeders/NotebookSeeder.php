<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Processor, OperatingSystem, Laptop};
use Illuminate\Support\Str;

class NotebookSeeder extends Seeder
{
    public function run(): void
    {
        $this->importTsv(
            storage_path('app/data/processzor.txt'),
            function(array $row) {
                Processor::updateOrCreate(
                    ['id' => (int)$row['id']],
                    ['gyarto' => $row['gyarto'], 'tipus' => $row['tipus']]
                );
            }
        );

        $this->importTsv(
            storage_path('app/data/oprendszer.txt'),
            function(array $row) {
                OperatingSystem::updateOrCreate(
                    ['id' => (int)$row['id']],
                    ['nev' => $row['nev']]
                );
            }
        );

        $this->importTsv(
            storage_path('app/data/gep.txt'),
            function(array $row) {
                Laptop::create([
                    'gyarto'               => $row['gyarto'],
                    'tipus'                => $row['tipus'],
                    'kijelzo'              => (string)$row['kijelzo'],
                    'memoria'              => (int)$row['memoria'],
                    'merevlemez'           => (int)$row['merevlemez'],
                    'videovezerlo'         => $row['videovezerlo'] ?: null,
                    'ar'                   => (int)$row['ar'],
                    'processor_id'         => (int)$row['processzorid'],
                    'operating_system_id'  => (int)$row['oprendszerid'],
                    'db'                   => (int)$row['db'],
                ]);
            }
        );
    }

    private function importTsv(string $path, callable $handleRow): void
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!$lines || count($lines) < 2) return;

        $headers = array_map(
            fn($h) => Str::of($h)->lower()->trim()->toString(),
            preg_split("/\t/", $lines[0])
        );

        for ($i = 1; $i < count($lines); $i++) {
            $cols = preg_split("/\t/", $lines[$i]);
            if (!$cols) continue;

            $row = [];
            foreach ($headers as $idx => $name) {
                $row[$name] = $cols[$idx] ?? '';
                $row[$name] = trim($row[$name]);
            }
            $handleRow($row);
        }
    }
}
