<?php

class Category extends Model{

    public function getList(){
        $sql = "select * from categories where parent_id = 0 order by sort";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int) $id;
        $sql = "select * from categories where id = '{$id}'";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getParentById($id){
        $id = (int) $id;
        $sql = "select * from categories where parent_id = '{$id}'";
        $result = $this->db->query($sql);
        return isset($result) ? $result : null;
    }

}