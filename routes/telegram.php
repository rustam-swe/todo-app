<?php

declare(strict_types=1);
require 'config.php';

/**
 * @var $config
 */
$bot    = new Bot($config['telegram']['token'], $config['database']);
$router = new Router();

if (isset($router->getUpdates()->message)) {
    $message = $router->getUpdates()->message;
    $chatId  = $message->chat->id;
    $text    = $message->text;

    if ($text === "/start") {
        $bot->handleStartCommand($chatId);
        return;
    }

    if ($text === "/add") {
        $bot->handleAddCommand($chatId);
        return;
    }

    if ($text === "/all") {
        $bot->echo($config);
        return;
    }

    $bot->addTask($chatId, $text);
}

if (isset($router->getUpdates()->callback_query)) {
    $callbackQuery = $router->getUpdates()->callback_query;
    $callbackData  = (int) $callbackQuery->data;
    $chatId        = $callbackQuery->message->chat->id;
    $messageId     = $callbackQuery->message->message_id;

    $bot->handleInlineButton($chatId, $callbackData);
}