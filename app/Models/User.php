<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getListing(): JsonResponse
    {
        $response= ['data' => []];
        $date = date('Y-m-d H:i:s');
        $words = ['hour', 'hours', 'minute', 'minutes','second', 'seconds'];

        $userListing = $this->orderBy('id', 'desc')->get();

        foreach ($userListing as $user) {
            $lastActivity = Carbon::createFromFormat('Y-m-d H:i:s', $user->last_active);
            $lastActivityMsg = $lastActivity->diffForHumans($date);

            $word = explode(' ', $lastActivityMsg)[1];

            if (in_array($word, $words)) {
                $lastActivityMsg = explode(' ', $lastActivityMsg)[0].' '. explode(' ', $lastActivityMsg)[1] . ' ago';
            }

            if (!in_array($word, $words)) {
                $lastActivityMsg = (explode(' ', $lastActivityMsg)[0]) . ' ' . explode(' ', $lastActivityMsg)[1] . ' ago';
            }
        
            array_push($response['data'], [$user->user_name, $user->id, $user->phone_version, $lastActivityMsg]);
        }

        return response()->json($response);
    }
}
