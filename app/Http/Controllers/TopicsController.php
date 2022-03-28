<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function __construct(
        private Topic $topic
    ) {
    }

    public function listing($subCategoryID): JsonResponse
    {
        return $this->topic->getListing($subCategoryID);
    }
}
