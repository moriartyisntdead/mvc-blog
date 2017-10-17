<?php


// модель
Class Model_Users Extends Models_Base {

    public $id;
    public $name;
    public $last_name;

    public function getUser(){
        return array(
            'id' => 'Id',
            'first_name' => 'First name',
            'last_name' => 'Last name'
        );
    }
}