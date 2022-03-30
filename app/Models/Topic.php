<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Models\Subcategory;
use Storage;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

class Topic extends Model
{
    protected $table = 'sub_category_topics';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $fillable = [
        'topic',
        'type',
        'link',
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
                $value->id
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

        Storage::disk('public')->put("/", $request->video);
        $lowBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
        FFMpeg::fromDisk('public')
        ->open($request->video->getClientOriginalName())
        ->addFilter(function($filters) {
            $filters->resize(new Dimension(960, 540));
        })
        ->export()
        ->toDisk('public')
        ->inFormat($lowBitrateFormat)
        ->save("/");

        //$path = Storage::disk('s3')->put("{$category}/{$subcategory}", $request->video);
        //$path = Storage::disk('s3')->url($path);

        //$request->request->add(['link' => $path]);
        //$this->create($request->all());
    }
}
