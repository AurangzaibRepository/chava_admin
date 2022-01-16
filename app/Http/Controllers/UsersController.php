<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UsersController extends Controller
{
    // Default function index
    public function index(): view
    {
        $pageTitle = 'Manage Users';
        return view('users', ['pageTitle' => $pageTitle]);
    }

    // Function to get listing
    public function listing(): JsonResponse
    {
        $responseArray = [ 'data' => [
            ['Lindsey', 9876, '4.3.1', '7 hours ago', ''],
            ['Lindsey', 9873, '4.3.1', '6 hours ago', ''],
            ['Lindsey', 9872, '4.3.1', '2 Days ago', ''],
            ['Lindsey', 9871, '4.3.1', '7 hours ago', ''],
            ['Lindsey', 9871, '4.3.1', '7 hours ago', ''],
            ['Lindsey', 9872, '4.3.1', '7 hours ago', ''],
            ['Lindsey', 9873, '4.3.1', '7 hours ago', '']
        ]
        ];

        return response()->json($responseArray);
    }
}
