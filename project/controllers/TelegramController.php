<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Classes\TelegramApi\TelegramSDK;
	use \Project\Classes\MessageFactory\MessageFactory;

	class TelegramController extends Controller
	{
		public function index($params = []) {

			if ($params['var1'] != trim(getenv('TELEGRAM_BOT_CODE'))) {
				return $this->render('telegram/error', array_merge($params, ['error' => 'incorrect telegram auth code']));
			}
			if (!isset($params['message']['chat']['id']) && !isset($params['message']['text'])) {
				return $this->render('telegram/error', array_merge($params, ['error' => 'undefined telegram chat id or telegram message']));
			}
						
			// Here is an abstract method pattern that creates classes according to a message that we receive from telegram bot.
			// You can add as many messages as you want. Just add a message file into "project/messagefactory/messages" folder.
			// Message file must have name starting with "Message" plus command that telegram bot can send us.
			// Commands that starts from / must follow "Message_command" pattern in the name. 
			$ms = new MessageFactory($params);
			$msObject = $ms->create();

			$tg = new TelegramSDK(getenv('TELEGRAM_BOT_TOKEN'));
			$tgMessage = $tg->sendMessage('sendMessage', ['chat_id' => $msObject->getChatId(), 'text' => $msObject->getMessage()]);

			return $this->render('telegram/index', $params = ['tgMessage' => $tgMessage, 'message' => $msObject]);
		}
	}