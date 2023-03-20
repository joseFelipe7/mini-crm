<?php

class Collaborator extends CI_Model {

    public function index($email){
        $sql = "SELECT email, password FROM logins WHERE email = ?";
        return $this->db->query($sql, [$email])->row();
    }
    public function createLogin($data){
            $this->db->trans_begin(); 
            $this->db->query('INSERT INTO collaborator SET type_collaborator = 1, name = ?', [$data['name']]);
            $insertId = $this->db->insert_id();

            $this->db->query('INSERT INTO logins SET id_collaborator = ?, email = ?, password = ?', [$insertId, $data['email'], $data['pass']]);
            if($this->db->trans_status() === FALSE){ 
                $this->db->trans_rollback(); 
                return false;
            }else{
                $this -> db -> trans_commit (); 
                return true;
            }
    }
    public function createProvider($email){
        $sql = "SELECT email, password FROM logins WHERE email = ?";
        return $this->db->query($sql, [$email])->row();
    }
}