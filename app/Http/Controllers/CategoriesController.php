<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __construct(
        private Category $category
    ) {
    }

    // Default function index
    public function index(): view
    {
        return view('topics/listing', [
            'pageTitle' => 'Topic'
        ]);
    }
}
