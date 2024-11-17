<?php

namespace Project\Classes\MessageFactory\Messages;

interface IMessage {
    public function __construct(array $params);
    public function getchatId();
    public function getMessage();
    public function setMessage(string $message);
}