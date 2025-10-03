<?php

namespace App\Models;

class Event
{
    public $id;    
    public $title;
    public $starts_at;
    public $location;
    public $description;
    public $organizer_id;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->starts_at = $data['starts_at'] ?? null;
        $this->location = $data['location'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->organizer_id = $data['organizer_id'] ?? null;
    }

    public static function all()
    {
        $file = storage_path('app/events_import.csv');
        if (!file_exists($file)) {
            return [];
        }

        $rows = [];
        $header = null;
        if (($handle = fopen($file, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                if (!$header) {
                    $header = $data;
                    continue;
                }
                $row = array_combine($header, $data);
                $rows[] = new self($row);
            }
            fclose($handle);
        }
        return $rows;
    }
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    // (Optional) direkt auf die Users zugreifen über die Participation
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participations');
    }
}
