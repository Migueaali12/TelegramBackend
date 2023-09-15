<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Http;

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

Route::get('/botUpdates', function () {

    $url = "https://api.telegram.org/bot6593505415:AAEX-DKVXK3GqsJSm-WrsXw1wrw-hD1J5nU/getUpdates?offset=6459813431";

    $response = Http::get($url);

    if ($response->successful()) {
        $content = $response->body();

        return $content;
    } else {
        return "No se pudo obtener el contenido de la URL.";
    }
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

        return 'Mensaje enviado al canal con éxito.';
    } else {
        return 'No se pudo obtener el chat_id del grupo.';
    }
});

Route::get('/enviar-mensaje-miguel', function () {
    
    $chatId = '6459813431';

    if ($chatId !== null) {
        // Enviar mensaje al grupo
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Saludos Miguel, bot desde Laravel!',
        ]);

        return 'Mensaje enviado a Miguel con éxito.';
    } else {
        return 'No se pudo obtener el chat_id del grupo.';
    }
});






