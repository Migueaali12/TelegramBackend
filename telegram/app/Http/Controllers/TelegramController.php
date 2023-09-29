<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function enviarMensajeGrupo()
    {
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
    }

    public function enviarMensajeCanal()
    {
        $chatId = '-1001947691586';

        if ($chatId !== null) {
            // Enviar mensaje al canal
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Saludos al canal, bot desde Laravel!',
            ]);

            return 'Mensaje enviado al canal con éxito.';
        } else {
            return 'No se pudo obtener el chat_id del canal.';
        }
    }

    public function enviarMensajeMiguel()
    {
        $chatId = '6459813431';

        if ($chatId !== null) {
            // Enviar mensaje a Miguel
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Saludos Miguel, bot desde Laravel!',
            ]);

            return 'Mensaje enviado a Miguel con éxito.';
        } else {
            return 'No se pudo obtener el chat_id de Miguel.';
        }
    }

    public function enviarEncuesta()
    {
        $chatId = '-4035758272';
        $question = 'Encuesta enviada desde el bot de Telegram en Laravel. ¿Cuál es su color favorito?';
        $options = ['Rojo ❤️', 'Azul 💙', 'Verde 💚'];

        $response = Telegram::sendPoll([
            'chat_id' => $chatId,
            'question' => $question,
            'options' => $options,
            'is_anonymous' => false,
        ]);

        if ($response->get('message_id')) {
            return 'Encuesta enviada con éxito.';
        } else {
            $errorDescription = $response->get('description', 'Error desconocido');
            return 'No se pudo enviar la encuesta. Error: ' . $errorDescription;
        }
    }

    public function handleTelegramWebhook(Request $request)
    {
        
        $data = $request->all();
    
        if (isset($data['message'])) {
            $message = $data['message'];

            if (stripos($message['text'], 'hola') !== false) {

                $nombreRemitente = isset($message['from']['first_name']) ? $message['from']['first_name'] : 'Usuario';

                $respuesta = "¡Hola, $nombreRemitente! ¿En qué puedo ayudarte?";

                $chatId = $message['chat']['id'];
                $this->enviarMensaje($chatId, $respuesta);
            }
        }

        return response()->json(['status' => 'OK']);
    }

}
