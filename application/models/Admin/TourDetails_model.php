<?php

Class TourDetails_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'tour_details';

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
public function getPackageTitle($id = null) {
    // Specify the columns you want to select
    $this->db->select('tour_id, title');

    $this->db->from('tours');

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
        $this->db->insert('tour_details', $data);
        return $this->db->insert_id(); // Return the inserted team's ID if needed
    }
    public function delete($id) //delete table(update status to '0')
    {
    	$this->db->where('tour_id',$id);
    	$this->db->delete($this->table);
        return true;
    }
    public function getTourListByType($type = null) {
    $this->db->select('tour_details.*, tours.title as package_name');
    $this->db->from('tour_details');
    $this->db->join('tours', 'tour_details.tour_ref_id = tours.tour_id', 'left');

    if ($type !== null) {
        $this->db->where('tour_details.type', $type);
    }

    $this->db->order_by('tour_details.tour_id', 'DESC');

    // Use result() to get the actual records
    $result = $this->db->get()->result();

    // Return the first result if an ID is provided, otherwise return all results
    return ($result) ? $result : false;
}

  
    }
    