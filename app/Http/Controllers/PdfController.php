<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function mostrarFormulario()
    {
        return view('enviar_pdf');
    }

    public function enviarPDF(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
            'destinatario' => 'required|email',
        ]);

        $pdf = $request->file('pdf');

        $destinatario = $request->input('destinatario');

        // Lógica para enviar el correo con el PDF adjunto
        // Aquí puedes utilizar la funcionalidad de envío de correo de Laravel
        // Puedes encontrar más información en la documentación oficial: https://laravel.com/docs/8.x/mail

        // Ejemplo de código para enviar el correo con el PDF adjunto
        Mail::raw(nl2br('Gracias por su compra adjunto envio factura de su compra, Farmacia la milagrosa manos y corazón al servicio de su salud'), function ($message) use ($pdf, $destinatario) {
            $message->to($destinatario)
                    ->subject('Factura de compra')
                    ->attach($pdf->getRealPath(), [
                        'as' => $pdf->getClientOriginalName(),
                        'mime' => $pdf->getClientMimeType(),
                    ]);
        });

        return redirect()->back()->with('success', 'Factura enviada correctamente');
    }
}