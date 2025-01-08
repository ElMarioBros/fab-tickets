<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'game_id',
        'customer_name',
        'phone_number',
        'traslado',
        'estacionamiento',
        'souvenirs',
        'total_amount'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class)
            ->withPivot('game_id')
            ->withTimestamps();
    }

}
