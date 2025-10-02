<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',   // ✅ angepasst: "name" → "full_name"
        'email',
        'password',
        'role', // ✅ zugefügt: "role" → statt eigener host-Tabelle
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    
    // Hilfsmethoden für Rollen
    public function isAdmin(): bool {
        return $this->role === 'admin';
    }

    public function isHost(): bool {
        return $this->role === 'host';
    }

    public function isUser(): bool {
        return $this->role === 'user';
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->full_name)   // warum brauchen wir das?
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function organizedEvents()
    {  
        return $this->hasMany(\App\Models\Event::class, 'organizer_id'); // FK in events
    }

        // Scope für Abfragen
    public function scopeHosts($query)
    {
        return $query->where('role', 'host');
    }

    /**
     * Relationships
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
    


}
