<?php

class categories extends Model
{
    protected $class_name = 'categories';
    protected $id;
    protected $name;
    protected $description;
    
    public function get_detail_by_id($id) {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$id'";
        $result = $db->executeQuery( $sql, 1);

        return $result;
    }
}