<?php

namespace Project\Classes\MessageFactory\Messages;

abstract class MessageAbstract {

    protected $params;
    protected $chatId;
    protected $message;


    public function __construct($params)
    {
        $this->params = $params;
        $this->chatId = $params['chatId'];
    }

    public function getchatId()
    {
        return $this->chatId;
    }
    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

}