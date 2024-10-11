<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupTermsController extends Controller
{
    public function showSignupTermsForm()
    {
        return view('auth.signup-terms');
    }
}
