<?php

Class Model_Articles Extends Models_Base{
    public function test(){
        return 'test';
    }

    public function getCategoryAnchor(){
        $stmt = $this->db->prepare("select anchor from category order by id desc  LIMIT 1");
        $stmt->execute(array());
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject()->anchor;
    }
}