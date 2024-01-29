<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php'; //include Rest Controller library

class Login extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->library('notification_lib');
        $this->load->model('self-api/Login_model','model'); //load user model

        $this->load->helper('url');
        $this->load->helper('common');
        $this->load->library('bcrypt');
    }

    
    public function login_user_post() 
    {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $res = $this->model->loginWithCredentials($email);
            $db_password=$res->password;
            $db_email=$res->email;

            if (($this->bcrypt->check_password($password, $db_password)) && ($email==$db_email))

			{
			    
	        if($res) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $res,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }
	        
			}
			else{
			    
			 $this->response([
						'status' => TRUE,
						'message' => 'Incorrect email or password'
					], REST_Controller::HTTP_OK);   
			    
			    
			}


    }

    public function change_password_post() 
    {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $new_password = $this->input->post('new_password');
            
            $res = $this->model->change_password($id,$password,$new_password);


	        if($res == 1) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => 'success',
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'Password incorrect'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function user_reg_post() 
    {
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $house = $this->input->post('house');
            $block = $this->input->post('block');
            $street = $this->input->post('street');
            $address = $this->input->post('address');
            $role = 'customer';
            $password = $this->input->post('password');
            $hash = $this->bcrypt->hash_password($password);

            $value = array('username'=> $name,'role'=>$role,'email' => $mobile,'password' => $hash,'address'=>$address,'house_number'=>$house,'block_number'=>$block,'street_number'=>$street,'mobile'=>$mobile);
          
            $data = $this->model->insertUser($value,$mobile);

	        if($data != 0 && !empty($data)) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $data,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'Mobile Number Already Exist'
					], REST_Controller::HTTP_OK);
	        }


    }

    
}
?>