<?php

class Product extends Model{

    public function getList(){
        $sql = "select * from products where 1";
        return $this->db->query($sql);
    }

    public function getByAlias($alias){
        $alias = $this->db->escape($alias);
        $sql = "select * from products where alias = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByCategory($id){
        $id = (int) $id;
        $sql = "select p.*, pc.* from products as p, categories as c, products_categories as pc
                where p.id = pc.product_id and c.id = pc.category_id and c.id = '{$id}'";
        return $this->db->query($sql);
    }


    public function getCategoryById($id){
        $id = (int) $id;
        $sql = "select c.* from products as p, categories as c, products_categories as pc
                where p.id = pc.product_id and c.id = pc.category_id and p.id = '{$id}'";
        return $this->db->query($sql)[0];
    }
}