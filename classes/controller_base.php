<?php

// абстрактый класс контроллера
Abstract Class Controller_Base {

    protected $registry;
    protected $db;
    protected $template;
    protected $layouts; // шаблон

    public $vars = array();

    // в конструкторе подключаем шаблоны
    function __construct($registry) {
        $this->registry = $registry;

        global $dbObject;
        $this->db = $dbObject;
        // шаблоны
        $this->template = new Template($this->layouts, get_class($this));
    }

}