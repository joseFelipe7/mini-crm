<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

   private $data = array();
   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('CollaboratorModel', 'collaborator');

      $this->data['title'] = 'Colaboradores';
      $this->data['sidebarOption'] = 'collaborator';

   }
   
   public function index(){
      
      $this->load->library('pagination_custom');
      
      $this->data['collaborator'] = [];
      $this->template->load('template_dashboard', 'pages/collaborator/list', $this->data);
   }
   public function novo(){
      $this->data['title'] = 'Editar Colaborador';
      $this->template->load('template_dashboard', 'pages/collaborator/form', $this->data);
   }
   public function editar($id){
      $this->data['title'] = 'Editar Colaborador';
      $this->data['collaborator'] = $this->collaborator->getOne($id);
      $this->template->load('template_dashboard', 'pages/collaborator/form', $this->data);
   }
   public function save(){
      try {
         $this->load->library('form_validation');
         $this->form_validation->set_data($this->input->post());
         $this->form_validation->set_rules('name', 'Nome', 'trim|required');
         $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('password', 'Senha', 'trim|required');

         if(!$this->form_validation->run()) return redirect(base_url().'login', 'refresh');

         $input = $this->input->post();
         
         $collaborator = $this->collaborator->index($input['email']);

         if($collaborator && $collaborator->id != $input['id']) return redirect(base_url().'login', 'refresh');

         if($input['id'] != 0){
            print_r('a');
            $this->collaborator->update($input['id'], ["name"=> $input['name'],"email"=>$input['email']]);

         }else{
            $this->collaborator->insert(["name"=> $input['name'],"email"=>$input['email'], "type_collaborator" => $input['type_collaborator'], "pass"=>password_hash($input['password'], PASSWORD_BCRYPT)]);
         }

        
         return redirect(base_url().'colaboradores', 'refresh');
          
      }catch (\Throwable $th) {
         print_r($th->getMessage());
         //return redirect(base_url().'login', 'refresh');
      }      
   }
   public function delete($id){
      try {

         $this->collaborator->delete($id);
         return redirect(base_url().'colaboradores', 'refresh');
          
      }catch (\Throwable $th) {
         print_r($th->getMessage());
      }      
   }
   public function register(){
      try {
         $this->load->library('form_validation');
         $this->form_validation->set_data($this->input->post());
         $this->form_validation->set_rules('name', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
         $this->form_validation->set_rules('password', 'Senha', 'trim|required');

         if(!$this->form_validation->run()) return redirect(base_url().'login', 'refresh');

         $input = $this->input->post();
         
         $collaborator = $this->collaborator->index($input['email']);

         if($collaborator){
            return redirect(base_url().'login', 'refresh');
         }
         
         $this->collaborator->createLogin(["name"=> $input['name'],"email"=>$input['email'], "pass"=>password_hash($input['password'], PASSWORD_BCRYPT)]);

        
         return redirect(base_url().'colaboradores', 'refresh');
          
      }catch (\Throwable $th) {
         print_r($th->getMessage());
         //return redirect(base_url().'login', 'refresh');
      }      
   }
}
