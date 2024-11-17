<?php

namespace Project\Classes\MessageFactory\Messages;

abstract class MessageAbstract implements IMessage{

    protected array $params;
    protected int $chatId;
    protected string $message;

    public function __construct($params)
    {
        $this->params = $params;
        $this->chatId = $params['chatId'];
    }

    public function getchatId() : Int
    {
        return $this->chatId;
    }
    public function getMessage() : String
    {
        return $this->message;
    }

    public function setMessage($message) : Void
    {
        $this->message = $message;
    }

}