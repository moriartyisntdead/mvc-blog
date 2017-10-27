<?php

Class Model_Comments Extends Models_Base{
    
    public function fieldsTable(){
        return array(
            'id' => 'Id',
            'article_id' => 'Id статьи',
            'comment' => 'Текст',
            'date' => '',
            'name' => '',
            'email' => '',
            'subscribe' => ''
        );
    }
    
}