<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    // Default function index
    public function index()
    {
        $pageTitle = 'Dashboard';

        return view('/dashboard', ['pageTitle' => $pageTitle]);
    }
}
;
