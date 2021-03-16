<?php

class Auth_model extends CI_Model{
    public function adminlogin($username,$password){
        return $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
    }
}


?>