<?php

class OrderModel extends CI_Model {

    public function list($page, $itensPerPage, $sort, $filter){
        $this->load->library('pagination_custom');

        $startPosition = $this->pagination_custom->itemStartPage($page, $itensPerPage);
        $sort = $this->pagination_custom->querySort($sort);
        $filter = $this->pagination_custom->queryFilter($filter, ['provider', 'status_order','quantity_products', 'date_order']);  
        
        $sql = "SELECT 
                    o.id,
                    c.name as provider,
                    COUNT(o.id) as quantity_products,
                    t.name as status_order,
                    DATE_FORMAT(o.created_at, '%d/%m/%Y')  as date_order
                FROM orders o
                JOIN collaborator c ON c.id = o.id_provider
                JOIN order_itens  oi ON oi.id_order = o.id
                JOIN types t ON t.id = o.id_status_purchase
                WHERE o.status_active = 1
                GROUP BY o.id
                HAVING $filter
                $sort
                LIMIT $startPosition, $itensPerPage";
        return $this->db->query($sql)->result();
    }
    public function listTotal($filter){
        $this->load->library('pagination_custom');
        $filter = $this->pagination_custom->queryFilter($filter, ['provider', 'status_order','quantity_products', 'date_order']);
        $sql = "SELECT 
                    o.id,
                    c.name as provider,
                    COUNT(o.id) as quantity_products,
                    t.name as status_order,
                    DATE_FORMAT(o.created_at, '%d/%m/%Y')  as date_order
                FROM orders o
                JOIN collaborator c ON c.id = o.id_provider
                JOIN order_itens  oi ON oi.id_order = o.id
                JOIN types t ON t.id = o.id_status_purchase
                WHERE o.status_active = 1
                GROUP BY o.id
                HAVING $filter";
        return $this->db->query($sql)->num_rows();
    }
    public function insert($data){
        
        $this->db->trans_begin(); 
        $this->db->query('INSERT INTO orders SET id_provider = ?, id_status_purchase = 3, observation = ?', [$data['idProvider'], $data['observation']]);
        $insertId = $this->db->insert_id();
        foreach ($data['products'] as $key => $value) {
            $this->db->query('INSERT INTO order_itens SET id_order = ?, id_product = ?, amount = ?', [$insertId, $value['id'], $value['amount']]);
        }
        if($this->db->trans_status() === FALSE){ 
            $this->db->trans_rollback(); 
            return false;
        }else{
            $this->db->trans_commit(); 
            return true;
        }
        

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
    public function delete($id){
        $this->db->query('UPDATE collaborator SET status_active = 0 WHERE id = ?', [$id]);

        return ;

    }
}