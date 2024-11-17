<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Classes\TelegramApi\TelegramSDK;
	use \Project\Classes\MessageFactory\MessageFactory;

	class TelegramController extends Controller
	{
		public function index($params = []) {

			if ($params['var1'] != trim(getenv('TELEGRAM_BOT_CODE'))) {
				return $this->render('telegram/error', $params);
			}

			// Here is an abstract method pattern that creates classes according to a message that we receive from telegram bot.
			// You can add as many messages as you want. Just add a message file into "project/messagefactory/messages" folder.
			// Message file must have name starting with "Message" plus command that telegram bot can send us.
			// Commands that starts from / must follow "Message_command" pattern in the name. 
			$ms = new MessageFactory($params);
			$msObject = $ms->create();

			$tg = new TelegramSDK(getenv('TELEGRAM_BOT_TOKEN'));
			$tgMessage = $tg->sendMessage('sendMessage', ['chat_id' => $msObject->getChatId(), 'text' => $msObject->getMessage()]);

			return $this->render('hello/index', $params = ['tgMessage' => $tgMessage, 'message' => $msObject]);
		}
	}


/*
telegram callback message example 
{
	"var1":"TelegramCode",
	"update_id":"234234234",
	"message":{
		"message_id" : 12,
		"from" : {
			"id" : "123123123",
			"is_bot" : "",
			"first_name" : "Well",
			"username" : "well_wellwell",
			"language_code" : "ru"
		},
		"chat" : {
			"id" : "123123123", //494963311
			"first_name" : "Well",
			"username" : "well_wellwell",
			"type" : "private"
		},
		"date" : 1731662009,
		"text" : "/start",
		"entities" : {
			"0" : {
				"offset" : 0,
				"length" : 6,
				"type" : "bot_command"
			}
		}
	}
}
*/