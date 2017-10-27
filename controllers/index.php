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

        $user = new Model_Users();
        $tags = new Model_Tags();

        $this->template->vars('articles', $articles);
        $this->template->view('index');
    }

    function login(){
//        header('Content-type: application/json; charset=UTF-8');
        $login = $_POST['login'];
        $password = /*md5(*/$_POST['password']/*)*/;

        var_dump($_POST);
        session_start();

/*        $stmt = $this->db->prepare("select id from users WHERE login=?");
        $stmt->execute(array($login));
        var_dump($stmt);
        if ($stmt->rowCount() == 0) echo 'Такого користувача не існує';
        else echo 'Користувача знайдено.';

        $stmt = $this->db->prepare("select id from users WHERE login=? AND password=?");
        $stmt->execute(array($login, $password));
        var_dump($stmt);
        if ($stmt->rowCount() == 0) echo 'Такого користувача не існує';
        else echo 'Користувача знайдено.';*/

//        $_SESSION['UID'] = $stmt->fetchObject()->id;
//        echo $_SESSION['UID'];
//        $this->template->vars('logged', $_SESSION['UID']);
    }

}
