<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Default function index
    public function index()
    {
        $pageTitle = 'Manage Users';
        return view('users', ['pageTitle' => $pageTitle]);
    }
}
