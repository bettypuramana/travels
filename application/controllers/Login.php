<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Auth_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('bcrypt');

        $this->load->model('Auth_model', 'model');

    }



    public function index(){ 

	    

	    if (!$this->is_logged_in()) //login only registered user from db
        { 
            //echo 1;exit;
           
          $this->do_login();
        }
        else{
        	redirect('/welcome');
        }

    }

   public function test()
   {
       
   }

    public function do_login() 

    {

        
    	$this->form_validation->set_rules('email', 'Username', 'trim|required|xss_clean');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        

        if ($this->form_validation->run() == FALSE) {



            $this->load->view('auth/login');

        } 

        else 

        {

		    $email    =  $this->input->post('email');

	      	$password =  $this->input->post('password');

	        $hash = $this->bcrypt->hash_password($password);

	        $res = $this->model->loginWithCredentials($email);
	        
	        $role = $res->role;
	        
	        if($role == "institute"){
	            
	            $id = $res->id;
	            $payment = $this->model->paymentStatus($id);
	            $payment_status = $payment->status;
	            $exp_date = $payment->exp_date;
	            $date = date('Y-m-d');


                if($payment_status !=1) {
  
				$this->session->set_flashdata('msg','<div class="alert-danger text-center">Payment Not Received</div>');

			    redirect('/Login');	                
	                
	            }
	            else if(strtotime($date) > strtotime($exp_date )) {
  
				$this->session->set_flashdata('msg','<div class="alert-danger text-center">Payment Not Received</div>');

			    redirect('/Login');	                
	                
	            }
	            else{
	                
	        $db_password=$res->password;

	        $db_email=$res->email;

	        

			if (($this->bcrypt->check_password($password, $db_password)) && ($email==$db_email))

			{
                
                $institute = $this->model->getInstituteData($res->id);
                
                $res->name = $institute->name;
                $res->image = $institute->image;

				$this->session->set_userdata('rankfordAdminDetails', $res);
				

			    redirect('/welcome');

			}

			else

			{

				$this->session->set_flashdata('msg','<div class="alert-danger text-center">Username or Password are incorrect</div>');

			    redirect('/Login');

		}	                
	                
	            }
	            
	            
	        }

	        $db_password=$res->password;

	        $db_email=$res->email;

	        

			if (($this->bcrypt->check_password($password, $db_password)) && ($email==$db_email))

			{

				$this->session->set_userdata('rankfordAdminDetails', $res);

			    redirect('/welcome');

			}

			else

			{

				$this->session->set_flashdata('msg','<div class="alert-danger text-center">Username or Password are incorrect</div>');

			    redirect('/Login');

		}

	    }

	}



	public function logout()  //logout

    { 

        $this->session->sess_destroy();

        $this->session->set_flashdata('msg', 'Successfully logged out');

        redirect('/Login');

    }

}
