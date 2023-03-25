<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   public function index(){
      $data = array('title'=>'Home') ;
      $this->template->load('template', 'pages/login', $data);
   }
   public function singin(){
      $this->load->library('session');
      $this->load->model('CollaboratorModel', 'collaborator');

      try {
         $this->load->library('form_validation');
         $this->form_validation->set_data($this->input->post());
         $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('password', 'Senha', 'trim|required');

         if(!$this->form_validation->run()) return redirect(base_url().'login', 'refresh');
         
         $input = $this->input->post();
         $collaborator = $this->collaborator->index($input['email']);

         if(!$collaborator) return redirect(base_url().'login', 'refresh');;
         
         if(!password_verify($input['password'], $collaborator->password)) return redirect(base_url().'login', 'refresh');

         $this->session->set_userdata("user", $collaborator);

         return redirect(base_url().'home', 'refresh');
          
      }catch (\Throwable $th) {
         $th->getMessage();
         //return redirect(base_url().'login', 'refresh');
      }      
   }
}
