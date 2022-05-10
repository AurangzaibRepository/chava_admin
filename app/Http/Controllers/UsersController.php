<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
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

        return view('users', [
            'pageTitle' => $pageTitle,
            'userStatus' => $userStatus,
            'status' => ucfirst($status)
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

    public function all(): JsonResponse
    {
        return $this->user->get();
    }

    public function delete(int $id): RedirectResponse
    {
        $this->user->deleteRecord($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully');
    }
}
