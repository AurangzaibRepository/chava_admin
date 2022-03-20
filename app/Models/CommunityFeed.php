<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class CommunityFeed extends Model
{
    protected $table = 'community_feeds';
    public $timestamps = false;

    public function getLatest(): Collection
    {
        $feedList = DB::table('community_feeds')
                        ->join('users', 'users.id', 'community_feeds.user_id')
                        ->orderBy('community_feeds.id', 'desc')
                        ->limit(3)
                        ->selectRaw('community_feeds.*, date_format(community_feeds.createdAt, "%M %d, %Y") createdAt, users.user_name')
                        ->get();

        return $feedList;
    }

    public function updateStatus(Request $request): void
    {
        $this
            ->where('id', $request->feedID)
            ->update([
                'status' => $request->status,
                'answer' => $request->answer,
                'category_id' => $request->category_id
            ]);
    }
}
