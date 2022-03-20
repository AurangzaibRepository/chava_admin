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

        $data = $this->communityFeed->getLatest()->map(function ($feed) {
            if ($feed->status === 'accepted') {
                $feed->status = 'approved';
            }
            return $feed;
        });

        return view('community', [
            'pageTitle' => 'Community',
            'date' => Carbon::now()->format('d F, l'),
            'categories' => $categoryList->prepend('-- Select --', ''),
            'data' => $data
        ]);
    }
    
    public function changeStatus(Request $request)
    {
        $this->communityFeed->updateStatus($request);

        $statusText = ($request->status === 'accepted' ? 'approved' : $request->status);

        session()->flash('success', "Feed {$statusText} successfully");
    }
}
