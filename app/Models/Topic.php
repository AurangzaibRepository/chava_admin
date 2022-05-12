<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
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
        'thumbnail_link',
        'thumbnail_path',
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
                $value->link,
                $value->thumbnail_link
            ];
        }

        return response()->json($data);
    }

    public function saveTopic(Request $request): void
    {
        $category = Category::find($request->category_id);
        $category = Str::replace('/', '_', $category->category);

        $subcategory = Subcategory::find($request->sub_category_id);
        $subcategory = Str::replace('/', '_', $subcategory->sub_category);
        
        $LinkArray = $this->uploadMedia($category, $subcategory, $request->thumbnail, $request->video);

        //$path = Storage::disk('s3')->put("{$category}/{$subcategory}/test.pdf", $request->video);

        $request->request->add([
            'link' => $LinkArray['videoLink'],
            'path' => "{$category}/{$subcategory}/{$request->video->getClientOriginalName()}",
            'thumbnail_link' => $LinkArray['thumbnailLink'],
            'thumbnail_path' => "thumbnails/{$category}/{$subcategory}/{$request->thumbnail->getClientOriginalName()}"
        ]);

        $this->create($request->all());
    }

    public function updateTopic(Request $request): void
    {
        $updateArray = [
            'topic' => $request->title,
            'type' => $request->type
        ];

        $topic = $this->find($request->topic_id);
        $category = Category::find($topic->category_id);
        $category = Str::replace('/', '_', $category->category);

        $subcategory = Subcategory::find($topic->sub_category_id);
        $subcategory = Str::replace('/', '_', $subcategory->sub_category);

        if ($request->video) {
            Storage::disk('s3')->delete($topic->path);
            //$path = Storage::disk('s3')->put("{$category}/{$subcategory}", $request->video);
            $path = $request->video->storeAs(
                '',
                "{$category}/{$subcategory}/{$request->video->getClientOriginalName()}",
                ['disk' => 's3']
            );

            $updateArray['link'] = Storage::disk('s3')->url($path);
            $updateArray['path'] = $path;
        }

        $this
            ->where('id', $request->topic_id)
            ->update($updateArray);
    }

    public function deleteTopic($id): void
    {
        $topic = $this->find($id);
        Storage::disk('s3')->delete($topic->path);
        Storage::disk('s3')->delete($topic->thumbnail_path);
        $this->destroy($id);
    }

    private function uploadMedia(string $category, string $subcategory, $file, $video): array
    {
        $response = [];

        //$request->thumbnail->move(public_path("images/topic-thumbnails/{$category}/{$subcategory}"), $request->thumbnail->getClientOriginalName());
        $path = $file->storeAs(
            '',
            "thumbnails/{$category}/{$subcategory}/{$file->getClientOriginalName()}",
            ['disk' => 's3']
        );

        $response['thumbnailLink'] = Storage::disk('s3')->url($path);

        $path = $video->storeAs(
            '',
            "{$category}/{$subcategory}/{$video->getClientOriginalName()}",
            ['disk' => 's3']
        );

        $response['videoLink'] = Storage::disk('s3')->url($path);

        return $response;
    }
}
