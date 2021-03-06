<?php

// контролер
Class Controller_Article Extends Controller_Base {
    // шаблон
    public $layouts = "article";

    // экшен
    function index($data=''){
        if (!isset($data[0])) die("Категория не найдена");

        if (isset($data[1])) {

            $user = new Model_Users();
            isset($_SESSION['UID']) ? $user->getRowById($_SESSION['UID']) : $user = false;

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

            $author = new Model_Users();
            $comment = new Model_Comments();
            $tag = new Model_Tags();
            $author->getRowById($article->author_id);

            $comments = $article->getComments();
            $tags = $article->getTags();

            $this->template->vars('article', $article);
            $this->template->vars('author', $author);
            $this->template->vars('user', $user);
            $this->template->vars('comments', $comments);
            $this->template->vars('tags', $tags);
            $this->template->view('article');
        } else {
            die('Выводить список статей категории');
        }
    }

    function addComment(){
        header('Content-type: application/json; charset=UTF-8');
        if (isset($_POST['name'])) {
            $id = htmlspecialchars($_POST['article-id']);
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            $id = urldecode($id);
            $name = urldecode($name);
            $email = urldecode($email);
            $message = urldecode($message);

            $comment = new Model_Comments();
            $comment->article_id = $id;
            $comment->comment = $message;
            $comment->name = $name;
            $comment->email = $email;
            $comment->subscribe = ($_POST['subscribe'] == 'true' ? 1 : 0);
            $comment->ip = $_SERVER['REMOTE_ADDR'];
            $comment->date = date('Y-m-d G:i:s');

            try{
                $comment->save();
                jsonSuccess();
            }
            catch (Exception $e){
                jsonError($e);
            }


        }
    }

    function addArticle(){
        $user = new Model_Users();
        isset($_SESSION['UID']) ? $user->getRowById($_SESSION['UID']) : $user = false;

        $categories = new Model_Categories();
        $categories = $categories->getActiveCategories();

        if(isset($_POST['title'])){
            if (!$user) jsonError("Не авторизован");

            $title = urldecode(htmlspecialchars($_POST['title']));
            $description = urldecode(htmlspecialchars($_POST['description']));
            $content = $_POST['content'];
            $category_id = $_POST['category'];
            $url = urldecode(htmlspecialchars($_POST['url']));

            // TODO: Проверка на уникальность URL
            // TODO: Проверка на существование категории

            $newArticle = new Model_Articles();
            $newArticle->title = $title;
            $newArticle->description = $description;
            $newArticle->content = $content;
            $newArticle->category_id = $category_id;
            $newArticle->author_id = $user->id;
            $newArticle->url = $url;
            $newArticle->date = date('Y-m-d');
            $newArticle->published = 1;

            $imgName = $url . rand(10000, 99999).'.jpg';
            $newArticle->img = $imgName;

            // TODO: Проверка типа файла, расщирения и максимального размера

            if(!move_uploaded_file($_FILES['img']['tmp_name'], 'img/articles/'.$imgName)) {
                jsonError("Не вдалося завантажити зображення!");
            }
            if($_FILES['img']['size'] > 1048576) {
                jsonError("Розмір файлу надто великий.");
            }
            if(!(substr($_FILES['img']['type'],0, 5) == 'image')){
                jsonError('Недопустимий тип файлу.');
            }

            try {
                $newArticle->save();
                jsonSuccess();
            } catch (Exception $e) {
                jsonError($e);
            }

        }

        if (!$user) exit("Не авторизован");
        $this->template->vars('user', $user);
        $this->template->vars('categories', $categories);
        $this->template->vars('form', 'article-form');
        $this->template->view('add_article');
    }

    function like(){
        if(isset($_POST['id'])){
            $user = new Model_Users();
            isset($_SESSION['UID']) ? $user->getRowById($_SESSION['UID']) : jsonError("Не авторизован");

            $article = new Model_Articles();
            $article->getRowById($_POST['id']);
            if ($article->toggleLike($user->id)) jsonSuccess();
            else jsonError();
        } else exit();
    }

    function delete(){
        if(isset($_POST['id'])){
            $article = new Model_Articles();
            $article->getRowById($_POST['id']);
            if ($article->deleteRow()) jsonSuccess();
            else jsonError();
        }
    }

    function edit($data){
        $user = new Model_Users();
        isset($_SESSION['UID']) ? $user->getRowById($_SESSION['UID']) : $user = false;

        $id = $data[0];
        $article = new Model_Articles();
        @$article->getRowById($id);
        if(@!$article->id)  exit("Такої статті не існує!");
        //TODO:: Проверка, существует ли статья

        $categories = new Model_Categories();
        $categories = $categories->getActiveCategories();

        if(isset($_POST['title'])){
            $article->save();
        }

        if (!$user) exit("Не авторизован");
        $this->template->vars('user', $user);
        $this->template->vars('categories', $categories);
        $this->template->vars('form', 'articleEditForm');
        $this->template->vars('article', $article);
        $this->template->view('add_article');
    }
}