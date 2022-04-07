<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class UserReminder extends Model
{
    protected $table = 'user_reminders';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getListing(Request $request): JsonResponse
    {
        $response = [
            'draw' => 1,
            'recordsTotal' => 20,
            'recordsFiltered' => 20,
            'data' => []
        ];

        $data = $this
                    ->join('users', 'users.id', 'user_reminders.user_id')
                    ->select('user_reminders.*', 'users.user_name')
                    ->orderBy('id', 'desc')
                    ->get();

        foreach ($data as $key => $value) {
            $response['data'][] = [
                ($key+1),
                $value->reminder,
                $value->place,
                "{$value->date} {$value->time}",
                $value->user_name,
                $value->id
            ];
        }

        return response()->json($response);
    }
}
