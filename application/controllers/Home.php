<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
      $this->load->helper('Auth');
      print_r(userAuth());
      $data = array('title'=>'Home') ;
      $this->template->load('template', 'pages/home', $data);
	}
    public function cadastro()
	{
      $data = array('title'=>'Home') ;
      $this->template->load('template', 'pages/home', $data);
	}
}
