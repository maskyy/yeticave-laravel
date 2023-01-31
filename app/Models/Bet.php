<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function lot() {
        return $this->belongsTo(Lot::class);
    }

    public function isWinner() {
        return $this->lot->winner_id === $this->author_id;
    }

    public function setCssBetModifier() {
        if ($this->isWinner()) {
            return 'rates__item--win';
        } elseif (Carbon::now()->gte($this->lot->end_date)) {
            return 'rates__item--end';
        }
    }

    public function formatDate() {
        return Carbon::parse($this->bet_date)->diffForHumans();
    }

    public function getContacts() {
        return $this->author->contacts;
    }
}
