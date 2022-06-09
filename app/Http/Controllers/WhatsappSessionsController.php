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
        return view('whatsapp_sessions.listing')->with([
            'pageTitle' => 'WhatsApp Sessions'
        ]);
    }

    public function listing(Request $request): JsonResponse
    {
        return $this
                ->whatsappsession
                ->getListing($request);
    }
}
