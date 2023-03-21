<?php

class CollaboratorModel extends CI_Model {

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
    public function list($page, $itensPerPage, $sort, $filter){
        $this->load->library('pagination_custom');

        $startPosition = $this->pagination_custom->itemStartPage($page, $itensPerPage);
        $sort = $this->pagination_custom->querySort($sort);
        $filter = $this->pagination_custom->queryFilter($filter, ['name', 'email'], "AND");  
        
        $sql = "SELECT 
                    c.id,
                    c.name,
                    c.email,
                    c.created_at
                FROM collaborator c
                LEFT JOIN logins l ON l.id_collaborator = c.id
                WHERE c.type_collaborator = 1 AND c.status_active $filter
                $sort
                LIMIT $startPosition, $itensPerPage";
        return $this->db->query($sql)->result();
    }
    public function listTotal($filter){
        $this->load->library('pagination_custom');
        $filter = $this->pagination_custom->queryFilter($filter, ['name', 'email'], "AND");
        $sql = "SELECT 
                    c.id,
                    c.name,
                    c.email,
                    c.created_at
                FROM collaborator c
                LEFT JOIN logins l ON l.id_collaborator = c.id
                WHERE c.type_collaborator = 1 AND c.status_active $filter";
        return $this->db->query($sql)->num_rows();
    }
    public function update($id, $data){
        $this->db->trans_begin(); 
        $this->db->query('UPDATE collaborator SET type_collaborator = 1, email = ?, name = ? WHERE id = ?', [$data['email'], $data['name'], $id]);
        // $insertId = $this->db->insert_id();

        // $this->db->query('INSERT INTO logins SET id_collaborator = ?, password = ?', [$insertId, $data['pass']]);
        if($this->db->trans_status() === FALSE){ 
            $this->db->trans_rollback(); 
            return false;
        }else{
            $this->db->trans_commit(); 
            return true;
        }
    }
    public function createLogin($data){
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
    public function createProvider($email){
        $sql = "SELECT email, password FROM logins WHERE email = ?";
        return $this->db->query($sql, [$email])->row();
    }
}