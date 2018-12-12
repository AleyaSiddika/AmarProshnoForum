<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecureController extends Controller
{
    public function ShowReadMore()
    {
        return view('errors.503');
    }
    public function ReadMore()
    {
        return view('errors.503');
    }
}
