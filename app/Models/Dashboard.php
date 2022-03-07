<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Dashboard extends Model
{
    public function getActivityData(): JsonResponse
    {
        echo 'in here'; exit;
    }
}
