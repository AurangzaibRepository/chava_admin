<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuninate\Http\JsonResponse;
use App\Models\SubCategory;

class SubCategoriesController extends Controller
{
    public function __construct(
        private SubCategory $subCategory
    ) {
    }
    
    public function listing($id): JsonResponse
    {
    }
}
