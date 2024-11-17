<?php

namespace Project\Classes\MessageFactory\Messages;
use Project\Classes\MessageFactory\Messages\MessageAbstract;

class Message_start extends MessageAbstract implements IMessage {

    public function __construct($params)
    {
        parent::__construct($params);
        $this->setMessage('start Message');
    }

}