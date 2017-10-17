<?php

// модель
Class Model_Articles{

    public $authority_id;
    public $category_id;
    public $content;
    public $description;
    public $id;
    public $img;
    public $published;
    public $title;
    public $url;

    public function fieldsTable(){
        return array(

        );
    }

/*    public function getUser(){
        return array('id'=>1, 'name'=>'test_name');
    }*/
}