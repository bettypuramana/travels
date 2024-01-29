<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends MY_Auth_Controller  //extend MY_Auth_Controller from CI_controller in core
{ 

  public function __construct() {

    parent::__construct();
    $this->load->model('Complaint_model', 'model');
    $this->load->library('bcrypt');

    if (!$this->is_logged_in()) 
    {
      redirect('login');
    }
  }



    public function index() {


        $data['department'] = $this->model->get_department();
        $data['employee'] = $this->model->get_employee();
        $data['customer'] = $this->model->get_customer();
        $data['contract'] = $this->model->get_contract();
        $this->load->view('complaint/list',$data);

    }
    
    public function complaint_list() {

        $status = $this->input->post('status');
        $department = $this->input->post('department');
        $employee = $this->input->post('employee');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $date_type = $this->input->post('date_type');
        $customer = $this->input->post('customer');
        $contract_no = $this->input->post('contract_no');
        

        $list = $this->model->get_datatables_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no);
        $data = array();
        $no = $_POST['start'];


        foreach ($list as $log) {

	        $no++;
            
	        $row = array();
	        
	        $ticket = explode("AJTK-",$log['ticket_id']);

            $createdDate = $log['date'];
            $createdDate = date("d-m-Y", strtotime($createdDate)); 
            
            if(!empty($log['finish_date'])){
            $finishDate = $log['finish_date'];
            $finishDate = date("d-m-Y", strtotime($finishDate));
            }
            else{
            $finishDate = '';    
            }
            
            if(!empty($log['last_date'])){
            $lastDate = $log['last_date'];
            $lastDate = date("d-m-Y", strtotime($lastDate));
            }
            else{
            $lastDate = '';    
            }

	        $row[] = $ticket[1];
	        $row[] = $log['complaint'];
	        $row[] = $log['name'];
	        $row[] = $log['mobile_no'];
	        $row[] = $log['contract_no'];
	        $row[] = $log['location'];
	        $row[] = $createdDate;
	        $row[] = $lastDate;
	        $row[] = $finishDate;
	        
	        

	        $data[] = $row;
        }

        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->model->count_all_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no),
        "recordsFiltered" => $this->model->count_filtered_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no),
        "data" => $data,
        );
        //output to json format
        echo json_encode($output);

    }



    public function generate(){
        
    $status = $this->input->post('status');
    $department = $this->input->post('department');
    $employee = $this->input->post('employee');
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $date_type = $this->input->post('date_type');
    $customer = $this->input->post('customer');
    $contract_no = $this->input->post('contract_no');



if(!empty($date_type)){
    if($date_type == 1){
        
       $type  = "Date Type : Created";
    }
    
    if($date_type == 2){
        
        $type = "Date Type : Finished";
    }
}
else
{
    $type='';
}

    
    date_default_timezone_set("Asia/Kuwait");
    $today = date('Y-m-d H:i:s');
    $today = date("d-m-Y H:i:s", strtotime($today));
    
    if(!empty($department)){
    $dept_name = $this->model->getUserName($department);
    $dept_name = "Department : $dept_name";
    }
    else
    {
        $dept_name='';
    }
    if(!empty($employee)){
    $emp_name = $this->model->getUserName($employee);
    $emp_name = "Employee : $emp_name";
    }
     else
    {
        $emp_name='';
    }
    if(!empty($status)){
    
    if($status == 1){    
    $status_name =  "Status : New";   
    }
    else if($status == 2){    
    $status_name =  "Status : Pending";   
    }
    else if($status == 3){    
    $status_name =  "Status : Completed";   
    }
    }
    else
    {
        $status_name='';
    }
    
    if(!empty($customer)){
    $customer_name = $this->model->getUserName($customer);
    $customer_name = "Customer Name : $customer_name";
    } else
    {
        $customer_name='';
    }
    
    
    if(!empty($contract_no)){
    $contract_number = "Contract No : $contract_no";
    }
    else
    {
        $contract_number='';
    }
    
    if(!empty($from)){
    $from_date = date('d-m-Y', strtotime($from));
    $from_date = "From : $from_date";
    }
    else
    {
        $from_date='';
    }
    
    if(!empty($to)){
    $to_date = date('d-m-Y', strtotime($to));
    $to_date = "To : $to_date";
    }
    else
    {
        $to_date='';
    }


   if(isset($_POST['pdf'])) {
    
    
    $list = $this->model->get_datatables_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no); 

    
    $html_content = '<html>
<head>
<title> Complaints List </title>

<style>
    
    body{
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        color: #373737;
    }
    .tablea1a_1{
        border-collapse: collapse;
        
    }
    .tablea1a_1 tr td{
        border: 1px solid #dddddd;
        padding: 10px 10px 10px 10px;
    }
    .tablea1a_1 tr th{
        border: 1px solid #dddddd;
        padding: 10px 10px 10px 10px;
    }
    .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
</style>
   
</head>
<body><table class="tablea1a_1" cellpadding="5px" autosize="1" border="1" width="100%" style="overflow: wrap" >
                         
                            <thead>
                                <tr>
                                  <th style="width: 70px;font-size:8px;">Ticket(AJTK)</th>
                                  <th style="width: 70px;font-size:10px;">Complaint</th>
                                  <th style="width: 70px;font-size:10px;">Name</th>
                                  <th style="width: 70px;font-size:10px;">Mobile</th>
                                  <th style="width: 70px;font-size:10px;">Contract No</th>
                                  <th style="width: 70px;font-size:10px;">Location</th>
                                  <th style="width: 70px;font-size:10px;">Created Date</th>
                                  <th style="width: 70px;font-size:10px;">Last Date</th>
                                  <th style="width: 70px;font-size:10px;">Finished Date</th>
                                </tr>
                              </thead> 
				          <tbody>';
                                    $sno =1;
                                    foreach ($list as $course) {
                                        
                                    $ticket = explode("AJTK-",$course['ticket_id']);

                                    $createdDate = $course['date'];
                                    $createdDate = date("d-m-Y", strtotime($createdDate)); 
                                    
                                    if(!empty($course['finish_date'])){
                                    $finishDate = $course['finish_date'];
                                    $finishDate = date("d-m-Y", strtotime($finishDate));
                                    }
                                    else
                                    {
                                       $finishDate=''; 
                                    }
                                    
                                    if(!empty($course['last_date'])){
                                    $lastDate = $course['last_date'];
                                    $lastDate = date("d-m-Y", strtotime($lastDate));
                                    }
                                    else
                                    {
                                       $lastDate=''; 
                                    }

                                       
        $html_content .=        ' <tr>
                                <td style="width: 70px;font-size:10px;">'.$ticket[1].'</td>
                                <td style="width: 70px;font-size:10px;">'.$course['complaint'].'</td>
                                <td style="width: 70px;font-size:10px;">'.$course['name'].'</td>
                                <td style="width: 70px;font-size:10px;">'.$course['mobile_no'].'</td>
                                <td style="width: 70px;font-size:10px;">'.$course['contract_no'].'</td>
                                <td style="width: 70px;font-size:10px;">'.$course['location'].'</td>
                                <td style="width: 70px;font-size:10px;">'.$createdDate.'</td>;
                                <td style="width: 70px;font-size:10px;">'.$lastDate.'</td>;
                                <td style="width: 70px;font-size:10px;">'.$finishDate.'</td>;
                            </tr>';
                            $sno++;
                                    }
                                    
        $html_content .=        '
	        	</tbody>
	        </table>
</body>
</html>';

$head='<div class="clearfix" style="display: flex;margin: 0 0 15px 0;align-items: center;">
        <div style="display: flex;text-align: center;float: left;width: 100px;height: 50px;justify-content: center;align-items: center;">
        </div>
        <div style="font-size:25px;text-align:center;margin-left: 15px;">Complaints List</div></div>
        
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$dept_name.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$emp_name.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$customer_name.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$contract_number.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$status_name.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$type.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$from_date.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> '.$to_date.'</br></div>
        <div style="font-size:10px;text-align:left;margin-left: 5px;"> Generated On : '.$today.'</div>';
          
//print_r($html_content);exit;            
$pdfFilePath ="Complaints List-".time().".pdf"; 
$mpdf = new \Mpdf\Mpdf(['mode' => 'ml', 'format' => 'A4','setAutoTopMargin' => 'stretch',
    'autoMarginPadding' => 5]);   
$mpdf->simpleTables = true;
$mpdf->packTableData = true;
$mpdf->keep_table_proportions = TRUE;
$mpdf->shrink_tables_to_fit=1;
$mpdf->SetHTMLHeader($head);
//$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setFooter('Complaints List-    :::  {PAGENO} / {nb}');
$mpdf->WriteHTML($html_content);
$mpdf->Output($pdfFilePath, "D");
exit;

        // $this->pdf->loadHtml($html_content);
        // $this->pdf->render();
        // $this->pdf->stream("List.pdf", array("Attachment"=>0));
    
  
    

}

else if(isset($_POST['excel'])) {
    


  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);


  $table_columns = array("Ticket(AJTK)","Complaint", "Name", "Mobile", "Contract No", "Location", "Created Date", "Last Date", "Finished Date");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $data = $this->model->get_datatables_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no); 

  $excel_row = 3;

  foreach($data as $course)
  {
    $ticket = explode("AJTK-",$course['ticket_id']);      
    $createdDate = $course['date'];
    $createdDate = date("d-m-Y", strtotime($createdDate)); 
                                    
    if(!empty($course['finish_date'])){
      $finishDate = $course['finish_date'];
      $finishDate = date("d-m-Y", strtotime($finishDate));
    }
                                    
    if(!empty($course['last_date'])){
      $lastDate = $course['last_date'];
      $lastDate = date("d-m-Y", strtotime($lastDate));
    } 
                          
                                    
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $ticket[1]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $course['complaint']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $course['name']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $course['mobile_no']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $course['contract_no']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $course['location']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $createdDate);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $lastDate);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $finishDate );
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Complaint List.xls"');
  $object_writer->save('php://output');
 }
}   
    
}?>