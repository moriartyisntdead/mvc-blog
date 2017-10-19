<?php

Class Model_Articles Extends Models_Base{
    
    public function getCategoryAnchor(){
        $stmt = $this->db->prepare("select anchor from categories WHERE id=? LIMIT 1");
        $stmt->execute(array($this->category_id));
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject()->anchor;
    }

    public function getCategoryByAnchor($anchor){
        $stmt = $this->db->prepare("select * from categories WHERE anchor=? LIMIT 1");
        $stmt->execute(array($anchor));
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject();
    }

}