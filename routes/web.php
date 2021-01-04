<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	return view('home');
})->name('/');

Route::get('dashboard', function (){
    return view('dashboard');
})->name('dashboard');

# Se muestra la url nosotros pero en verdad redirigimos a about.
Route::get('nosotros', function (){
    return view('about');
})->name('about');

# Se muestra la url contactanos pero en verdad redirigimos a contact
Route::get('contactanos', function (){
    return view('contact');
})->name('contact');

# Envio de forumario de contacto
Route::post('message', function (){
    /*
     * Nota: Para que el envio de correos funcion correctamente hay que
     * configuurar el nombre y mail de la fuente en el archivo mail.php que se
     * encuentra en la carpeta config. Además se tiene que configurar el archivo
     * .env que se encuentra en la raiz, cambiando:
     * MAIL_MAILER=smtp
     * MAIL_HOST=smtp.gmail.com
     * MAIL_PORT=587
     * MAIL_USERNAME=brauliobaxon@gmail.com
     * MAIL_PASSWORD=contraseña que corresponde
     * MAIL_ENCRYPTION=tls
     *
     * Notar que además de esto se debe tener una cuenta habilitada para enviar
     * correos mediante smtp de gmail.
     */

    // Enviando correo
    $data = request()->all();
    # Mail::send("emails.contact_message", $data, function ($message) use ($data){
    #     $message->from($data['form-email'], $data['form-name'])
    #             ->to('brauliobaxon@gmail.com', 'Braulio')
    #             ->subject("Contacto mediante la pagina web");
    # });


    // Responder al usuario

    // Volviendo a mostrar la misma pagina
    return back()->with('flash', "{$data['form-name']} Tu mensaje se ha
            enviado correctamente");
})->name('message');
