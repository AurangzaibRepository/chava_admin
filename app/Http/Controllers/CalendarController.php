<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Arr;
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
            'repeat' => Arr::prepend(config('app.repeat_values'), '-- Select --', ''),
            'priorities' => Arr::prepend(config('app.reminder_priorities'), '-- Select --', ''),
            'reminder' => Arr::prepend(config('app.reminder_values'), '-- Select --', '')
        ]);
    }

    public function edit($id): view
    {
        return view('calendar.edit', [
            'pageTitle' => 'Edit Calendar',
            'repeat' => Arr::prepend(config('app.repeat_values'), '-- Select --', ''),
            'priorities' => Arr::prepend(config('app.reminder_priorities'), '-- Select --', ''),
            'reminder' => Arr::prepend(config('app.reminder_values'), '-- Select --', '')
        ]);
    }

    public function save(Request $request): RedirectResponse
    {
        $this->reminder->saveData($request->all());
        
        return redirect()->back()->with('success', 'Calendar added successfully');
    }
}
