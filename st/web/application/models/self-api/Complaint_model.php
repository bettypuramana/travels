<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Complaint_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        //load database library
        $this->load->database();
    }

    public function get_complaint_list($role='',$user_id='',$status='',$department='',$employee='',$from='',$to='',$ticket_id='',$contract_no='',$row='') {
        
        if($status == 1){
        
        $this->db->select('distinct(complaint.id),complaint.*,users.username,assign.department_id');
        $this->db->from('complaint');
        if($ticket_id !=''){
            
            $this->db->like('ticket_id',$ticket_id);
        }
        if($role != 'admin'){
        if($role == 'department'){    
        $this->db->where('assign.department_id', $user_id);
        }
        else if($role == 'employee'){
        $this->db->where('assign.employee_id', $user_id);    
        }
        else if($role == 'customer'){
        $this->db->where('complaint.user_id', $user_id);    
        }
        }
        if($from !=''){
        $this->db->where('complaint.date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.date <=', $to);       
        }
        if($contract_no !=''){
        $this->db->like('complaint.contract_no', $contract_no);       
        }
        $this->db->join('assign','assign.complaint_id = complaint.id');
        $this->db->join('users','users.id = complaint.user_id');
        $this->db->where('complaint.status',$status);
        if($row != ''){
        $this->db->limit(20, $row);
        }
        $query = $this->db->get();

        $data = $query->result_array();
        
        $i=0;
        
        foreach($data as $val){
        
            $count = $this->getContractCount($val['contract_no']);
            
            if($count == 1){
                
               $data[$i]['contract_status'] = 0; 
                
            }
            else if($count > 1){
                
               $data[$i]['contract_status'] = 1; 
                
            }
        
            $department_remark = $this->getDepartmentRemark($val['id']);
            $employee_remark = $this->getEmployeeRemark($val['id']);
            $customer_remark = $this->getCustomerRemark($val['id']);
            $admin_remark = $this->getAdminRemark($val['id']);
            
            $dep_id = $val['department_id'];
            $department = $this->getUser($dep_id);
            $data[$i]['department'] = $department;
             
            if($admin_remark->voice !='' || $admin_remark->remark !='' || $admin_remark->video !=''){
                
               $data[$i]['admin_remark'] = $admin_remark;    
                
            }
            else{
              
               $data[$i]['admin_remark'] = NULL; 
                
            }
             if($employee_remark[0]['voice'] !='' || $employee_remark[0]['remark'] !='' || $employee_remark[0]['video'] !=''){
                
               $data[$i]['employee_remark'] = $employee_remark;   
                
            }
            else{
              
               $data[$i]['employee_remark']  = NULL; 
                
            }
             if($department_remark->voice !='' || $department_remark->remark !='' || $department_remark->video !=''){
                
                 $data[$i]['department_remark'] = $department_remark;   
                
            }
            else{
              
                 $data[$i]['department_remark']  = NULL; 
                
            }
             if($customer_remark->voice !='' || $customer_remark->remark !='' || $customer_remark->video !=''){
                
                $data[$i]['customer_remark'] = $customer_remark;  
                
            }
            else{
              
                 $data[$i]['customer_remark'] = NULL;
                
            }
            
            
          
            
            
            
            
            $data[$i]['customer'] = $this->getCustomerDetails($val['id']);
            
            
            $i++;
            
        }
        
        return $data;
        
        
        }
        else{
        
        $this->db->select('distinct(complaint.id),complaint.*,users.username,assign.department_id,assign.employee_id,assign.last_date,finish_date');
        $this->db->from('complaint');
        if($ticket_id !=''){
            
            $this->db->like('ticket_id',$ticket_id);
        }
        if($role != 'admin'){
        if($role == 'department'){    
        $this->db->where('assign.department_id', $user_id);
        }
        else if($role == 'employee'){
        $this->db->where('assign.employee_id', $user_id);    
        }
        else if($role == 'customer'){
        $this->db->where('complaint.user_id', $user_id);    
        }
        }
        if($department !=''){
        $this->db->where('assign.department_id', $department);       
        }
        if($employee !=''){
        $this->db->where('assign.employee_id', $employee);       
        }
        if($from !=''){
        $this->db->where('complaint.date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.date <=', $to);       
        }
        if($contract_no !=''){
        $this->db->like('complaint.contract_no', $contract_no);       
        }
        $this->db->join('assign','assign.complaint_id = complaint.id');
        $this->db->join('users','users.id = complaint.user_id');
        $this->db->where('complaint.status',$status);
        $this->db->group_by('complaint.id');
        if($row != ''){
        $this->db->limit(20, $row);
        }
        $query = $this->db->get();

        $data = $query->result_array();

        $i=0;
        
        foreach($data as $val){
            
            $count = $this->getContractCount($val['contract_no']);
            
            if($count == 1){
                
               $data[$i]['contract_status'] = 0; 
                
            }
            else if($count > 1){
                
               $data[$i]['contract_status'] = 1; 
                
            }
            
            $dep_id = $val['department_id'];
            $emp_id = $val['employee_id'];
            
            $department = $this->getUser($dep_id);
            $employee = $this->getUser($emp_id);
            
            $department_remark = $this->getDepartmentRemark($val['id']);
            $employee_remark = $this->getEmployeeRemark($val['id']);
            $customer_remark = $this->getCustomerRemark($val['id']);
            $admin_remark = $this->getAdminRemark($val['id']);

             if($admin_remark->voice !='' || $admin_remark->remark !='' || $admin_remark->video !=''){
                
               $data[$i]['admin_remark'] = $admin_remark;    
                
            }
            else{
              
               $data[$i]['admin_remark'] = NULL; 
                
            }
             if($employee_remark[0]['voice'] !='' || $employee_remark[0]['remark'] !='' || $employee_remark[0]['video'] !=''){
                
               $data[$i]['employee_remark'] = $employee_remark;   
                
            }
            else{
              
               $data[$i]['employee_remark']  = NULL; 
                
            }
             if($department_remark->voice !='' || $department_remark->remark !='' || $department_remark->video !=''){
                
                 $data[$i]['department_remark'] = $department_remark;   
                
            }
            else{
              
                 $data[$i]['department_remark']  = NULL; 
                
            }
             if($customer_remark->voice !='' || $customer_remark->remark !='' || $customer_remark->video !=''){
                
                $data[$i]['customer_remark'] = $customer_remark;  
                
            }
            else{
              
                 $data[$i]['customer_remark'] = NULL;
                
            }
            
            $data[$i]['employee'] = $employee;
            $data[$i]['department'] = $department;
            
            
            
            $data[$i]['customer'] = $this->getCustomerDetails($val['id']);

            
            $i++;
            
        }
        
        return $data;
        
        }
        
        
    }

    public function getCustomerDetails($id){
        
        $this->db->select('name as username,mobile_no as mobile,house_no as house_number,street_no as street_number,block_no as block_number,location,contract_no'); 
        $this->db->from('complaint');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();

    }

    public function getDepartmentRemark($id){
        
        $this->db->select('department_remark.*'); 
        $this->db->from('department_remark');
        $this->db->where('complaint_id',$id);
        $query = $this->db->get();
        return $query->row();

    }
    
    public function getEmployeeRemark($id){
        
        $this->db->select('employee_remark.*'); 
        $this->db->from('employee_remark');
        $this->db->where('complaint_id',$id);
        $query = $this->db->get();
        return $query->result_array();
        
        
        
    }
    
    public function getCustomerRemark($id){
        
        $this->db->select('customer_remark.*'); 
        $this->db->from('customer_remark');
        $this->db->where('complaint_id',$id);
        $query = $this->db->get();
        return $query->row();
        
        
        
    }
    
    public function getAdminRemark($id){
        
        $this->db->select('assign.voice,video,remark'); 
        $this->db->from('assign');
        $this->db->where('complaint_id',$id);
        $query = $this->db->get();
        return $query->row();
        
        
        
    }    
 

    public function getUser($id){
        
        $this->db->select('username'); 
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $data = $query->row();
        
        return $data->username;
        
        
        
    }

    public function insertComplaint($val) {
        
        if($this->db->insert('complaint',$val)){
            
        $insert_id = $this->db->insert_id();

        return  $insert_id;
        }
        else {
            return false;
        }
    }    

    public function updateComplaint($id,$val) {
        
        $this->db->where('id',$id);
        $this->db->update('complaint',$val);
    } 

    public function insertRemark($val) {

        if($this->db->insert('customer_remark',$val)){

            return  true;
        }
        else {
            return false;
        }
    }

    public function insertEmployeeRemark($val) {

        if($this->db->insert('employee_remark',$val)){

            return  true;
        }
        else {
            return false;
        }
    }

    public function insertDepartmentRemark($val) {

        if($this->db->insert('department_remark',$val)){

            return  true;
        }
        else {
            return false;
        }
    }

    public function assignComplaint($val,$com_id) {

        $this->db->select('id');
        $this->db->from('assign');
        $this->db->where('complaint_id',$com_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        
        if($count < 1){
        
        if($this->db->insert('assign',$val)){
            
            return true;
        }
        else {
            return false;
        }
        }
        else{
        
            $this->db->where('complaint_id',$com_id); 
            $this->db->update('assign',$val);
            
            return true;
            
        }
    }

    public function updateAssignComplaint($id,$val) {

        $this->db->where('complaint_id',$id);
        $this->db->update('assign',$val);
        
        return true;

    }

    public function getDepartmentList() {
        
        $this->db->select('users.id,email,mobile,username');
        $this->db->from('users');
        $this->db->where('role', 'department');
        $query = $this->db->get();
        return $query->result_array();
    }    

    public function getEmployeeList() {
        
        $this->db->select('users.id,email,mobile,username');
        $this->db->from('users');
        $this->db->where('role', 'employee');
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function changeStatus($val,$cmp_id) {

        $this->db->where('id',$cmp_id);
        $this->db->update('complaint',$val);
        
        return true;
    }

    public function getAssignedList($id,$status) {
        
        $this->db->select('complaint.*');
        $this->db->from('assign');
        $this->db->where('assign.department_id',$id);
        $this->db->where('complaint.status',$status);
        $this->db->join('complaint','complaint.id = assign.complaint_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tocken($id='',$type)
    {
    
    if($type == 1){
    $this->db->select('users.fcm,users.id' );
    $this->db->from('users');
    if($id != ''){
    $this->db->where('id',$id);
    $this->db->or_where('role','admin');
    }
    else{
    $this->db->where('role','admin');
    }
    $this->db->group_by('users.id'); 
    $query  = $this->db->get();
    $res=$query->result_array();
    }
    else if($type == 2){
    $this->db->select('users.fcm,users.id' );
    $this->db->from('users');
    $this->db->where('id',$id);
    $this->db->group_by('users.id'); 
    $query  = $this->db->get();
    $res=$query->result_array();    
    }

    $cat=array();
    foreach($res as $data)
      {

            $cat[]=$data['fcm'];

      }
       
      return $cat;
    }

    public function insertNotification($value) { 

        if ($this->db->insert('notifications', $value)) {

             $insert_id = $this->db->insert_id();

            return  $insert_id;

        } else{

            return false;

        }

    }

    public function getCustomerId($id='')
    {

    $this->db->select ('user_id' );
    $this->db->from ('complaint' );
    $this->db->where('id',$id); 
    $query  = $this->db->get();
    $res=$query->row();

    return $cat->user_id;
    }


    public function getComplaintDetails($id='')
    {

    
        
        
        
        $this->db->select('complaint.*');
        $this->db->from('complaint');
        $this->db->where('id',$id);
        $query = $this->db->get();

        $data = $query->row();
    
        
            $department_remark = $this->getDepartmentRemark($data->id);
            $employee_remark = $this->getEmployeeRemark($data->id);
            $customer_remark = $this->getCustomerRemark($data->id);
            $admin_remark = $this->getAdminRemark($data->id);
             
            if($admin_remark->voice !='' || $admin_remark->remark !='' || $admin_remark->video !=''){
                
               $data->admin_remark = $admin_remark;    
                
            }
            else{
              
               $data->admin_remark = NULL; 
                
            }
             if($employee_remark[0]['voice'] !='' || $employee_remark[0]['remark'] !='' || $employee_remark[0]['video'] !=''){
                
               $data->employee_remark = $employee_remark;   
                
            }
            else{
              
               $data->employee_remark  = NULL; 
                
            }
             if($department_remark->voice !='' || $department_remark->remark !='' || $department_remark->video !=''){
                
                 $data->department_remark = $department_remark;   
                
            }
            else{
              
                 $data->department_remark  = NULL; 
                
            }
             if($customer_remark->voice !='' || $customer_remark->remark !='' || $customer_remark->video !=''){
                
                $data->customer_remark = $customer_remark;  
                
            }
            else{
              
                 $data->customer_remark = NULL;
                
            }
            
            
          
            
            
            
            
            $data->customer = $this->getCustomerDetails($data->id);
            

            
        
        
        return $data;
        
        
        
        
        
    
    }
    
    
    public function getNotificationList($user_id,$role)
    {

    $this->db->select ('id,complaint_id,title,message,date');
    $this->db->from ('notifications');
    if($role == 'department'){
        
    $this->db->where('department_id',$user_id);  
    
    }
    else if($role == 'employee'){
    
    $this->db->where('employee_id',$user_id);
         
    }
    else if($role == 'customer'){
    
    $this->db->where('customer_id',$user_id);
        
    }
    $this->db->order_by('id','DESC');
    $query  = $this->db->get();
    return $query->result_array();
    }    
    
    
    public function getId($com_id)
    {

    $this->db->select ('department_id,employee_id');
    $this->db->from ('assign');
    $this->db->where('complaint_id',$com_id);  
    $query  = $this->db->get();
    return $query->row();
    }    

    public function getCustId($com_id)
    {

    $this->db->select ('user_id');
    $this->db->from ('complaint');
    $this->db->where('id',$com_id);  
    $query  = $this->db->get();
    return $query->row();
    }    
    
    public function deleteComplaint($id){
        
    $this->db->where('id',$id);
    $this->db->delete('complaint');
    
    $this->db->where('complaint_id',$id);
    $this->db->delete('assign');
    
    $this->db->where('complaint_id',$id);
    $this->db->delete('customer_remark');
    
    $this->db->where('complaint_id',$id);
    $this->db->delete('department_remark');
    
    $this->db->where('complaint_id',$id);
    $this->db->delete('employee_remark');
    
    
    return true;

    }    


    public function get_repeat_list($contract_no,$row1)
    {

    $this->db->select ('complaint.*,assign.last_date,users.username,department_id,employee_id');
    $this->db->from ('complaint');
    $this->db->where('contract_no',$contract_no);  
    $this->db->join('users','users.id = complaint.user_id'); 
    $this->db->join('assign','assign.complaint_id = complaint.id');
    if($row != ''){
      $this->db->limit(20,$row1);
    }
    $query  = $this->db->get();
    $data = $query->result_array();
    
    $i = 0;
    
    foreach($data as $val){
        
        $dep_id = $val['department_id'];
        $emp_id = $val['employee_id'];
            
        $department = $this->getUser($dep_id);
        $employee = $this->getUser($emp_id);  
        
        $data[$i]['employee'] = $employee;
        $data[$i]['department'] = $department;
        
    $i++;    
    }
    
    return $data;
    }    
    
    public function getContractCount($contract_no)
    {

    $this->db->select ('complaint.id');
    $this->db->from ('complaint');
    $this->db->where('contract_no',$contract_no);  
    $query  = $this->db->get();
    $data = $query->num_rows();
    return $data;
    
    }
    
    
}?>