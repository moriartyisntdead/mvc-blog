<?php

// контролер
Class Controller_Index Extends Controller_Base {
    // шаблон
    public $layouts = "index";

    // экшен
    function index() {
        $model = new Model_Users();
        $userInfo = $model->getUser();

        // создаем запрос
        $select = array(
            'where' => 'id >= 1 AND id <= 5', // условие
            'group' => 'first_name', // группируем
            'order' => 'id DESC', // сортируем
            'limit' => 10 // задаем лимит
        );
      //  $model = new Model_Users($select); // создаем объект модели
      //  $usersInfo = $model->getAllRows(); // получаем все строки
     //   var_dump($usersInfo); // выводим данные

        $this->template->vars('userInfo', $userInfo['id']);
        $this->template->view('index');
    }


}