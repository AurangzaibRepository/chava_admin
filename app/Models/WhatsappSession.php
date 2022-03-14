<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WhatsappSession extends Model
{
    public function getListing(Request $request): JsonResponse
    {
        $data = [
            'draw' => $request->draw,
            'data' => []
        ];

        $data['recordsTotal'] = $this->getUsersCount();

        $data['recordsFiltered'] = $data['recordsTotal'];

        $userList = DB::table('users')
                        ->where('role', '!=', 'Admin')
                        ->limit(10)
                        ->offset($request->start)
                        ->orderBy('id', 'desc');



        return response()->json($data);
    }

    private function getUsersCount(): int
    {
        return DB::table('users')
                ->where('role', '!=', 'Admin')
                ->count();
    }
}
