<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventCsvSeeder extends Seeder
{
    public function run(): void
    {
        // Pfad zur CSV-Datei
        $path = storage_path('app/events_import.csv');

        if (!file_exists($path)) {
            $this->command->warn("⚠️ CSV file not found at: $path");
            return;
        }

        // Datei öffnen und Zeilen durchgehen
        if (($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle); // erste Zeile = Header

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data = array_combine($header, $row);

                Event::create([
                    'title'       => $data['title'],
                    'starts_at'   => $data['starts_at'],
                    'location'    => $data['location'],
                    'description' => $data['description'] ?? null,
                ]);
            }

            fclose($handle);
        }

        $this->command->info("✅ Events imported from CSV!");
    }
}
