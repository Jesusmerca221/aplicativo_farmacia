<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoContacto;

class CorreoController extends Controller
{
    public function enviarCorreo(Request $request)
  {
   // Valida los datos del formulario
   $request->validate([
    'correo' => 'required|email',
    'mensaje' => 'required'
  ]);

$correoDestino = $request->input('correo');
$mensaje = $request->input('mensaje');

// Envía el correo
Mail::to($correoDestino)->send(new CorreoContacto($mensaje));

// Redirecciona a la página de éxito o muestra un mensaje
return redirect()->back()->with('success', 'El mensaje ha sido enviado correctamente');
  }
}
