<?php

// контролер
Class Controller_Index Extends Controller_Base {
    // шаблон
    public $layouts = "index";

    // экшен
    function index() {

        $where = 'published = 1';

        if (isset($_GET['tag'])){
            $tagArticles = Model_Tags::getArticlesByTag($_GET['tag']) ?: 0;
            $where.=" AND id IN ($tagArticles)";
        }

        if (isset($_GET['search'])){
            $key = htmlspecialchars($_GET['search']);
            $where.=" AND (title LIKE '%$key%' OR description LIKE '%$key%' OR content LIKE '%$key%')";
        }

        // создаем запрос
        $select = array(
            'where' => $where, // условие
        );
        $model = new Model_Articles($select); // создаем объект модели
        $articles = $model->getAllRows(); // получаем все строки

        $user = new Model_Users();        
        isset($_SESSION['UID']) ? $user->getRowById($_SESSION['UID']) : $user = false;
        
        $tags = new Model_Tags();

        $this->template->vars('articles', $articles);
        $this->template->vars('user', $user);
        $this->template->view('index');
    }

    function login(){

        if (!isset($_POST['login']) || !isset($_POST['password'])) jsonError('no_data');

        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $stmt = $this->db->prepare("select id from users WHERE login=? AND password=?");
        $stmt->execute(array($login, $password));
        if ($stmt->rowCount() == 1){
            $_SESSION['UID'] = $stmt->fetchObject()->id;
            jsonSuccess();
            
        } else  jsonError('auth_error');            

    }

    function logout(){
        unset($_SESSION['UID']);
        header('Location: http://'.$_SERVER['HTTP_HOST']);
    }

}
