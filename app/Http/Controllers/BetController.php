<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var User */
        $user = Auth::user();
        $bets = $user->bets()->get();
        return view('my-bets', compact('bets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = request('id');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $bet = Bet::findOrFail($id);
        if ($bet->author_id !== $user_id) {
            return redirect(route('error403'));
        }

        $bet->delete();

        return redirect(route('bets.index'));
    }
}
