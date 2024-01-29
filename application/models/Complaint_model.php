<?php

Class Complaint_model extends MY_model {

    

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    var $table = 'complaint';

    var $column_order = array('complaint.ticket_id'); //set column field database for datatable orderable

    var $column_search = array('complaint.ticket_id','complaint.complaint','users.username'); //set column field database for datatable searchable just firstname , lastname , address are searchable

    var $order = array('complaint.id' => 'desc');

 
 
    
    private function get_datatables_query_complaint($status='',$department='',$employee='',$from='',$to='',$date_type='',$customer='',$contract_no='')
    {
        $this->db->select('distinct(complaint.id),complaint.*,users.username,assign.department_id,assign.employee_id,assign.last_date');
        $this->db->from('complaint');
        $this->db->join('assign','assign.complaint_id = complaint.id');
        $this->db->join('users','users.id = complaint.user_id');
        if($date_type !=''){
        if($date_type == 1){
        if($from !=''){
        $this->db->where('complaint.date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.date <=', $to);       
        }
        }
        else if($date_type == 2){
        if($from !=''){
        $this->db->where('complaint.finish_date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.finish_date <=', $to);       
        }    
        }
        }
        if($status !=''){
        $this->db->where('complaint.status', $status);       
        }
        if($department !=''){
        $this->db->where('assign.department_id', $department);       
        }
        if($employee !=''){
        $this->db->where('assign.employee_id', $employee);       
        }
        if($customer !=''){
        $this->db->where('users.id', $customer);       
        }
        if($contract_no !=''){
        $this->db->where('complaint.contract_no', $contract_no);       
        }
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
        if(isset($_POST['search']['value'])) // if datatable send POST for search
        {
        if($i===0) // first loop
        {
        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        $this->db->like($item, isset($_POST['search']['value']));
        }
        else
        {
        $this->db->or_like($item, isset($_POST['search']['value']));
        }

        if(count($this->column_search) - 1 == $i) //last loop
        $this->db->group_end(); //close bracket
        }
        $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
        }
  }


    public function get_datatables_complaint($status='',$department='',$employee='',$from='',$to='',$date_type='',$customer='',$contract_no='') {

        $this->get_datatables_query_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no);
        if(isset($_POST['length']) != -1)
        $this->db->limit(isset($_POST['length']), isset($_POST['start']));
        $query = $this->db->get();

        return $query->result_array();
    }


    public function count_filtered_complaint($status='',$department='',$employee='',$from='',$to='',$date_type='',$customer='',$contract_no='') {

        $this->get_datatables_query_complaint($status,$department,$employee,$from,$to,$date_type,$customer,$contract_no);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_complaint($status='',$department='',$employee='',$from='',$to='',$date_type='',$customer='',$contract_no='') {

        $this->db->from('complaint');
        $this->db->join('assign','assign.complaint_id = complaint.id');
        $this->db->join('users','users.id = complaint.user_id');
        if($date_type !=''){
        if($date_type == 1){
        if($from !=''){
        $this->db->where('complaint.date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.date <=', $to);       
        }
        }
        else if($date_type == 2){
        if($from !=''){
        $this->db->where('complaint.finish_date >=', $from);       
        }
        if($to !=''){
        $this->db->where('complaint.finish_date <=', $to);       
        }    
        }
        }
        if($status !=''){
        $this->db->where('complaint.status', $status);       
        }
        if($department !=''){
        $this->db->where('assign.department_id', $department);       
        }
        if($employee !=''){
        $this->db->where('assign.employee_id', $employee);       
        }
        if($customer !=''){
        $this->db->where('users.id', $customer);       
        }
        if($contract_no !=''){
        $this->db->where('complaint.contract_no', $contract_no);       
        }
        return $this->db->count_all_results();
    }    
    

    public function get_department() {

        $this->db->select('id,username');
        $this->db->from('users');
        $this->db->where('role','department');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_employee() {

        $this->db->select('id,username');
        $this->db->from('users');
        $this->db->where('role','employee');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserName($id='') {

        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $data = $query->row();
        return $data->username;
    }


    public function get_customer() {

        $this->db->select('users.id,users.username');
        $this->db->from('users');
        $this->db->join('complaint','complaint.user_id = users.id');
        $this->db->where('role','customer');
        $this->db->group_by('users.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_contract() {

        $this->db->select('contract_no');
        $this->db->from('complaint');
        $this->db->group_by('contract_no');
        $query = $this->db->get();
        return $query->result_array();
    }
    
}?>