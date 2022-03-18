<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CommunityFeed;
use Carbon\Carbon;

class CommunityController extends Controller
{
    public function __construct(
        private CommunityFeed $communityFeed
    ) {
    }

    // Default function
    public function index(): view
    {
        return view('community', [
            'pageTitle' => 'Community',
            'date' => Carbon::now()->format('d F, l'),
            'data' => $this->communityFeed->getLatest()
        ]);
    }
    
    public function changeStatus(Request $request)
    {
        $this->communityFeed->updateStatus($request);

        session()->flash('success', "Feed {$request->status} successfully");
    }
}
