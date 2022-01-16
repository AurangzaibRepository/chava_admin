<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TopicsController extends Controller
{
    // Default function index
    public function index(): view
    {
        $pageTitle = 'Topic';

        return view('topics/listing', ['pageTitle' => $pageTitle]);
    }
}
