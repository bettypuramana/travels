<?php

Class Team_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'team_assign';
     
   


   
    
  
 
   
    public function insert($value) { 

        if ($this->db->insert($this->table, $value)) {

            $insert_id = $this->db->insert_id();

            return  $insert_id;

        } else{

            return false;

        }


    }
   public function getJobNumberForUser($userId) {
    if (empty($userId)) {
        // Handle the case when $userId is not provided
        return array();
    }

    $this->db->select('job.id, job.job_number'); // Adjust the columns as needed
    $this->db->from('job');
    $this->db->join('team_assign', 'job.id = team_assign.job_id');
    $this->db->where('team_assign.user_id', $userId);
 $this->db->group_by('job.id');
    $query = $this->db->get();
    return $query->result_array();
}

public function getTeamsByUserId($userId) {
        // Check if $userId is not null
       if (empty($userId)) {
        // Handle the case when $userId is not provided
        return array();
    }

        $this->db->select('team.id, team.name');
        $this->db->from('team_assign');
        $this->db->join('team', 'team_assign.team = team.id');
         $this->db->where('team_assign.user_id', $userId);
 $this->db->group_by('team.id');
        $query = $this->db->get();
    return $query->result_array();
    }
   public function get_datatables($job_id='',$teamid='',$status='',$date='',$todate='') {

        $this->get_datatables_query($job_id,$teamid,$status,$date,$todate);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     private function get_datatables_query($job_id='',$teamid='',$status='',$date='',$todate='')
  {
        $this->db->select('team_assign.*, job.job_number, team.name as team_name');
    $this->db->from('team_assign');
    $this->db->join('job', 'job.id = team_assign.job_id');
    $this->db->join('team', 'team.id = team_assign.team');
    
    // Add the condition for user_id
   $this->db->where('team_assign.user_id', $this->rankfordAdminDetails->id);
  if ($this->rankfordAdminDetails->id != 1) {
        $this->db->where('team_assign.user_id', $this->rankfordAdminDetails->id);
    }
    // Add the condition for job_id if provided
    if ($job_id != '') {
        $this->db->where('team_assign.job_id', $job_id);
    }
     if ($teamid != '') {
        $this->db->where('team_assign.team', $teamid);
    }
     if ($status != '') {
        $this->db->where('team_assign.status',$status);
    }
     if ($date != '') {
         $this->db->where('team_assign.date >=', $date);
    }
     if ($todate != '') {
         $this->db->where('team_assign.date <=', $todate);
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
   public function count_all($job_id='') {
        
         $this->db->from($this->table);
        $this->db->join('job', 'job.id = team_assign.job_id');
        $this->db->where('team_assign.user_id',$this->rankfordAdminDetails->id);
         if($job_id !=''){
        $this->db->where('team_assign.job_id',$job_id);    
        }
        return $this->db->count_all_results();
    }
       public function count_filtered($job_id='') {

        $this->get_datatables_query($job_id);
   
        $query = $this->db->get();
        return $query->num_rows();
    }
     public function getJobNumber(){

        $this->db->from('job');
  
       $query = $this->db->get();
       return $query->result_array();
    
    }   public function getTeam(){

        $this->db->from('team');
  
       $query = $this->db->get();
       return $query->result_array();
    
    } 
    
    public function getTeamNames() {
   
    $this->db->select('id, name'); // Adjust columns accordingly
    $query = $this->db->get('team');

    // Return the result as an array
    return $query->result_array();
}
public function get_details($id){
		$this->db->select('*');
	
		$this->db->where('id',$id);
		$query = $this->db->get('team_assign');

		
//		return $query;
		if ( $query->num_rows() > 0 )
		{
			$rows = $query->row();
			return $rows;
		}
		return false;
	}
    
         public function getJob($id=''){
             
            $this->db->select('job.job_number');
            $this->db->from('job');
            $this->db->where('id',$id);  
            $query = $this->db->get();
      
            $data= $query->result_array();
            
            return($data);
    }
public function updateStatus($id, $status)
    {
        // Assuming 'your_table' is the table where you store your status
        $data = array('status' => $status);

        // Update the status based on the provided ID
        $this->db->where('id', $id);
        $this->db->update('team_assign', $data);

        // You can return a response if needed
        return true;
    }
    public function updateData($id,$job,$team,$date,$remarks,$status,$user_id){
        
        $data = array('team' => $team,'job_id'=>$job,'date'=>$date,'remarks'=>$remarks,'status'=>$status,'user_id'=>$user_id);

        // Update the status based on the provided ID
        $this->db->where('id', $id);
        $this->db->update('team_assign', $data);

        // You can return a response if needed
        return true;
    }

    
    }
    