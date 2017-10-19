<?php

// контролер
Class Controller_Test Extends Controller_Base {
    function index($data='') {
        $model = new Model_Articles();
        $model->getRowById(1);
        var_dump($model->getCategoryAnchor());
    }


}