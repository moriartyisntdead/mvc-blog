<?php

// контролер
Class Controller_Article Extends Controller_Base {
    // шаблон
    public $layouts = "article";

    // экшен
    function index($data=''){
        if (!isset($data[0])) die("Категория не найдена");

        if (isset($data[1])) {

            $article = new Model_Articles();
            $category = $article->getCategoryByAnchor($data[0]);
            if (!$category) die("Категория не найдена");
            // создаем запрос
            $select = array(
                'where' => 'published = 1 AND category_id = ' . $category->id . ' AND url = "' . $data[1] . '"', // условие
            );


            $article->select($select);
            $result = $article->fetchOne();
            if (!$result) die("Статья не найдена");



            $this->template->vars('article', $article);
            $this->template->vars('title', $article->title);
            $this->template->view('article');
        } else {
            die('Выводить список статей категории');
        }
    }


}