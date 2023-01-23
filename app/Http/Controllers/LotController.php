<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;

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
}
