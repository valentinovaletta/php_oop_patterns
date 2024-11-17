<?php

namespace Project\Classes\MessageFactory\Messages;

interface IMessage {
    public function __construct(Array $params);
    public function getchatId();
    public function getMessage();
    public function setMessage(String $message);
}