<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
   private $data = array();

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('CollaboratorModel', 'collaborator');
      $this->load->model('ProductModel', 'product');

      $this->data['collaborator'] = [];
      $this->data['title'] = 'Produtos';
      $this->data['sidebarOption'] = 'product';
   }
   
   public function index(){
      
      $this->load->library('pagination_custom');
      
      
      $this->template->load('template_dashboard', 'pages/product/list', $this->data);
   }
   public function novo(){
      
      $this->data['title'] = 'Novo Produto';
      
      $this->template->load('template_dashboard', 'pages/product/form', $this->data);
   }
   public function editar($id){
      
      $this->data['title'] = 'Editar Produto';
      $this->data['collaborator'] = $this->collaborator->getOne($id);
      $this->template->load('template_dashboard', 'pages/product/form', $this->data);
   }
   public function save(){
      try {
         // $this->load->library('form_validation');
         // $this->form_validation->set_data($this->input->post());
         // $this->form_validation->set_rules('name', 'Nome', 'trim|required');
         // $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
         // $this->form_validation->set_rules('password', 'Senha', 'trim|required');

         // if(!$this->form_validation->run()) return redirect(base_url().'login', 'refresh');

         $input = $this->input->post();
         
         $data = [
            "name"=>$input['name'],
            "price"=>number_format(preg_replace('/[.$R,]/', '', $input['price'])/100, 2,'.',''),
            "description"=>$input['description']
         ];
         
         if($input['id'] != 0){
            $this->product->update($data);

         }else{
            $this->product->insert($data);
         }

        
         return redirect(base_url().'produtos', 'refresh');
          
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
