<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index_profile()
    {
        return view('profile.profile');
    }
}
