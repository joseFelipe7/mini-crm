<?php

class Collaborator extends CI_Model {

    public function index($email){
        $sql = "SELECT email, password FROM logins WHERE email = ?";
        return $this->db->query($sql, [$email])->row();
    
    }
}