<?php

// контролер
Class Controller_Article Extends Controller_Base {
    // шаблон
    public $layouts = "article";

    // экшен
    function index($data='') {
        if(!isset($data[0])) die("Категория не найдена");

        // создаем запрос
        $select = array(
            'where' => 'published = 1', // условие
        );
        $model = new Model_Articles($select); // создаем объект модели
        $articles = $model->getAllRows(); // получаем все строки
        var_dump($articles) ;

        $this->template->vars('articles', $articles);
        $this->template->view('article');
    }


}