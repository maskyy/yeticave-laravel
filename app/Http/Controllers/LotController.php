<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LotController extends Controller
{
    public function searchByCategory($id) {
        $category = Category::findOrFail($id);
        $lots = $category->lots;
        $category = $category->title;

        return view('search', compact('category', 'lots'));
    }

    public function search(Request $request) {
        $search = trim($request->search);
        $lots = Lot::whereRaw('MATCH (title, description) AGAINST (?)', [$search])->get();

        return view('search', compact('search', 'lots'));
    }

    public function addLot(Request $request) {
        $data = $request->except('_token');
        $validator = Validator::make($data, [
            'lot-name' => 'required',
            'category' => 'required',
            'message' => 'required',
            'lot-image' => 'required|mimes:png,jpeg',
            'lot-rate' => 'required|min:1',
            'lot-step' => 'required|min:1',
            'lot-date' => 'required|date|after:tomorrow',
        ]);

        if ($validator->fails()) {
            return redirect(route('add-lot-page'))
                ->withErrors($validator)
                ->withInput();
        }

        $lot = new Lot();
        $lot->title = request('lot-name');
        $lot->category_id = request('category');
        $lot->author_id = Auth::user()->id;
        $lot->description = request('message');
        $lot->price = request('lot-rate');
        $lot->bet_step = request('lot-step');
        $lot->end_date = request('lot-date');
        $lot->url = request()->file('lot-image')->store('img/lots');
        $lot->save();

        return redirect(route('lot-page', ['id' => $lot->id]));
    }

    public function addBet($id, Request $request) {
        $lot = Lot::findOrFail($id);
        $min_bet = $lot->minBet();
        $validator = Validator::make($request->all(), [
            'cost' => 'required|integer|min:' . $min_bet
        ], [
            'required' => 'Введите ставку',
            'integer' => 'Ставка должна быть целым числом',
            'min' => 'Ставка должна быть не меньше ' . $min_bet
        ]);

        if ($validator->fails()) {
            return redirect(route('lot-page', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $bet = new Bet();
        $bet->bet_price = request('cost');
        $bet->author_id = Auth::user()->id;
        $bet->lot_id = $id;
        $bet->save();

        return redirect(route('lot-page', $id));
    }
}
