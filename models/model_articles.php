<?php

Class Model_Articles Extends Models_Base{

    public function fieldsTable(){
        return array(
            'id' => 'Id',
            'title' => '',
            'description' => '',
            'content' => '',
            'img' => '',
            'author_id' => '',
            'url' => '',
            'published' => '',
            'category_id' => '',
            'date' => ''
        );
    }
    
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

    public function getDate(){
        $m = date('m', strtotime($this->date));
        switch ($m){
            case 1:
                $month = 'Січень';
                break;
            case 2:
                $month = 'Лютий';
                break;
            case 3:
                $month = 'Березень';
                break;
            case 4:
                $month = 'Квітень';
                break;
            case 5:
                $month = 'Травень';
                break;
            case 6:
                $month = 'Червень';
                break;
            case 7:
                $month = 'Липень';
                break;
            case 8:
                $month = 'Серпень';
                break;
            case 9:
                $month = 'Вересень';
                break;
            case 10:
                $month = 'Жовтень';
                break;
            case 11:
                $month = 'Листопад';
                break;
            case 12:
                $month = 'Грудень';
                break;
        }
        return date($month. ' d, Y', strtotime($this->date));
    }

    public function getCommentsCount(){
        $stmt = $this->db->prepare("select count(id) AS k from comments WHERE article_id=?");
        $stmt->execute(array($this->id));
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject()->k;
    }

    public function getComments(){
        $stmt = $this->db->prepare("select * from comments WHERE article_id=? order by date");
        $stmt->execute(array($this->id));
        if ($stmt->rowCount() == 0) return [];
        else return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLikesCount(){
        $stmt = $this->db->prepare("select count(id) AS k from likes WHERE row_id=?");
        $stmt->execute(array($this->id));
        if ($stmt->rowCount() == 0) return false;
        else return $stmt->fetchObject()->k;
    }

    public function getTags(){
        $stmt = $this->db->prepare("select * from tags WHERE article_id=?");
        $stmt->execute(array($this->id));
        if ($stmt->rowCount() == 0) return [];
        else return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}