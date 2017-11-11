<?php

Class Model_Tags Extends Models_Base{
    public function fieldsTable(){
        return array(
            'id' => 'Id',
            'article_id' => '',
            'tag' => ''
        );
    }

    public static function getArticlesByTag($tag){
        $t = new static;
        $stmt = $t->db->prepare("select group_concat(article_id) AS result from tags WHERE tag=?");
        $stmt->execute(array($tag));
        if ($stmt->rowCount() > 0) return $stmt->fetchObject()->result;
        else return '';
    }
}