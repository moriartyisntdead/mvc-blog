<?php

// контролер
Class Controller_Index Extends Controller_Base {
    // шаблон
    public $layouts = "index";

    // экшен
    function index() {

        // создаем запрос
        $select = array(
            'where' => 'published = 1', // условие
        );
        $model = new Model_Articles($select); // создаем объект модели
        $articles = $model->getAllRows(); // получаем все строки

        $this->template->vars('articles', $articles);
        $this->template->view('index');
    }


}