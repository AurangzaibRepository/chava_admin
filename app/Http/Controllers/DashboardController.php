<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function __construct(
        private Dashboard $dashboard
    ){
    }

    // Default function index
    public function index()
    {
        $pageTitle = 'Dashboard';

        return view('/dashboard', ['pageTitle' => $pageTitle]);
    }

    public function activityData(): JsonResponse
    {
        return $this->dashboard->getActivityData();   
    }
}

