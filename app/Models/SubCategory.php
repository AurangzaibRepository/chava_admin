<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable = ['sub_category', 'category_id'];

    public function getListing($categoryID): JsonResponse
    {
        $data = [
            'data' => []
        ];

        $subCategoryList = $this
                    ->where('category_id', $categoryID)
                    ->get();
            
        foreach ($subCategoryList as $key => $value) {
            $data['data'][] = [($key+1), $value->sub_category, $value->id];
        }

        return response()->json($data);
    }

    public function saveRecord(Request $request): void
    {
        $this->create($request->all());
    }
}
