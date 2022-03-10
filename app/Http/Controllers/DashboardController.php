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

        $currentUserList = $this->dashboard->getCurrentUsers();
        $newUserList = $this->dashboard->getNewUsers();
        $whatsAppSessionList = $this->dashboard->getWhatsAppSessions();

        return view('/dashboard', [
            'pageTitle' => $pageTitle,
            'currentUserList' => $currentUserList,
            'newUserList' => $newUserList,
            'whatsAppSessionList' => $whatsAppSessionList
        ]);
    }

    public function activityData(): JsonResponse
    {
        return $this->dashboard->getActivityData();
    }
}
