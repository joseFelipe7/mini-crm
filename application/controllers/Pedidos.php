<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos
 extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('CollaboratorModel', 'collaborator');
      $this->load->model('ProductModel', 'product');
      $this->load->model('ProviderModel', 'provider');
      $this->load->model('OrderModel', 'order');
      $this->load->helper('Auth');

   }
   
   public function index(){
      $data = array() ;
      $data['title'] = 'Pedidos';
      $this->load->library('pagination_custom');
      
      //$data['collaborator'] = $this->product->list();
      $data['collaborator'] = [];
      $this->template->load('template_dashboard', 'pages/orders/list', $data);
   }
   public function novo(){
      $data = array('title'=>'Home') ;
      $data['products'] = $this->product->list();
      
      $data['provider'] = $this->provider->list();
      
      $this->template->load('template_dashboard', 'pages/orders/form', $data);
   }
   public function editar($id){
      $data = array('title'=>'Home') ;
      $data['collaborator'] = $this->collaborator->getOne($id);
      $this->template->load('template_dashboard', 'pages/orders/form', $data);
   }
   public function save(){
      try {
         userAuth();
         $this->load->library('form_validation');
         $this->form_validation->set_data($this->input->post());
         $this->form_validation->set_rules('id_provider', 'Fornecedor', 'trim|required');
         if(!$this->form_validation->run() || count($this->input->post('products')) < 1) return redirect(base_url().'login', 'refresh');
         
         $input = $this->input->post();
         $data = [
            'idProvider' => $input['id_provider'],
            'observation' => $input['observation']
         ];
         foreach ($input['products'] as $key => $value) {
            $data['products'][$key]['id'] = $value;
            $data['products'][$key]['amount'] = $input['productsQuantity'][$key];
         }     
         

         if($input['id'] != 0){
            //$this->order->update($input['id'], ["name"=> $input['name'],"email"=>$input['email']]);
         }else{
            $this->order->insert($data);
         }

        
         return redirect(base_url().'pedidos', 'refresh');
          
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
