<?php

namespace App\Http\Controllers;

use Illuminte\Http\Request;
use Illuminate\View\View;

class CommunityController extends Controller
{
    // Default function
    public function index(): view
    {
        $pageTitle = 'Community';

        return view('community', ['pageTitle' => $pageTitle]);
    }
}
