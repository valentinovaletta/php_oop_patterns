<?php

namespace Project\Classes\MessageFactory\Menu;

interface IMenu {
    public function __construct(array $params);
    public function getchatId();
    public function getMessage();
    public function setMessage(string $message);
}