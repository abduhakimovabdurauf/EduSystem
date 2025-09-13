<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $text = "New Contact Form Submission:\n\n";
        $text .= "Name: " . $request->name . "\n";
        $text .= "Email: " . $request->email . "\n";
        $text .= "Message: " . $request->message;

        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        Http::get("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text
        ]);

        return back()->with('success', 'Your message has been sent!');
    }
}
