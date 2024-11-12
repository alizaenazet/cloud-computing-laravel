<?php

namespace App\Http\Controllers;

use App\Mail\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailTestController extends Controller
{
    /**
     * Send a test email.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendTestEmail()
    {
        Mail::to('alizaenazet@gmail.com')->send(new Registration());

        return response()->json(['message' => 'Test email sent successfully']);
    }
}