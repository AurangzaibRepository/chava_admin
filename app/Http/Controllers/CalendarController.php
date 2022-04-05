<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(): view
    {
        return view('calendar.listing')->with([
            'pageTitle' => 'Calendar'
        ]);
    }
}
