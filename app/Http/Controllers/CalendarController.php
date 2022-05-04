<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    public function listing(Request $request): JsonResponse
    {
        return $this->reminder->getListing($request);
    }

    public function delete($id): RedirectResponse
    {
        UserReminder::destroy($id);
        return redirect()->back()->with('success', 'Reminder deleted successfully');
    }

    public function add(Request $request): view
    {
        return view('calendar.add', [
            'pageTitle' => 'Add Calendar',
            'repeat' => config('app.repeat_values')
        ]);
    }
}
