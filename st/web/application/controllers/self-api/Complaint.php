<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php'; //include Rest Controller library

class Complaint extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->library('notification_lib');
        $this->load->model('self-api/Complaint_model','model'); //load user model

        $this->load->helper('url');

        $this->load->helper('common');
    }

    
    public function get_complaint_list_post() 
    {
            $role = $this->input->post('role');
            $user_id = $this->input->post('user_id');
            $status = $this->input->post('status');
            $department = $this->input->post('department');
            $employee = $this->input->post('employee');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $ticket_id = $this->input->post('ticket_id');
            $contract_no = $this->input->post('contract_no');
            $row = $this->input->post('row');
            
            if(!empty($row))
            {
            $row = ($row) * 20;	 
            }
            
            $res = $this->model->get_complaint_list($role,$user_id,$status,$department,$employee,$from,$to,$ticket_id,$contract_no,$row);
          

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


    public function complaint_reg_post() 
    {
            $complaint = $this->input->post('complaint');
            $user_id = $this->input->post('user_id');
            $remark = $this->input->post('remark');
            $department_id = $this->input->post('department_id');
            
            $name = $this->input->post('name');
            $mobile_no = $this->input->post('mobile_no');
            $house_no = $this->input->post('house_no');
            $street_no = $this->input->post('street_no');
            $block_no = $this->input->post('block_no');
            $location = $this->input->post('location');
            $contract_no = $this->input->post('contract_no');
            
            $date = date('Y-m-d');
            $status = 1;

                //array to show the response
                $response = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message = 'Params';
                $is_error = false; 


                if(!isset($_FILES['image1']['name'])){
                    $message .= "Profile image";
                    $is_error = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error){
                    $response['error'] = true; 
                    $response['message'] = $message . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name=uniqid() . '.'.pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
                    $target_file = $target_dir . $im_name;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image1"]["tmp_name"],$target_file)) {
                       
                        
                        $profile1 = $im_name;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response['error'] = true; 
                        $response['message'] = 'Try again later...';
                    }
                    
                }


                //array to show the response
                $response4 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir4 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message4 = 'Params';
                $is_error4 = false; 


                if(!isset($_FILES['image2']['name'])){
                    $message4 .= "Profile image";
                    $is_error4 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error4){
                    $response4['error'] = true; 
                    $response4['message'] = $message4 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name4=uniqid() . '.'.pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
                    $target_file4 = $target_dir4 . $im_name4;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image2"]["tmp_name"],$target_file4)) {
                       
                        
                        $profile2 = $im_name4;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response4['error'] = true; 
                        $response4['message'] = 'Try again later...';
                    }
                    
                }
                
                //array to show the response
                $response5 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir5 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message5 = 'Params';
                $is_error5 = false; 


                if(!isset($_FILES['image3']['name'])){
                    $message5 .= "Profile image";
                    $is_error5 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error5){
                    $response5['error'] = true; 
                    $response5['message'] = $message5 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name5=uniqid() . '.'.pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
                    $target_file5 = $target_dir5 . $im_name5;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image3"]["tmp_name"],$target_file5)) {
                       
                        
                        $profile3 = $im_name5;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response5['error'] = true; 
                        $response5['message'] = 'Try again later...';
                    }
                    
                }
                
                
                //array to show the response
                $response6 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir6 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message6 = 'Params';
                $is_error6 = false; 


                if(!isset($_FILES['image4']['name'])){
                    $message6 .= "Profile image";
                    $is_error6 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error6){
                    $response6['error'] = true; 
                    $response6['message'] = $message6 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name6=uniqid() . '.'.pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION);
                    $target_file6 = $target_dir6 . $im_name6;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image4"]["tmp_name"],$target_file6)) {
                       
                        
                        $profile4 = $im_name6;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response6['error'] = true; 
                        $response6['message'] = 'Try again later...';
                    }
                    
                }
                
                
                //array to show the response
                $response7 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir7 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message7 = 'Params';
                $is_error7 = false; 


                if(!isset($_FILES['image5']['name'])){
                    $message7 .= "Profile image";
                    $is_error7 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error7){
                    $response7['error'] = true; 
                    $response7['message'] = $message7 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name7=uniqid() . '.'.pathinfo($_FILES['image5']['name'], PATHINFO_EXTENSION);
                    $target_file7 = $target_dir7 . $im_name7;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image5"]["tmp_name"],$target_file)) {
                       
                        
                        $profile5 = $im_name7;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response7['error'] = true; 
                        $response7['message'] = 'Try again later...';
                    }
                    
                }                


                //array to show the response
                $response2 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir2 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/voice/";
                
                //error message and error flag
                $message2 = 'Params';
                $is_error2 = false; 


                if(!isset($_FILES['voice']['name'])){
                    $message2 .= "Voice";
                    $is_error2 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error2){
                    $response2['error'] = true; 
                    $response2['message'] = $message2 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name2=uniqid() . '.'.pathinfo($_FILES['voice']['name'], PATHINFO_EXTENSION);
                    $target_file2 = $target_dir2 . $im_name2;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["voice"]["tmp_name"],$target_file2)) {
                       
                        
                        $voice = $im_name2;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response2['error'] = true; 
                        $response2['message'] = 'Try again later...';
                    }
                    
                }


                //array to show the response
                $response3 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir3 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/video/";
                
                //error message and error flag
                $message3 = 'Params';
                $is_error3 = false; 


                if(!isset($_FILES['video']['name'])){
                    $message3 .= "Video";
                    $is_error3 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error3){
                    $response3['error'] = true; 
                    $response3['message'] = $message3 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name3=uniqid() . '.'.pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                    $target_file3 = $target_dir3 . $im_name3;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["video"]["tmp_name"],$target_file3)) {
                       
                        
                        $video = $im_name3;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response3['error'] = true; 
                        $response3['message'] = 'Try again later...';
                    }
                    
                }

            
            $val = array('user_id'=>$user_id,'name'=>$name,'mobile_no'=>$mobile_no,'house_no'=>$house_no,'street_no'=>$street_no,'block_no'=>$block_no,'status'=>$status,'date'=>$date,
            'complaint'=>$complaint,'image1'=>$profile1,'image2'=>$profile2,'image3'=>$profile3,'image4'=>$profile4,'image5'=>$profile5,'voice'=>$voice,'location'=>$location,'contract_no'=>$contract_no);
 

         
            $id = $this->model->insertComplaint($val);
            
            $ticket_id = "AJTK-".$id;
            
            $com = array('ticket_id'=>$ticket_id);
            
            $this->model->updateComplaint($id,$com);
            
            $val2 = array('complaint_id'=>$id,'remark'=>$remark,'video'=>$video);
            
            $this->model->insertRemark($val2);
            
            
            $val3 = array('department_id'=>$department_id,'complaint_id'=>$id,'date'=>$date);

            $status = $this->model->assignComplaint($val3,$id);
            
            $this->send_reg($department_id,$id);

	        if($id != 0) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => 'success',
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }

    public function complaint_assign_post() 
    {
            $id = $this->input->post('id');
            $complaint_id = $this->input->post('complaint_id');
            $department_id = $this->input->post('department_id');
            $employee_id = $this->input->post('employee_id');
            $last_date = $this->input->post('last_date');
            $update_status = $this->input->post('update_status');
            $remark = $this->input->post('remark');
            $role = $this->input->post('role');
            $date = date('Y-m-d');

                //array to show the response
                $response = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/video/";
                
                //error message and error flag
                $message = 'Params';
                $is_error = false; 


                if(!isset($_FILES['video']['name'])){
                    $message .= "Profile image";
                    $is_error = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error){
                    $response['error'] = true; 
                    $response['message'] = $message . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name=uniqid() . '.'.pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                    $target_file = $target_dir . $im_name;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["video"]["tmp_name"],$target_file)) {
                       
                        
                        $video = $im_name;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response['error'] = true; 
                        $response['message'] = 'Try again later...';
                    }
                    
                }


                //array to show the response
                $response2 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir2 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/voice/";
                
                //error message and error flag
                $message2 = 'Params';
                $is_error2 = false; 


                if(!isset($_FILES['voice']['name'])){
                    $message2 .= "Voice";
                    $is_error2 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error2){
                    $response2['error'] = true; 
                    $response2['message'] = $message2 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name2=uniqid() . '.'.pathinfo($_FILES['voice']['name'], PATHINFO_EXTENSION);
                    $target_file2 = $target_dir2 . $im_name2;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["voice"]["tmp_name"],$target_file2)) {
                       
                        
                        $voice = $im_name2;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response2['error'] = true; 
                        $response2['message'] = 'Try again later...';
                    }
                    
                }            

            if($role == 'admin'){
            $val = array('employee_id'=>$employee_id,'complaint_id'=>$complaint_id,'date'=>$date,'last_date'=>$last_date,'video'=>$video,'voice'=>$voice,'remark'=>$remark);
            $val2 = array('status'=>2);
            }
            else{
                
            $val = array('employee_id'=>$employee_id,'complaint_id'=>$complaint_id,'date'=>$date,'last_date'=>$last_date);
            $remark_val = array('complaint_id'=>$complaint_id,'video'=>$video,'voice'=>$voice,'remark'=>$remark);
            $val2 = array('status'=>2);    
            
            $this->model->insertDepartmentRemark($remark_val);
            
            }
            
            if($update_status == 1){
                
            $up_val = array('employee_id'=>$employee_id);

            $status = $this->model->updateAssignComplaint($complaint_id,$up_val);
            
            
            }
            else{
            
            $status = $this->model->assignComplaint($val,$complaint_id);
            $obj = $this->model->changeStatus($val2,$complaint_id);    
            
            
                
            }

	        if($role == 'admin'){
	            
	         $this->send_employee_assign($complaint_id,$role);
	         $this->send_dept_assign($complaint_id);
	         $this->send_cust_assign($complaint_id);
	            
	         //$this->send_dept_remark($complaint_id,2);
             //$this->send_employee_remark($complaint_id,$role);   
	            
	        }
	        else{

             $this->send_employee_assign($complaint_id,$role);
             $this->send_cust_assign($complaint_id);

             //$this->send_employee_remark($complaint_id,$role);   
	            
	            
	        }
    


	        if($status == 1) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => 'success',
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }    


    public function get_department_list_post() 
    {

            $list = $this->model->getDepartmentList();

	        if($list) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $list,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }
 
 
    public function get_employee_list_post() 
    {

            $list = $this->model->getEmployeeList();

	        if($list) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $list,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function change_status_post() 
    {

            $status = $this->input->post('status');
            $complaint_id = $this->input->post('complaint_id');
            $remark = $this->input->post('remark');
            $date = date('Y-m-d');

                //array to show the response
                $response = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/video/";
                
                //error message and error flag
                $message = 'Params';
                $is_error = false; 


                if(!isset($_FILES['video']['name'])){
                    $message .= "Profile image";
                    $is_error = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error){
                    $response['error'] = true; 
                    $response['message'] = $message . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name=uniqid() . '.'.pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                    $target_file = $target_dir . $im_name;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["video"]["tmp_name"],$target_file)) {
                       
                        
                        $video = $im_name;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response['error'] = true; 
                        $response['message'] = 'Try again later...';
                    }
                    
                }


                //array to show the response
                $response2 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir2 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/voice/";
                
                //error message and error flag
                $message2 = 'Params';
                $is_error2 = false; 


                if(!isset($_FILES['voice']['name'])){
                    $message2 .= "Voice";
                    $is_error2 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error2){
                    $response2['error'] = true; 
                    $response2['message'] = $message2 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name2=uniqid() . '.'.pathinfo($_FILES['voice']['name'], PATHINFO_EXTENSION);
                    $target_file2 = $target_dir2 . $im_name2;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["voice"]["tmp_name"],$target_file2)) {
                       
                        
                        $voice = $im_name2;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response2['error'] = true; 
                        $response2['message'] = 'Try again later...';
                    }
                    
                }  





                //array to show the response
                $response1 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir1 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message1 = 'Params';
                $is_error1 = false; 


                if(!isset($_FILES['image1']['name'])){
                    $message1 .= "Profile image";
                    $is_error1 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error1){
                    $response1['error'] = true; 
                    $response1['message'] = $message . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name1=uniqid() . '.'.pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
                    $target_file1 = $target_dir1 . $im_name1;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image1"]["tmp_name"],$target_file1)) {
                       
                        
                        $profile1 = $im_name1;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response1['error'] = true; 
                        $response1['message'] = 'Try again later...';
                    }
                    
                }


                //array to show the response
                $response4 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir4 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message4 = 'Params';
                $is_error4 = false; 


                if(!isset($_FILES['image2']['name'])){
                    $message4 .= "Profile image";
                    $is_error4 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error4){
                    $response4['error'] = true; 
                    $response4['message'] = $message4 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name4=uniqid() . '.'.pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
                    $target_file4 = $target_dir4 . $im_name4;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image2"]["tmp_name"],$target_file4)) {
                       
                        
                        $profile2 = $im_name4;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response4['error'] = true; 
                        $response4['message'] = 'Try again later...';
                    }
                    
                }
                
                //array to show the response
                $response5 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir5 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message5 = 'Params';
                $is_error5 = false; 


                if(!isset($_FILES['image3']['name'])){
                    $message5 .= "Profile image";
                    $is_error5 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error5){
                    $response5['error'] = true; 
                    $response5['message'] = $message5 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name5=uniqid() . '.'.pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
                    $target_file5 = $target_dir5 . $im_name5;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image3"]["tmp_name"],$target_file5)) {
                       
                        
                        $profile3 = $im_name5;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response5['error'] = true; 
                        $response5['message'] = 'Try again later...';
                    }
                    
                }
                
                
                //array to show the response
                $response6 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir6 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message6 = 'Params';
                $is_error6 = false; 


                if(!isset($_FILES['image4']['name'])){
                    $message6 .= "Profile image";
                    $is_error6 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error6){
                    $response6['error'] = true; 
                    $response6['message'] = $message6 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name6=uniqid() . '.'.pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION);
                    $target_file6 = $target_dir6 . $im_name6;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image4"]["tmp_name"],$target_file6)) {
                       
                        
                        $profile4 = $im_name6;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response6['error'] = true; 
                        $response6['message'] = 'Try again later...';
                    }
                    
                }
                
                
                //array to show the response
                $response7 = array();
    
                //uploads directory, we will upload all the files inside this folder
                //$target_dir = "https://myinstituter.com/my/uploads/student_reg/";
                $target_dir7 = $_SERVER["DOCUMENT_ROOT"]."/ticket-system/uploads/complaint/";
                
                //error message and error flag
                $message7 = 'Params';
                $is_error7 = false; 


                if(!isset($_FILES['image5']['name'])){
                    $message7 .= "Profile image";
                    $is_error7 = true; 
                }

                
                //in case we have an error in validation, displaying the error message 
                if($is_error7){
                    $response7['error'] = true; 
                    $response7['message'] = $message7 . " required."; 
                }else{
                    //if validation succeeds 
                    //creating a target file with a unique name, so that for every upload we create a unique file in our server
                    $im_name7=uniqid() . '.'.pathinfo($_FILES['image5']['name'], PATHINFO_EXTENSION);
                    $target_file7 = $target_dir7 . $im_name7;
                  //  $tmp = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . uniqid() . '.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		

                    //move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                   

                    //saving the uploaded file to the uploads directory in our target file
                    if (move_uploaded_file($_FILES["image5"]["tmp_name"],$target_file)) {
                       
                        
                        $profile5 = $im_name7;
                        
                        // print_r($target_file.' , '.$profile);exit;

                    } else {
                        $response7['error'] = true; 
                        $response7['message'] = 'Try again later...';
                    }
                    
                }                



            
            $val = array('status'=>$status,'finish_date'=>$date);

            $obj = $this->model->changeStatus($val,$complaint_id);
            
            $val2 = array('remark'=>$remark,'complaint_id'=>$complaint_id,'video'=>$video,'voice'=>$voice,'image1'=>$profile1,'image2'=>$profile2,'image3'=>$profile3,'image4'=>$profile4,'image5'=>$profile5);

            $this->model->insertEmployeeRemark($val2);
            
            if($status == 3){ 
	         $this->send_dept_status($complaint_id);
	         $this->send_cust_status($complaint_id);
            }
	        else{    
	         $this->send_dept_remark($complaint_id,1); 
	        }


	        if($obj == 1) {

	        	$this->response([
		 			'status' => TRUE,
		 			'message' => 'success',
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function get_assigned_list_post() 
    {

            $user_id = $this->input->post('user_id');
            $status = $this->input->post('status');

            $list = $this->model->getAssignedList($user_id,$status);

	        if($list) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $list,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function get_complaint_details_post() 
    {

            $complaint_id = $this->input->post('complaint_id');

            $details = $this->model->getComplaintDetails($complaint_id);

	        if($details) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $details,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function get_notification_list_post() 
    {

            $user_id = $this->input->post('user_id');
            $role = $this->input->post('role');

            $details = $this->model->getNotificationList($user_id,$role);

	        if($details) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => $details,
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }

    public function delete_complaint_post() 
    {

            $complaint_id = $this->input->post('complaint_id');

            $status = $this->model->deleteComplaint($complaint_id,$role);

	        if($status == 1) {

	        	$this->response([
		 			'status' => TRUE,
		 			'result' => 'success',
		 		
					], REST_Controller::HTTP_OK);
	        }
	 
	        else{

	            $this->response([
						'status' => TRUE,
						'message' => 'No result'
					], REST_Controller::HTTP_OK);
	        }


    }


    public function get_repeat_list_post() 
    {

            $contract_no = $this->input->post('contract_no');
            $row = $this->input->post('row');
            
            if(!empty($row))
            {
            $row = ($row) * 20;	 
            }
            
            $res = $this->model->get_repeat_list($contract_no,$row);
          

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


    public function send_reg($department_id,$com_id) {

         
       $title = "New complaint";
       $message = "New complaint registered";

        
        $registrationIds= array();

                
            $data = array('department_id'=>$department_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  
    
            $registrationIds = $this->model->get_tocken($department_id,1);    


        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }

    public function send_employee_assign($com_id,$role) {

         
       $title = "Assigned";
       $message = "New complaint assigned";

        
        $registrationIds= array();
        
        $employee_id = $this->model->getId($com_id);
       
        $employee_id = $employee_id->employee_id;

                
            $data = array('employee_id'=>$employee_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  
            
            if($role == 'admin'){
            
            $registrationIds = $this->model->get_tocken($employee_id,2);  
            
            }
            else{
                
            $registrationIds = $this->model->get_tocken($employee_id,1);    
                
            }


        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }
	 
	public function send_dept_assign($com_id) {

         
       $title = "Assigned";
       $message = "New complaint assigned";

        
        $registrationIds= array();
        
        $dept_id = $this->model->getId($com_id);
       
        $dept_id = $dept_id->department_id;

                
            $data = array('department_id'=>$dept_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  

            $registrationIds = $this->model->get_tocken($dept_id,2);  



        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }
	 
	public function send_cust_assign($com_id) {

         
       $title = "Assigned";
       $message = "Ticket status changed to in progress";

        
        $registrationIds= array();
        
        $cust_id = $this->model->getCustId($com_id);
       
        $cust_id = $cust_id->user_id;

       
            $data = array('customer_id'=>$cust_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  

            $registrationIds = $this->model->get_tocken($cust_id,2);  



        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }
	 
    public function send_dept_status($com_id) {

  
       $title = "Completed";
       $message = "Complaint closed";


        
        $registrationIds= array();
        
        $dept_id = $this->model->getId($com_id);
       
        $dept_id = $dept_id->department_id;

                
            $data = array('department_id'=>$dept_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  

            $registrationIds = $this->model->get_tocken($dept_id,1);  



        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }	 
	
	public function send_cust_status($com_id) {

  
       $title = "Completed";
       $message = "Complaint closed";


        
        $registrationIds= array();
        
        $cust_id = $this->model->getCustId($com_id);
       
        $cust_id = $cust_id->user_id;

                
            $data = array('customer_id'=>$cust_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  

            $registrationIds = $this->model->get_tocken($cust_id,2);  



        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }	 
	 
	public function send_dept_remark($com_id,$type) {

         
       $title = "Remark added";
       $message = "New Remark Added";
       
       $dept_id = $this->model->getId($com_id);
       
       $dept_id = $dept_id->department_id;

        
        $registrationIds= array();

                
            $data = array('department_id'=>$dept_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  
    
            $registrationIds = $this->model->get_tocken($dept_id,$type);    


        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }
	 
	public function send_employee_remark($com_id,$role) {

       if($role == 'admin'){ 
       $title = "Remark added";
       $message = "New Remark added by admin";
       }
       else{
       $title = "Remark added";
       $message = "New Remark added by department";    
           
       }
       
       
       $employee_id = $this->model->getId($com_id);
       
       $employee_id = $employee_id->employee_id;

        
        $registrationIds= array();

                
            $data = array('employee_id'=>$employee_id,'complaint_id'=>$com_id,'title' => $title,'message' => $message,'type'=>1,'date'=>date('Y-m-d'));
            
            $insert_id = $this->model->insertNotification($data);  
            
            if($role == 'admin'){
            $registrationIds = $this->model->get_tocken($employee_id,2);
            }
            else{
            $registrationIds = $this->model->get_tocken($employee_id,1);    
            }


        $mPushNotification = array('title'=>$title,'message'=>$message,'id'=>$insert_id,'type'=>1,'complaint_id'=>$com_id);

        $android=array('priority'=>'high');
        
        $headers = array('apns-push-type'=>'background','apns-priority'=>'5','apns-topic'=>'io.flutter.plugins.firebase.messaging');
        
        $aps = array('contentAvailable'=>TRUE);
        
        $notification = array('title'=>$title,'body'=>$message,'clickAction'=>'FLUTTER_NOTIFICATION_CLICK');
        
        //$aps = '{"payload":{"aps":{"contentAvailable":'.TRUE.'}}}';
        $payload = array('aps'=>$aps);
        $apns = array('payload'=>$payload,'headers'=>$headers);

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $mPushNotification,
            'android'=>$android,
            'apns'=>$aps,
            'notification'=>$notification,
        );

        return $this->sendPushNotification_post($fields);
        
	 }
	 


    private function sendPushNotification_post($fields) {

         define( 'FIREBASE_API_KEY',
         'AAAAR7kLgYk:APA91bH10MAOw40O28SxwHbOPCkwoJXRiS2vRTX6xmmaL4jZ2npL2NkDFqD148Qs_mjf0mWheNU3e2z3r5tyvlMan285bsxAUsmkeeCkyGjgog-D7qOQrZgT4fMWJ8sGAE4sX08oDhBS' );

        //firebase server url to send the curl request
        $url = 'https://fcm.googleapis.com/fcm/send';

        //building headers for the request
        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );
 
        //Initializing curl to open a connection
        $ch = curl_init();
 
        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);
 
        //adding headers 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        //adding the fields in json format 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        //finally executing the curl request 
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        //Now close the connection
        curl_close($ch);

    }


    
}?>