<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function home()
    {
        return view('app.home');
    }

    public function profile()
    {
        return view('app.profile');
    }
}
