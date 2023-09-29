<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TelegramController;

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

    $url = "https://api.telegram.org/bot6593505415:AAEX-DKVXK3GqsJSm-WrsXw1wrw-hD1J5nU/getUpdates";

    $response = Http::get($url);

    if ($response->successful()) {
        $content = $response->body();

        return $content;
    } else {
        return "No se pudo obtener el contenido de la URL.";
    }
});

Route::get('/enviar-mensaje-grupo', [TelegramController::class, 'enviarMensajeGrupo']);
Route::get('/enviar-mensaje-canal', [TelegramController::class, 'enviarMensajeCanal']);
Route::get('/enviar-mensaje-miguel', [TelegramController::class, 'enviarMensajeMiguel']);
Route::get('/enviar-encuesta', [TelegramController::class, 'enviarEncuesta']);

Route::post('/webhook', [TelegramController::class, 'handleTelegramWebhook']);




