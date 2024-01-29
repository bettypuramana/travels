<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remarks extends MY_Auth_Controller {

	public function __construct() 
    {

	    parent::__construct();
	    $this->load->model('Remarks_model','model');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
    public function index(){
    //      $data['job_number'] = $this->model->getJobNumber();
    //   $this->load->view('remarks/add');
     $data['job'] = $this->model->getJobNumber();
      $this->load->view('remarks/list',$data);
       
    }
    
    
    // public function joblist(){
    //     $list=$this->model->get_datatables();
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $career) {
            
    //           $no++;
    //     $row = array();
    //     $row[] = $no;
    //     $row[] = $career['job_number'];
    //     $row[] = '
    //       <a href="'.CUSTOM_BASE_URL.'Remarks/history/'.$career['job_number'].'" class="btn  btn-warning" href="#">History</a>';
    //       $data[] = $row;
    //     }
    //      $output = array(
    //     "draw" => $_POST['draw'],
    //     "recordsTotal" => $this->model->count_all(),
    //     "recordsFiltered" => $this->model->count_filtered(),
    //     "data" => $data,
    //     );
    
    //     echo json_encode($output);
    // }
    
    // public function history()
    // {
          
    //     $job_id = $this->uri->segment(3);
   
    //     // $id=$this->rankfordAdminDetails->id;
    //     // echo($id);
    //     // exit();
        
    //     $data['result'] = $this->model->getHistory($job_id);
     
    //  print_r($data);
    //  exit();
    //     $this->load->view('Remarks/history',$data);
    // }
    
    // public function history_list($id='')
    // {
    //       $list=$this->model->get_datatables1($id);
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $career) {
            
    //           $no++;
    //     $row = array();
    //     $row[] = $no;
        
    //     $date = date("d M Y", strtotime($career['date']));
    //     $row[] = $date;
    //     $row[]= $career['remarks'];
    //     // $row[] = '
    //     //   <a href="'.CUSTOM_BASE_URL.'Remarks/history/'.$career['job_number'].'" class="btn  btn-warning" href="#">History</a>';
    //       $data[] = $row;
    //     }
    //      $output = array(
    //     "draw" => $_POST['draw'],
    //     "recordsTotal" => $this->model->count_all1($id),
    //     "recordsFiltered" => $this->model->count_filtered1($id),
    //     "data" => $data,
    //     );
    
    //     echo json_encode($output);
    // }
    
     public function list() {
        
       
         $job_id = $this->input->post('job_id');
        $list = $this->model->get_datatables($job_id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $career) {
            
              $no++;
        $row = array();
      
       $job = $this->model->getJob($career['job_id']); 
    //   $arr2 = array_column($job_number, 'job_number');
    //     $b2=implode(",",$arr2); 
//   echo($job_number);
//   exit();
          $row[] = $no;
          $date = date("d M Y", strtotime($career['date']));
          $row[]=  $job[0]['job_number'];
          $row[] = $date;
          
          $row[] = $career['remarks'];
        //   $row[] = '
        //   <a href="'.CUSTOM_BASE_URL.'test_series_group/edit/'.$career['id'].'" class="btn  btn-warning" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
        // <a data-toggle="modal" data-id='.$career['id'].' data-target="#delModal" class="btn  btn-danger" href="#"><i class="fa  fa-trash-o" aria-hidden="true"></i></a>';
         $data[] = $row;
        }
        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->model->count_all($job_id),
        "recordsFiltered" => $this->model->count_filtered($job_id),
        "data" => $data,
        );
    
        echo json_encode($output);
        
      
        }
    
    public function create(){
             
        $this->form_validation->set_rules('job', 'Job Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('remarks', 'Remarks', 'trim|required|xss_clean');
          if($this->form_validation->run() == FALSE) 
        {
              $data['job_number'] = $this->model->getJobNumber();
            $this->load->view('remarks/add',$data);
        }
        else{
              $job_number = $this->input->post('job');
            $date = $this->input->post('date');
            $remarks = $this->input->post('remarks');

            $value = array('user_id' => $this->rankfordAdminDetails->id ,'job_id' => $job_number,'date'=>$date, 'remarks' =>$remarks);
             $this->model->insert($value);
            
            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Remarks');

        }
        
        }
}