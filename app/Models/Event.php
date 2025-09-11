<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'title',
        'description',
        'location',
        'starts_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function host()
    {
        return $this->belongsTo(Host::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
