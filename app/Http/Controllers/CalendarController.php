<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\UserReminder;

class CalendarController extends Controller
{
    public function __construct(
        private UserReminder $reminder
    ) {
    }

    public function index(): view
    {
        return view('calendar.listing')->with([
            'pageTitle' => 'Calendar'
        ]);
    }

    public function listing(Request $request) : JsonResponse
    {
        $this->reminder->getListing($request);
    }
}
