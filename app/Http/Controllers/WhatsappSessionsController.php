<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\WhatsappSession;

class WhatsappSessionsController extends Controller
{
    public function __construct(
        private WhatsappSession $whatsappsession
    ) {
    }

    public function index(): View
    {
        $pageTitle = 'WhatsApp Sessions';

        return view('whatsapp-sessions')->with([
            'pageTitle' => $pageTitle
        ]);
    }

    public function listing(): JsonResponse
    {
    }
}
