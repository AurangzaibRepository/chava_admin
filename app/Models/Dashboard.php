<?php

namespace App\Models;

use illuminate\Database\Eloquent\MOdel;
use Illuminate\Http\JsonResponse;
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

        $response['active_users'] = $activeUserCount;
        $response['inactive_users'] = $inactiveUserCount;
        $response['new_users'] = 0;

        return response()->json($response);
    }
}
