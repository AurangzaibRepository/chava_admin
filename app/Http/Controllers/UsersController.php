<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    public function changeStatus(int $id, string $status): RedirectResponse
    {
        User::changeStatus($id, $status);

        $statusText = ($status === 'Active' ? 'activated' : 'deactivated');

        return redirect('/users')
                ->with('success', "User {$statusText} successfully");
    }
}
