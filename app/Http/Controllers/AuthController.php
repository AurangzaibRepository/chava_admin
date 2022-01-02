<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login function
    public function login(Request $request)
    {
        return view('auth/login');
    }
}
