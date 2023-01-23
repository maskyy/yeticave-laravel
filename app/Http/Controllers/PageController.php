<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $lots = DB::table('lots')->orderBy('id', 'desc')->take(6)->get();

        return view('index', compact('lots', 'categories'));
    }
}
