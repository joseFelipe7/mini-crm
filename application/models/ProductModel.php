<?php

class ProductModel extends CI_Model {

    public function index($email){
        $sql = "SELECT 
            c.id, 
            c.email, 
            l.password 
        FROM collaborator c
        LEFT JOIN logins l ON l.id_collaborator = c.id
        WHERE c.email = ?";
        return $this->db->query($sql, [$email])->row();
    }
    public function getOne($id){
        $sql = "SELECT 
                    c.id,
                    c.type_collaborator,
                    c.name,
                    c.email
                FROM collaborator c
                LEFT JOIN logins l ON l.id_collaborator = c.id
                LEFT JOIN providers p ON p.id_collaborator = c.id
                WHERE c.id = ?";
        return $this->db->query($sql, [$id])->row();

    }
    public function delete($id){
        $this->db->query('UPDATE collaborator SET status_active = 0 WHERE id = ?', [$id]);

        return ;

    }
    public function list(){
        $sql = "SELECT 
                    id, 
                    name, 
                    price, 
                    description 
                FROM products 
                WHERE status_active = 1";
        return $this->db->query($sql)->result();
    }
    public function listTotal($filter){
        $this->load->library('pagination_custom');
        $filter = $this->pagination_custom->queryFilter($filter, ['name', 'email']);
        $sql = "SELECT 
                    c.id,
                    c.name,
                    c.email,
                    c.type_collaborator,
                    t.name type_collaborator_name,
                    c.created_at
                FROM collaborator c
                LEFT JOIN logins l ON l.id_collaborator = c.id
                LEFT JOIN types t on t.id = c.type_collaborator
                WHERE c.status_active = 1
                HAVING $filter";
        return $this->db->query($sql)->num_rows();
    }
    public function update($id, $data){
        $this->db->trans_begin(); 
        $this->db->query('UPDATE collaborator SET type_collaborator = 1, email = ?, name = ? WHERE id = ?', [$data['email'], $data['name'], $id]);
        
        if($this->db->trans_status() === FALSE){ 
            $this->db->trans_rollback(); 
            return false;
        }else{
            $this->db->trans_commit(); 
            return true;
        }
    }
    public function insert($data){
        if($data['type_collaborator'] == 1){
            $this->createLogin($data);
        }
        else if($data['type_collaborator'] == 2){
            $this->createProvider($data);

        }
        
    }
    private function createLogin($data){
            $this->db->trans_begin(); 
            $this->db->query('INSERT INTO collaborator SET type_collaborator = 1, email = ?, name = ?', [$data['email'], $data['name']]);
            $insertId = $this->db->insert_id();

            $this->db->query('INSERT INTO logins SET id_collaborator = ?, password = ?', [$insertId, $data['pass']]);
            if($this->db->trans_status() === FALSE){ 
                $this->db->trans_rollback(); 
                return false;
            }else{
                $this -> db -> trans_commit (); 
                return true;
            }
    }
    private function createProvider($data){
        $this->db->trans_begin(); 
        $this->db->query('INSERT INTO collaborator SET type_collaborator = 2 , email = ?, name = ?', [$data['email'], $data['name']]);
        $insertId = $this->db->insert_id();
        $this->db->query('INSERT INTO providers SET id_collaborator = ?', [$insertId]);
        die();
        if($this->db->trans_status() === FALSE){ 
            $this->db->trans_rollback(); 
            return false;
        }else{
            $this->db->trans_commit (); 
            return true;
        }
    }
}