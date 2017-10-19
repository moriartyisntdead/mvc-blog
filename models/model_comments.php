<?php

Class Model_Comments Extends Models_Base{

    public function getCommentsCount(){
        $stmt = $this->db->prepare("select count(id) AS k from comments WHERE article_id=?");
        $stmt->execute(array($this->id));
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject()->k;
    }
}