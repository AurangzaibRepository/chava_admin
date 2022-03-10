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
    public function index(string $status = ''): view
    {
        $pageTitle = 'Manage Users';
        $userStatus = config('app.user_status');
        $new = '';

        if ($status === 'new'){
            $new = 'checked';
        }

        return view('users', [
            'pageTitle' => $pageTitle,
            'userStatus' => $userStatus,
            'status' => ucfirst($status),
            'new' => $new
        ]);
    }

    // Function to get listing
    public function listing(Request $request): JsonResponse
    {
        return $this->user->getListing($request);
    }

    public function changeStatus(int $id, string $status): RedirectResponse
    {
        User::changeStatus($id, $status);

        $statusText = ($status === 'Active' ? 'activated' : 'deactivated');

        return redirect('/users')
                ->with('success', "User {$statusText} successfully");
    }
}
