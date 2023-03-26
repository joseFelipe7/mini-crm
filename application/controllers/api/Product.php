<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Product extends REST_Controller {
   public function index_get(){
      $this->load->library('pagination_custom');

      $page = $this->input->get('page') ?: 1;
      $perPage = $this->input->get('per_page') ?: 10;
      $sort = $this->input->get('sort') ?: null;
      $filter = $this->input->get('filter') ?: [];

      if (!$this->pagination_custom->validSort($sort, ['name', 'price' ])){
         return $this->response(["message"=>"1 errors were found","errors"=>["invalid attribute or format of sort"] ], REST_Controller::HTTP_BAD_REQUEST);
      }

      if (!$this->pagination_custom->validFilter($filter, ['name', 'price' ])){
         return $this->response(["message"=>"1 errors were found","errors"=>["invalid attribute or format of filter"] ], REST_Controller::HTTP_BAD_REQUEST);
      }
      $this->load->model('ProductModel', 'product');
      
      $products =  $this->product->list($page, $perPage, $sort, $filter);
      $totalProducts =  $this->product->listTotal($filter);
      
      $meta =  $this->pagination_custom->transformMeta($page, $perPage, $totalProducts);

      $this->response(array(
                           "meta"=>$meta, 
                           "data"=>["products"=>$products]
                     ), REST_Controller::HTTP_OK);
	}
    public function index_post(){
        $this->load->library('form_validation');
        $this->load->model('CollaboratorModel', 'collaborator');
        try {
            $this->form_validation->set_data($this->post());
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
            $this->form_validation->set_rules('password', 'Senha', 'trim|required');

            if(!$this->form_validation->run()) return $this->response(array("message"=>"invalid fields", "errors"=>validation_errors()), REST_Controller::HTTP_UNPROCESSABLE_ENTITY); 
            
            $input = $this->post();
            $collaborator = $this->order->index($input['email']);

            if(!$collaborator) return $this->response(array("message"=>"wrong credentials", "errors"=>["your email was not found"]), REST_Controller::HTTP_UNAUTHORIZED);
            

            if(!password_verify($input['password'], $collaborator->password)) return $this->response(array("message"=>"wrong credentials", "errors"=>["Your password is incorrect. check it out"]) , REST_Controller::HTTP_UNAUTHORIZED);


            return $this->response(["message"=>"User logged with successfully", "data"=>array("collaborator"=>$collaborator)], REST_Controller::HTTP_OK);


        } catch (\Throwable $th) {
            return $this->response([
                'status' => False,
                'message' => $th->getMessage(),
            ], REST_Controller::HTTP_BAD_REQUEST);
           
        }

    }
}
    