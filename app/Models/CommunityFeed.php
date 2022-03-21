<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

    public function getListing(Request $request): JsonResponse
    {
        $response = [
            'data' => []
        ];

        $response['recordsFiltered'] = $this->getCount();
        $response['recordsTotal'] = $response['recordsFiltered'];

        $data = DB::table('community_feeds')
                    ->join('users', 'users.id', 'community_feeds.user_id')
                    ->select(
                        'community_feeds.*',
                        'users.user_name'
                    )
                    ->limit(10)
                    ->offset($request->start)
                    ->orderBy('community_feeds.id', 'desc')
                    ->get();

        $response['data'] = $data->map(function ($feed) {
            $feed->status = Str::replace('accepted', 'approved', $feed->status);
            $feed->status = "<span class='{$feed->status}'>".Str::ucfirst($feed->status)."</span>";
            return $feed;
        });

        return response()->json($response);
    }

    private function getCount(): int
    {
        return DB::table('community_feeds')
                ->count();
    }
}
