<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CommunityFeed extends Model
{
    public function getLatest(): Collection
    {
        $feedList = DB::table('community_feeds')
                        ->join('users', 'users.id', 'community_feeds.user_id')
                        ->orderBy('community_feeds.id', 'desc')
                        ->limit(3)
                        ->select('community_feeds.*', 'users.user_name')
                        ->get();

        return $feedList;
    }
}
