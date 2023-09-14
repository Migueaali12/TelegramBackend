<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::get('/prueba', function () {
    Telegram::sendMessage([
        'chat_id' => "@pruebaLaravell",
        'text' => "ENVIADO DESDE DOMO",
    ]);
});

