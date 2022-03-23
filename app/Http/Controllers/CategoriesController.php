<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    // Default function index
    public function index(): view
    {
        return view('topics/listing', [
            'pageTitle' => 'Topic'
        ]);
    }
}
