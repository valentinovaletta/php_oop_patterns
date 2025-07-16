<?php

namespace Project\Classes\MessageFactory;

use Project\Classes\MessageFactory\Menu\IMenu;
use Project\Classes\MessageFactory\Menu\MenuDefault;

class MenuFactory {

    private string $namespace = "Project\Classes\MessageFactory\Menu\\";
    private string $command;
    private array $params;

    public function __construct(array $params)
    {
      $this->command = preg_replace('/\//', '_', $params['message']['text']??'sdsfsdf');
      $this->params['chatId'] = $params['message']['chat']['id']??0;
    }

    public function create() : IMenu
    {
      $className = ucfirst($this->command);
      $menuFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "project/classes/messagefactory/menu/Menu$className.php";
      $menuClass = $this->namespace."Menu$className";

      if(file_exists($menuFile) && class_exists($menuClass)){
        return new $menuClass($this->params);
      } else {
        return new MenuDefault($this->params);
      }
    }

}