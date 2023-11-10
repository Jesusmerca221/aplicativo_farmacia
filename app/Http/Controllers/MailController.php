<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
{
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ];

    Mail::send('emails.contact', $data, function($message) {
        $message->to('jesusmercadoj11@gmail.com', 'jesusmercadoj11@gmail.com')->subject('Mensaje de contacto');
    });

    return redirect()->back()->with('success', 'Mensaje enviado correctamente');
}

}
