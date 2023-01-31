<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function minBet() {
        $bets = $this->bets()->orderByDesc('bet_date')->get();
        $current = $bets[0]->bet_price ?? $this->price;
        return $current + $this->bet_step;
    }

    public function currentPrice() {
        $bets = $this->bets()->orderByDesc('bet_date')->get();
        $current = $bets[0]->bet_price ?? $this->price;
        return $current;
    }

    public function isFavorite() {
        $user_id = Auth::user()->id ?? null;
        if ($user_id === null) {
            return false;
        }
        $fav = Favorite::where('user_id', $user_id)->where('lot_id', $this->id)->get();
        return count($fav) !== 0;
    }
}
