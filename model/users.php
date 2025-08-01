<?php

class users extends Model
{
    protected $class_name = 'users';
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $name;
    protected $email;
    protected $phone;
    protected $password;
    protected $created_at;
    protected $updated_at;
    protected $role;

    public function user($email ){
        global $db;
        // Lấy đủ các trường cần thiết cho xác thực và phân quyền
        $sql = "SELECT * FROM `users` WHERE email = '$email' LIMIT 1; ";
        $result = $db->executeQuery_list( $sql );
        return $result;
    }

    public function user_by_username($username) {
        global $db;
        $sql = "SELECT * FROM `users` WHERE username = '" . $db->escape_str($username) . "' LIMIT 1; ";
        $result = $db->executeQuery_list($sql);
        return $result;
    }

    public function get_detail_by_id($id) {
        global $db;
        $sql = "SELECT * FROM `users` WHERE id = '" . intval($id) . "' LIMIT 1";
        $result = $db->executeQuery_list($sql);
        return isset($result[0]) ? $result[0] : null;
    }
}
