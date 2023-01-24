<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $lots = Lot::orderBy('id', 'desc')->take(6)->get();

        return view('index', compact('lots'));
    }

    public function single($id) {
        $lot = Lot::findOrFail($id);
        return view('single-lot', compact('lot'));
    }

    public function signup() {
        return view('sign-up');
    }

    public function login() {
        return view('login');
    }

    public function error403() {
        return view('403');
    }

    public function addLot() {
        return view('add-lot');
    }

    public function myBets() {
        Carbon::setLocale('ru');
        $user = Auth::user();
        $bets = $user->bets()->get();
        return view('my-bets', compact('bets'));
    }
}
