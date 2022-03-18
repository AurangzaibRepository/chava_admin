<?php

namespace App\Http\Controllers;

use Illuminte\Http\Request;
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
}
