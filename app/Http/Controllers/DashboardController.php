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
    ) {
    }

    // Default function index
    public function index()
    {
        $pageTitle = 'Dashboard';

        $activeUserList = $this->dashboard->getActiveUsers();
        $newUserList = $this->dashboard->getNewUsers();
   
        return view('/dashboard', [
            'pageTitle' => $pageTitle,
            'activeUserList' => $activeUserList,
            'newUserList' => $newUserList
        ]);
    }

    public function activityData(): JsonResponse
    {
        return $this->dashboard->getActivityData();
    }
}
