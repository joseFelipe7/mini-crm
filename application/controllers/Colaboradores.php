<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('CollaboratorModel', 'collaborator');
   }
   
   public function index(){
      $data = array() ;
      $data['title'] = 'Colaboradores';
      $this->load->library('pagination_custom');
      print_r($this->pagination_custom->test());
      
      //$data['collaborator'] = $this->collaborator->list();
      $data['collaborator'] = [];
      $this->template->load('template_dashboard', 'pages/collaborator/list', $data);
   }
   public function novo(){
      $data = array('title'=>'Home') ;
      
      $this->template->load('template_dashboard', 'pages/collaborator/form', $data);
   }
   public function register(){
      

      try {
         $this->load->library('form_validation');
         $this->form_validation->set_data($this->input->post());
         $this->form_validation->set_rules('name', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('password', 'Senha', 'trim|required');

         if(!$this->form_validation->run()) return redirect('/login', 'refresh');

         $input = $this->input->post();
         
         $collaborator = $this->collaborator->index($input['email']);

         if($collaborator){
            return redirect('/login', 'refresh');
         }
         
         $this->collaborator->createLogin(["name"=> $input['name'],"email"=>$input['email'], "pass"=>password_hash($input['password'], PASSWORD_BCRYPT)]);

        
         return redirect('/colaboradores', 'refresh');
          
      }catch (\Throwable $th) {
         print_r($th->getMessage());
         //return redirect('/login', 'refresh');
      }      
   }
}
