<?php

// контролер
Class Controller_Article Extends Controller_Base {
    // шаблон
    public $layouts = "article";

    // экшен
    function index($data=''){
        if (!isset($data[0])) die("Категория не найдена");

        if (isset($data[1])) {

            $model = new Model_Articles();
            $category = $model->getCategoryByAnchor($data[0]);
            if (!$category) die("Категория не найдена");
            // создаем запрос
            $select = array(
                'where' => 'published = 1 AND category = ' . $category->id . ' AND url = ' . $data[1], // условие
            );

            $model->select($select); // создаем объект модели
            $article = $model->getOneRow(); // получаем все строки
            var_dump($article->title);

            $this->template->vars('article', $article);
//            $this->template->vars('title', $1);
            $this->template->view('article');
        } else {
            die('Выводить список статей категории');
        }
    }


}