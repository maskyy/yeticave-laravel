<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Auth::user()->favorites;
        $lots = $favorites->map(function ($fav) {
            return $fav->lot;
        });

        return view('search', compact('favorites', 'lots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = request('lot-id');
        $user_id = Auth::user()->id;

        $fav = new Favorite();
        $fav->user_id = $user_id;
        $fav->lot_id = $id;
        $fav->save();

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

        $fav = Favorite::where('user_id', $user_id)->where('lot_id', $id)->take(1);
        if ($fav) {
            $fav->delete();
        }

        return redirect(route('lot-page', $id));
    }
}
