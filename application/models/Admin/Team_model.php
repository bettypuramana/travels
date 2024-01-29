<?php

Class Team_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'team';
     
   

    

 public function getTeamList($id = null) {
    $this->db->select('*');
    $this->db->from($this->table);

    // Check if $id is provided
    if ($id !== null) {
        $this->db->where('id', $id);
    }

    $this->db->order_by('id', 'DESC');

    // Use result() to get the actual records
    $result = $this->db->get()->result();

    // Return the first result if an ID is provided, otherwise return all results
    return ($id !== null) ? $result[0] : $result;
}

public function updateTeam($id, $data) {

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    public function insert_team($data) {
        $this->db->insert('team', $data);
        return $this->db->insert_id(); // Return the inserted team's ID if needed
    }
  public function deleteTeam($id) {
    // Assuming 'id' is the primary key column in your table
    $this->db->where('id', $id);
    $this->db->delete('team'); // Replace with your actual table name
}
  
    }
    