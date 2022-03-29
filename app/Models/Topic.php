<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Topic extends Model
{
    protected $table = 'sub_category_topics';

    public function getListing(int $subCategoryID): JsonResponse
    {
        $data = [
            'data' => []
        ];

        $topicList = $this
                        ->where('sub_category_id', $subCategoryID)
                        ->get();

        foreach ($topicList as $key => $value) {
            $data['data'][] = [
                ($key+1),
                $value->topic,
                $value->type,
                $value->id
            ];
        }

        return response()->json($data);
    }

    public function saveTopic(Request $request): void
    {
        $this->create($request->all());
    }
}
