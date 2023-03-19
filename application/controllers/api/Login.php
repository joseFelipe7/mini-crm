<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Login extends REST_Controller {
    public function index_get()
	{
        $data = array("item"=>"sds");
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
    public function index_post(){
        $this->load->library('form_validation');
        $this->load->model('Collaborator');
        try {
            $this->form_validation->set_data($this->post());
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
            $this->form_validation->set_rules('password', 'Senha', 'trim|required');

            if(!$this->form_validation->run()) return $this->response(array("message"=>"invalid fields", "errors"=>validation_errors()), REST_Controller::HTTP_UNPROCESSABLE_ENTITY); 
            
            $input = $this->post();
            $collaborator = $this->Collaborator->index($input['email']);

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
    