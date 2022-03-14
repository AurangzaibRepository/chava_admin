<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WhatsappSessionsController extends Controller
{
    public function index(): View
    {
        $pageTitle = 'WhatsApp Sessions';

        return view('whatsapp-sessions')->with([
            'pageTitle' => $pageTitle
        ]);
    }
}
