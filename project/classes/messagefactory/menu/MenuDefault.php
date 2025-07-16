<?php

namespace Project\Classes\MessageFactory\Menu;
use Project\Classes\MessageFactory\Menu\MenuAbstract;

class MenuDefault extends MenuAbstract implements IMenu {  

    public function __construct($params)
    {
        parent::__construct($params);
        $this->setMessage('Default Message');
    }
}