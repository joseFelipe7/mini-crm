<?php

class ProductModel extends CI_Model {

    public function index(){
        $sql = "SELECT 
                    id, 
                    name, 
                    price, 
                    description 
                FROM products 
                WHERE status_active = 1";
        return $this->db->query($sql)->row();
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
    public function list($page, $itensPerPage, $sort, $filter){
        $this->load->library('pagination_custom');

        $startPosition = $this->pagination_custom->itemStartPage($page, $itensPerPage);
        $sort = $this->pagination_custom->querySort($sort);
        $filter = $this->pagination_custom->queryFilter($filter, ['name', 'price']);  
        
        $sql = "SELECT 
                    id, 
                    name, 
                    CONCAT('R$ ', FORMAT(price, 2, 'de_DE')) as price, 
                    description,
                    DATE_FORMAT(created_at, '%d/%m/%Y')  as created_at
                FROM products 
                WHERE status_active = 1
                HAVING $filter
                $sort
                LIMIT $startPosition, $itensPerPage";
        return $this->db->query($sql)->result();
    }
    public function listTotal($filter){
        $this->load->library('pagination_custom');
        $filter = $this->pagination_custom->queryFilter($filter, ['name', 'price']);
        $sql = "SELECT 
                    id, 
                    name, 
                    CONCAT('R$ ', FORMAT(price, 2, 'de_DE')) as price,
                    description,
                    DATE_FORMAT(created_at, '%d/%m/%Y')  as created_at
                FROM products 
                WHERE status_active = 1
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
        $this->db->query('INSERT INTO products SET name = ?, price = ?, description = ?', [$data['name'], $data['price'], $data['description']]);
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