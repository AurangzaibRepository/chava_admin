<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\SubCategory;

class SubCategoriesController extends Controller
{
    public function __construct(
        private SubCategory $subCategory
    ) {
    }
    
    public function listing($categoryID): JsonResponse
    {
        return $this->subCategory->getListing($categoryID);
    }

    public function add(Request $request): void
    {
        $this->subCategory->saveRecord($request);
        session()->flash('success', 'Subcategory added successfully');
    }

    public function edit($subCategoryID): View
    {
        $data = $this->subCategory->get($subCategoryID);

        return view('categories.sub-category')
                    ->with([
                       'pageTitle' => "Edit {$data->sub_category}",
                       'data' => $data
                    ]);
    }
}
