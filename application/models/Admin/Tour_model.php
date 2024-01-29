<?php

Class Tour_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'tours';

   

    

 public function getTourList($id = null) {
    $this->db->select('*');
    $this->db->from($this->table);

    // Check if $id is provided
    if ($id !== null) {
        $this->db->where('tour_id', $id);
    }

    $this->db->order_by('tour_id', 'DESC');

    // Use result() to get the actual records
    $result = $this->db->get()->result();

    // Return the first result if an ID is provided, otherwise return all results
    return ($id !== null) ? $result[0] : $result;
}

public function update($id, $data) {

        $this->db->where('tour_id', $id);
        $this->db->update($this->table, $data);
    }
    
    public function insert($data) {
        $this->db->insert('tours', $data);
        return $this->db->insert_id(); // Return the inserted team's ID if needed
    }
    public function delete($id) //delete table(update status to '0')
    {
    	$this->db->where('tour_id',$id);
    	$this->db->delete($this->table);
        return true;
    }
public function getRegionList() {
    $this->db->select('*');
    $this->db->from('region');

    $this->db->order_by('region_id', 'ASC');

    // Use result() to get the actual records
    $query = $this->db->get();
    $result = $query->result();

    // Return the result array
    return $result;
  //  echo $this->db->last_query();exit;
}
  
    }
    