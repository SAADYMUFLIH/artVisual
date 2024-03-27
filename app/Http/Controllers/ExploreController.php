<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index_explore()
    {
        return view('explore.explore');
    }
}
