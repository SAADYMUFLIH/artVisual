<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index_upload()
    {
        return view('upload.upload');
    }
}
