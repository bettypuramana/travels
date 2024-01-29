<?php

Class Welcome_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }



    public function getQuestion($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
    $this->db->where('user_id',$id);
    }
    $this->db->from('question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }
    
        public function getPq($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
     $this->db->where('user_id',$id);
    }
    $this->db->from('pq_question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }

        public function getRejq($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
    $this->db->where('user_id',$id);
    }
    $this->db->where('status',2);
    $this->db->from('question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }
    
            public function getRejpq($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
    $this->db->where('user_id',$id);
    }
    $this->db->where('status',2);
    $this->db->from('pq_question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }
    
            public function getapvq($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
    $this->db->where('user_id',$id);
    }
    $this->db->where('status',1);
    $this->db->from('question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }
    
            public function getapvpq($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
    $this->db->where('user_id',$id);
    }
    $this->db->where('status',1);
    $this->db->from('pq_question');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }

        public function getScert($id='')
    {
         
    $this->db->select('id');
    if($id != ''){
     $this->db->where('user_id',$id);
    }
    $this->db->from('scert');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }    

        public function getInstitute()
    {
         
    $this->db->select('id');
    $this->db->from('institute');

    $query = $this->db->get();


    
        return $query->result_array();
    
    } 

        public function getStudents()
    {
         
    $this->db->select('id');
    $this->db->from('students_status');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }

        public function getActiveStudents()
    {
         
    $this->db->select('id');
    $this->db->from('students_status');
    $this->db->where('payment_status',1);
    $query = $this->db->get();


    
        return $query->result_array();
    
    }

        public function getDeactiveStudents()
    {
         
    $this->db->select('id');
    $this->db->from('students_status');
    $this->db->where('payment_status',0);
    $query = $this->db->get();


    
        return $query->result_array();
    
    }

        public function getTask()
    {
         
    $this->db->select('institute_user_task.task');
    $this->db->where('user_id',$this->rankfordAdminDetails->id);
    $this->db->from('institute_user_task');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }  

        public function getInstituteData()
    {
       
    $date = date('Y-m-d'); 
    
    $last_date = date('Y-m-d', strtotime("+5 days"));
         
    $this->db->select('name,exp_date');
    $this->db->from('institute');
    $this->db->where('exp_date <=',$last_date);
    $this->db->where('exp_date >=',$date);
    $this->db->or_where('exp_date <=',$date);
    $this->db->order_by('exp_date','ASC');
    $query = $this->db->get();


    
        return $query->result_array();
    
    }  

    var $column_order = array('user_registration.id','user_registration.user_name',null); //set column field database for datatable orderable

    var $column_search = array('user_registration.id','user_registration.user_name'); //set column field database for datatable searchable just firstname , lastname , address are searchable

    var $order = array('students_status.exp_date' => 'ASC');


  private function get_datatables_query()
  {
    $date = date('Y-m-d'); 
    
    $last_date = date('Y-m-d', strtotime("+5 days"));
         
    $this->db->select('user_registration.user_name,students_status.exp_date');
    $this->db->from('user_registration');
    $this->db->where('exp_date <=',$last_date);
    $this->db->where('exp_date >=',$date);
    $this->db->where('students_status.institute_id',$this->rankfordAdminDetails->id);
    $this->db->join('students_status','user_registration.id = students_status.student_id');
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
        if($_POST['search']['value']) // if datatable send POST for search
        {
        if($i===0) // first loop
        {
        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
        $this->db->or_like($item, $_POST['search']['value']);
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


    public function get_datatables() {

        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function count_filtered() {

        $this->get_datatables_query();
        //$this->db->where('parent_id',0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {

        $date = date('Y-m-d'); 
    
    $last_date = date('Y-m-d', strtotime("+5 days"));
         
    $this->db->select('user_registration.user_name,students_status.exp_date');
    $this->db->from('user_registration');
    $this->db->where('exp_date <=',$last_date);
    $this->db->where('exp_date >=',$date);
    $this->db->where('students_status.institute_id',$this->rankfordAdminDetails->id);
    $this->db->join('students_status','user_registration.id = students_status.student_id');
        return $this->db->count_all_results();
    }



        public function getStudentData()
    {
       
    $date = date('Y-m-d'); 
    
    $last_date = date('Y-m-d', strtotime("+5 days"));
         
    $this->db->select('user_registration.id,user_registration.user_name,user_registration.phone,students_status.exp_date');
    $this->db->from('user_registration');
    $this->db->where('exp_date <=',$last_date);
    $this->db->where('exp_date >=',$date);
    $this->db->where('students_status.institute_id',$this->rankfordAdminDetails->id);
    $this->db->join('students_status','user_registration.id = students_status.student_id');
    $this->db->limit(5);
    $this->db->order_by('exp_date','ASC');

    $query = $this->db->get();


    
        return $query->result_array();
    
    }
    
  public function updateStudentData($id='',$value){


    $this->db->where('student_id',$id);
    $this->db->update('students_status',$value);

  }    
    
}     