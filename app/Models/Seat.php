<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seat extends Model
{
    protected $fillable = [
        'seat_number',
        'zone',
        'row'
    ];

    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class)
            ->withPivot('game_id')
            ->withTimestamps();
    }

    public function isAvailableForGame($gameId)
    {
        return !$this->reservations()
            ->wherePivot('game_id', $gameId)
            ->exists();
    }

}
