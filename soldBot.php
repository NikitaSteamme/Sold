<?php

declare(strict_types=1);

use Telegram\Bot\Api;
use Nikitam\Example\DB;

require __DIR__ . '/vendor/autoload.php';

$settings = require ('settings.php');

$telegram = new Api($settings['token']); //Устанавливаем токен, полученный у BotFather
$result = $telegram -> getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя

$text = $result["message"]["text"]; //Текст сообщения
$chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
$name = $result["message"]["from"]["username"]; //Юзернейм пользователя
$keyboard = [["Кнопка"]]; //Клавиатура


if($text){
    if ($text == "/start") {
        try {
            $keyboard = [
                ['Начать поиск'],
                ['Контакты'],
                ['Подробнее']
            ];
            $db = new DB();
            $db->updateStage($chat_id, "2");

            $reply_markup = $telegram->replyKeyboardMarkup([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => true
            ]);
            $response = $telegram->sendMessage([
                'chat_id' => $chat_id,
                'reply_markup' => $reply_markup,
                'text' => $db->getStage($chat_id)
            ]);
        } catch (Exception $e){
            $response = $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $e->getMessage()
            ]);
        }


    }elseif (($text == "/imgtest")) {

        $telegram
            ->setAsyncRequest(true)
            ->sendPhoto(['chat_id' => $chat_id, 'photo' => 'img/photo.jpg']);

    }elseif (($text == "/keytest")) {

        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ];

        $reply_markup = $telegram->replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $response = $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Hello World',
            'reply_markup' => $reply_markup
        ]);

        $messageId = $response->getMessageId();

    }else{
        $reply = "В доступе отказано";
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'parse_mode'=> 'HTML', 'text' => $reply ]);
    }
}else{
    $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
}

