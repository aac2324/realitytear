<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Welche Felder per create() / update() befüllt werden dürfen
    protected $fillable = [
        'title',
        'starts_at',
        'location',
        'description',
        'host_id',
    ];

    // Damit Laravel 'starts_at' automatisch als Datum behandelt
    protected $casts = [
        'starts_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Beziehungen
    |--------------------------------------------------------------------------
    */

    // Ein Event gehört zu genau einem Host
    public function host()
    {
        return $this->belongsTo(Host::class);
    }

    // Ein Event kann viele Reviews haben
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Ein Event kann viele Teilnehmer (Users) haben über participations
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
