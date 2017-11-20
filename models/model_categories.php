<?php

Class Model_Categories Extends Models_Base{

    public function getActiveCategories(){
        $stmt = $this->db->prepare("select * from categories WHERE published=1");
        $stmt->execute(array());
        if ($stmt->rowCount() == 0) return [];
        else return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}