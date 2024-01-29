<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Auth_Controller {

	public function __construct() 
    {

	    parent::__construct();
	    $this->load->model('Team_model','model');
        require_once APPPATH . 'libraries/PHPExcel/Classes/PHPExcel.php';
	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
   public function index(){
    // Check if the user ID is 1
    if ($this->rankfordAdminDetails->id == 1) {
        // If user ID is 1, fetch all job numbers
        $data['job'] = $this->model->getJobNumber();
        $data['team'] = $this->model->getTeam();
    } else {
        // If user ID is not 1, fetch job numbers for the specific user
        $data['job'] = $this->model->getJobNumberForUser($this->rankfordAdminDetails->id);
        $data['team'] = $this->model->getTeamsByUserId($this->rankfordAdminDetails->id);
    }

    $this->load->view('team/list', $data);
}

     public function generate_excel() {
        PHPExcel_Autoloader::Register();

       $this->load->library('Pdf');
        $job_id = $this->input->post('job');
        $teamid = $this->input->post('team');
         $status = $this->input->post('history_status');
         $date  = $this->input->post('history_date');
        $todate  = $this->input->post('to_date');
       
        $data= $this->model->get_datatables($job_id,$teamid,$status,$date,$todate);
          // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Your Name")
                                 ->setLastModifiedBy("Your Name")
                                 ->setTitle("Team Data")
                                 ->setSubject("Team Data")
                                 ->setDescription("Generated Team Data")
                                 ->setKeywords("team, data, excel")
                                 ->setCategory("Data");

    // Add a worksheet
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    // Set column headers
    $sheet->setCellValue('A1', '#Serial');
    $sheet->setCellValue('B1', 'Job Number');
    $sheet->setCellValue('C1', 'Date');
    $sheet->setCellValue('D1', 'Team Name');
    $sheet->setCellValue('E1', 'Description');
    $sheet->setCellValue('F1', 'Status');


    // Populate data
   $row = 2;
    $serialNumber = 1;

    foreach ($data as $row_data) {
        // Set the serial number
        $sheet->setCellValue('A' . $row, $serialNumber);

        // Rest of the code...
        $sheet->setCellValue('B' . $row, $row_data['job_number']);
        $sheet->setCellValue('C' . $row, $row_data['date']);
        $sheet->setCellValue('D' . $row, $row_data['team_name']);
        $sheet->setCellValue('E' . $row, $row_data['remarks']);
        $sheet->setCellValue('F' . $row, ($row_data['status'] == 0) ? 'Pending' : 'Approve');
        // Add more columns as needed

        // Increment the counter for the next row
        $serialNumber++;
        $row++;
    }

    // Set the headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="team_data.xlsx"');
    header('Cache-Control: max-age=0');

    // Save the file to the output
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
     }
 
    
 
    
    public function create(){
           
        $this->form_validation->set_rules('job', 'Job Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('remarks', 'Remarks', 'trim|required|xss_clean');
          if($this->form_validation->run() == FALSE) 
        {
              $data['job_number'] = $this->model->getJobNumber();
              $data['team_names'] = $this->model->getTeamNames();
            $this->load->view('team/add',$data);
        }
        else{
              $job_number = $this->input->post('job');
            
            $date = $this->input->post('date');
            $remarks = $this->input->post('remarks');
              $team = $this->input->post('team');
            $value = array('user_id' => $this->rankfordAdminDetails->id ,'job_id' => $job_number,'date'=>$date, 'remarks' =>$remarks,'team'=>$team);
             $this->model->insert($value);
            
            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Team');

        }
        
        }
        	public function generate_pdf(){
	  $this->load->library('Pdf');
        $job_id = $this->input->post('job');
        $teamid = $this->input->post('team');
         $status = $this->input->post('history_status');
         $date  = $this->input->post('history_date');
        $todate  = $this->input->post('to_date');
       
        $data['details'] = $this->model->get_datatables($job_id,$teamid,$status,$date,$todate);
      
	 $html = $this->load->view('team/reportPdf',$data, true);
 
     $this->pdf->createPDF($html, 'PL_Report', true);
 }
         public function list() {
        
       
         $job_id = $this->input->post('job_id');
         $date  = $this->input->post('date');
        $status = $this->input->post('status');
        $todate  = $this->input->post('todate');
        $teamid = $this->input->post('teamid');
        $list = $this->model->get_datatables($job_id,$teamid,$status,$date,$todate);
          
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
          $row[] =$career['team_name'];
          $row[] =$career['remarks'];
         $status = $career['status'];
        $id=$career['id'];
if ($this->rankfordAdminDetails->id == 1) {
    // If user ID is 1, display a select box
    $options = array(
        0 => 'Pending',
        1 => 'Approved'
    );
  $select_html = form_dropdown('status', $options, $status, 'class="form-control" onchange="updateStatus(' . $id . ', this.value)" disabled');
  $select_html ='<a href="'.CUSTOM_BASE_URL.'Team/edit/'.$career['id'].'" class="btn  btn-warning" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>';
    $row[] = $select_html;
        $row[] = $select_html;
}else {
    // If user ID is not 1, display status as text
    if ($status == 0) {
        $row[] = "Pending";
    } else {
        $row[] = "Approved";
    }
}

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
        public function edit($id){
            $data['job_number'] = $this->model->getJobNumber();
              $data['team_names'] = $this->model->getTeamNames();
            $data['list'] = $this->model->get_details($id);
          
          $this->load->view('team/list_edit',$data);
        }
        public function updateStatus()
{
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->model->updateStatus($id, $status);

    // Set the proper headers for JSON response
    $this->output->set_content_type('application/json');
    
    // Return a JSON response
    echo json_encode(['success' => true]);
}
    public function updateData(){
        $this->form_validation->set_rules('job', 'Job', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('team', 'Team', 'trim|required|xss_clean');
        $this->form_validation->set_rules('remarks', 'Remarks', 'trim|required|xss_clean');
          if($this->form_validation->run() == FALSE) 
        {
              $data['job_number'] = $this->model->getJobNumber();
              $data['team_names'] = $this->model->getTeamNames();
              $data['list'] = $this->model->get_details($id);
            $this->load->view('team/list_edit',$data);
        }
        else{
             $id = $this->input->post('editid');
             $job = $this->input->post('job');
             $team = $this->input->post('team');
             $date = $this->input->post('date');
             $remarks = $this->input->post('remarks');
             $status=$this->input->post('buttonValue');;
             $user_id=$this->rankfordAdminDetails->id;
             $this->model->updateData($id,$job,$team,$date,$remarks,$status,$user_id);
             $this->session->set_flashdata('update', 'Updated Successfully');
             redirect('Team');
             
        }
    }
}