<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php'; //include Rest Controller library

class Fcm extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->library('notification_lib');
        $this->load->model('self-api/Fcm_model','model'); //load user model

        $this->load->helper('url');

        $this->load->helper('common');
    }

    
    public function fcm_update_post() //seller function
    {
    	$fcm=$this->post('fcm');
        $user_id=$this->post('user_id');

        if(!empty($user_id)) {

           $result= $this->model->update_fcm($fcm,$user_id);
             
            if($result) {

                
            	$this->response([
    		 			'status' => TRUE,
    					'result'=> 'updated'
    					], REST_Controller::HTTP_OK);
            }
     
            else{

                $this->response([
                        'status' => TRUE,
                        'message' => 'No row affected'
                    ], REST_Controller::HTTP_OK);
            }

        }
        else{
            //set the response and exit
            $this->response("Provide complete feature information to insert.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
}?>