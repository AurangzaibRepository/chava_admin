<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(
        private User $user
    ) {
    }

    // Default function index
    public function index(): view
    {
        $pageTitle = 'Manage Users';
        return view('users', ['pageTitle' => $pageTitle]);
    }

    // Function to get listing
    public function listing(): JsonResponse
    {
        return $this->user->getListing();
    }
}
