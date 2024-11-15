<?php

namespace Project\Classes\MessageFactory;

use Project\Classes\MessageFactory\Messages\MessageDefault;

class MessageFactory {

    private $namespace = "Project\Classes\MessageFactory\Messages\\";
    private $command;
    private $params;

    public function __construct($params)
    {
      $this->command = preg_replace('/\//', '_', $params['message']['text']??'sdsfsdf');
      $this->params['chatId'] = $params['message']['chat']['id'];
    }

    public function create() 
    {
      $className = ucfirst($this->command);
      $messageFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "project/classes/messagefactory/messages/Message$className.php";
      $messageClass = $this->namespace."Message$className";

      if(file_exists($messageFile) && class_exists($messageClass)){
        return new $messageClass($this->params);
      } else {
        return new MessageDefault($this->params);
      }
    }

}