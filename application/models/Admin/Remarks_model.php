<?php

Class Remarks_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'job_remarks';
     
   

    
       var $column_order = array('id',null,null); //set column field database for datatable orderable

    var $column_search = array('job_remarks.id','job_remarks.job_id','job.job_number'); //set column field database for datatable searchable just firstname , lastname , address are searchable

    var $order = array('id' => 'desc');
    
 

    public function count_all($job_id='') {
        
         $this->db->from($this->table);
        $this->db->join('job', 'job.id = job_remarks.job_id');
          $this->db->join('users', 'users.id = job_remarks.user_id');
        // $this->db->where('job_remarks.user_id',$this->rankfordAdminDetails->id);
         if($job_id !=''){
        $this->db->where('job_remarks.job_id',$job_id);    
        }
        return $this->db->count_all_results();
    }
    
      private function get_datatables_query($job_id='')
  {
        $this->db->select('job_remarks.*,job.job_number','users.username');
        $this->db->from($this->table);
       $this->db->join('job', 'job.id = job_remarks.job_id');
         $this->db->join('users', 'users.id = job_remarks.user_id');
        // $this->db->where('job_remarks.user_id',$this->rankfordAdminDetails->id);
         if($job_id !=''){
          $this->db->where('job_remarks.job_id',$job_id);  
        }
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
  
       public function count_filtered($job_id='') {

        $this->get_datatables_query($job_id);
   
        $query = $this->db->get();
        return $query->num_rows();
    }
       public function get_datatables($job_id='') {

        $this->get_datatables_query($job_id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
   
    public function insert($value) { 

        if ($this->db->insert($this->table, $value)) {

            $insert_id = $this->db->insert_id();

            return  $insert_id;

        } else{

            return false;

        }


    }
    
     public function getJobNumber(){

        $this->db->from('job');
  
       $query = $this->db->get();
       return $query->result_array();
    
    } 
    
         public function getJob($id=''){
             
            $this->db->select('job.job_number');
            $this->db->from('job');
            $this->db->where('id',$id);  
            $query = $this->db->get();
      
            $data= $query->result_array();
            
            return($data);
    }
    
     public function getUser($id=''){
             
            $this->db->select('users.username');
            $this->db->from('users');
            $this->db->where('id',$id);  
            $query = $this->db->get();
      
            $data= $query->result_array();
            
            return($data);
    }
    
    
    
    //  public function getHistory($job_id =''){
    //       $this->db->from('job_remarks');
    //       $this->db->where('user_id',$this->rankfordAdminDetails->id);
    //       $this->db->where('job_number',100);
    //   $query = $this->db->get();
    //   $data=$query->result_array();
    //   print_r($data);
    //   exit();
    //  }

    
    }
    