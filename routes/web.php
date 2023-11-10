<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://parzibyte.me/blog/contrataciones-ayuda/");
})->name("soporte.index");

    Route::resource('inventario','App\Http\Controllers\InventarioController' );
    Route::resource('productos','App\Http\Controllers\ProductoController' );
    Route::resource('venta','App\Http\Controllers\VentaController' );
    Route::resource('users','App\Http\Controllers\UserController' );
    Route::resource("clientes", "ClientesController");
    
    Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);

    Route::get("/ventas/ticket", 'App\Http\Controllers\VentasController@ticket')->name("ventas.ticket");
    Route::resource('vender','App\Http\Controllers\VenderController' );
    Route::resource('cliente','App\Http\Controllers\ClienteController' );
    Route::get('/buscarProductos','App\Http\Controllers\ProductoController@index' );
    Route::get('/buscarVenta','App\Http\Controllers\VenderController@buscarVenta' );
    Route::post('/cancelar-venta','App\Http\Controllers\VenderController@cancelarVenta' );
    Route::post('/finalizar-venta','App\Http\Controllers\VenderController@finalizarVenta' );
    Route::post('/crearVenta','App\Http\Controllers\VentasController@crearVenta' );
    Route::post('/enviar-correo', 'App\Http\Controllers\CorreoController@enviarCorreo');
    Route::resource('ventas','App\Http\Controllers\VentasController' );
    Route::post("/productoDeVenta", 'App\Http\Controllers\VenderController@agregarProductoVenta')->name("agregarProductoVenta");
    Route::delete("/productoDeVenta", 'App\Http\Controllers\VenderController@quitarProductoDeVenta')->name("quitarProductoDeVenta");
    Route::post("/terminarOCancelarVenta", 'App\Http\Controllers\VenderController@terminarOCancelarVenta')->name("terminarOCancelarVenta");
    Route::get('/enviar-pdf', 'App\Http\Controllers\PdfController@mostrarFormulario')->name('formulario.pdf');
    Route::post('/enviar-pdf', 'App\Http\Controllers\PdfController@enviarPDF')->name('enviar.pdf');
    Route::get('/wordpress', function () {
        return Redirect::to('http://localhost/wordpress');
    })->name('wordpress');
    


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {   
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('dashboard/productos', function () {
        return view('dashboard/producto');
    })->name('productos');
    Route::get('dashboard/ventas', function () {
        return view('dashboard/venta');
    })->name('ventas');
    
    Route::get('/contacto', function () {
        return view('contacto');
    });
    
    

    Route::get('/facturas/nueva', function () {
        return redirect()->route('facturas.create');
    });
    
    
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
