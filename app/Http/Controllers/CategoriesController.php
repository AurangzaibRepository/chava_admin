<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Arr;

class CategoriesController extends Controller
{
    public function __construct(
        private Category $category
    ) {
    }

    // Default function index
    public function index(): View
    {
        $statusArray = config('app.user_status');
        Arr::forget($statusArray, 'Current');
        
        return view('categories/listing', [
            'pageTitle' => 'Topic',
            'activeCategories' => $this->category->getAll('Active'),
            'inactiveCategories' => $this->category->getAll('Inactive'),
            //'draftCategories' => $this->category->getAll(null, true),
            'statusArray' => $statusArray
        ]);
    }

    public function add(Request $request): void
    {
        $this->category->saveRecord($request);
        session()->flash('success', 'Category added successfully');
    }

    public function edit($id): View
    {
        $statusArray = config('app.user_status');
        Arr::forget($statusArray, 'Current');

        return view('categories/edit')
                ->with([
                    'pageTitle' => 'Edit Topic',
                    'data' => $this->category->get($id),
                    'statusArray' => $statusArray
                ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $this->category->updateRecord($request);
        session()->flash('success', 'Category updated successfully');

        return redirect()->route('editCategory', [$request->id]);
    }
}
