<?php

Class Controller_Test Extends Controller_Base {
    function index() {


        $article = new Model_Articles();
        
        $article->getRowById(1);
        echo "<pre>";
        var_dump($article->getComments());
        echo "</pre>";
    }
}

