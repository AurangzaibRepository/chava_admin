<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Dashboard extends Model
{
    public function getActivityData(): JsonResponse
    {
        $response = [];

        $activeUserCount = User::where('status', 'Active')
                                ->where('role', '!=', 'Admin')
                                ->count();

        $inactiveUserCount = User::where('status', 'Inactive')
                                ->count();

        /*$userStatusCount = DB::table('users')
                             ->selectRaw('status, count(id) count')
                             ->where('status', '!=', 'Admin')
                             ->groupBy('status')
                             ->orderBy('status')
                             ->get();*/

        $response = [0, $activeUserCount, $inactiveUserCount];
        return response()->json($response);
    }

    public function getActiveUsers(): Collection
    {
        $data = [];

        $userList = User::where('status', 'Active')
                    ->where('role', '!=', 'Admin')
                    ->orderBy('id', 'desc')
                    ->limit(4)
                    ->get();

        foreach ($userList as $user) {
            $data[] = [$user->user_name, $user->last_active];
        }
        
        return new Collection($data);
    }
}
