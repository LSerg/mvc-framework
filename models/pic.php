<?php

class Pic extends Model{

    public function getList(){
        $sql = "select * from gallery where 1";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int) $id;
        $sql = "select * from gallery where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }
}