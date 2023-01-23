<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $lots = Lot::orderBy('id', 'desc')->take(6)->get();

        return view('index', compact('lots', 'categories'));
    }

    public function single($id) {
        $lot = Lot::findOrFail($id);
        return view('single-lot', compact('lot'));
    }
}
