<?php

class Review extends Model {

    public function getList(){
        $sql = "select * from reviews where 1 order by id DESC";
        return $this->db->query($sql);
    }

    public function add($data){
        if ( !isset($data['name']) || $data['name'] =='' || !isset($data['text']) || $data['text'] == '' ){
            return false;
        }

        $name = strip_tags($this->db->escape($data['name']));
        $text = strip_tags($this->db->escape($data['text']));

        $sql = "insert into reviews
               set name = '{$name}',
                  text = '{$text}'";

        return $this->db->query($sql);
    }

}