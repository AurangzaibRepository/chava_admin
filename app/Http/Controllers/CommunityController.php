<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CommunityFeed;
use App\Models\Category;
use Carbon\Carbon;

class CommunityController extends Controller
{
    public function __construct(
        private CommunityFeed $communityFeed,
        private Category $category
    ) {
    }

    // Default function
    public function index(): view
    {
        $categoryList = $this->category->getListing()->pluck('category', 'id');

        return view('community', [
            'pageTitle' => 'Community',
            'date' => Carbon::now()->format('d F, l'),
            'categories' => $categoryList->prepend('-- Select --', ''),
            'data' => $this->communityFeed->getLatest()
        ]);
    }
    
    public function changeStatus(Request $request)
    {
        $this->communityFeed->updateStatus($request);

        session()->flash('success', "Feed {$request->status} successfully");
    }
}
