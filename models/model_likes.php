<?php

Class Model_Likes Extends Models_Base{
    public function fieldsTable(){
        return array(
            'id' => 'Id',
            'row_id' => '',
            'user_id' => '',
            'type' => ''
        );
    }
}