<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
    }
}
