<?php

Class Controller_Test Extends Controller_Base {
    function index() {

        echo date('Y-m-d G:i:s');

        $article = new Model_Articles();
        
        $article->getRowById(1);
        echo "<pre>";
        var_dump($article->getComments()[0]);
        echo "</pre>";
    }
}


