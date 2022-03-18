<?php

namespace App\Http\Controllers;

use Illuminte\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class CommunityController extends Controller
{
    // Default function
    public function index(): view
    {
        $pageTitle = 'Community';
        $date = Carbon::now()->format('d F, l');

        return view('community', [
            'pageTitle' => $pageTitle,
            'date' => $date
        ]);
    }
}
