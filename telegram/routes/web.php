<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Chat;


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

Route::get('/', function () {
    Telegram::sendMessage([
        'chat_id' => 1534354083,
        'text' => "ENVIADO DESDE DOMO",
    ]);
});

Route::get('/enviar-mensaje', function () {
    Telegram::sendMessage([
        'chat_id' => 6459813431,
        'text' => 'Hola desde Laravel y mi bot de Telegram!',
    ]);

    return 'Mensaje enviado con éxito.';
});

Route::get('/enviar-mensaje-grupo', function () {
    
    $chatId = '-4035758272';

    if ($chatId !== null) {
        // Enviar mensaje al grupo
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Saludos al grupo, bot desde Laravel!',
        ]);

        return 'Mensaje enviado al grupo con éxito.';
    } else {
        return 'No se pudo obtener el chat_id del grupo.';
    }
});

Route::get('/enviar-mensaje-canal', function () {
    
    $chatId = '-1001947691586';

    if ($chatId !== null) {
        // Enviar mensaje al grupo
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Saludos al canal, bot desde Laravel!',
        ]);

        return 'Mensaje enviado al grupo con éxito.';
    } else {
        return 'No se pudo obtener el chat_id del grupo.';
    }
});






