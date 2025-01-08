<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'date',
        'day_name',
        'price',
        'match_1',
        'match_2'
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
