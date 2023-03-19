<?php

class Test extends CI_Model {

    public function index(){

        return $this->db->query("SELECT * FROM players")->result();
    }
}