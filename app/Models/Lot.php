<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function bets() {
        return $this->hasMany(Bet::class);
    }
}
