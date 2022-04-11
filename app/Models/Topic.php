<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Models\SubCategory;
use Storage;

class Topic extends Model
{
    protected $table = 'sub_category_topics';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $fillable = [
        'topic',
        'type',
        'link',
        'path',
        'sub_category_id',
        'category_id'
    ];

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
                $value->id,
                $value->link
            ];
        }

        return response()->json($data);
    }

    public function saveTopic(Request $request): void
    {
        $category = Category::find($request->category_id);
        $subcategory = Subcategory::find($request->sub_category_id);
        $category = ucwords($category->category);
        $subcategory = ucwords($subcategory->sub_category);
        
        $path = Storage::disk('s3')->put("{$category}/{$subcategory}", $request->video);
        $link = Storage::disk('s3')->url($path);

        $request->request->add([
            'link' => $link,
            'path' => $path
        ]);

        $this->create($request->all());
    }

    public function deleteTopic($id): void
    {
        $topic = $this->find($id);
        Storage::disk('s3')->delete($topic->path);
        $this->destroy($id);
    }
}
