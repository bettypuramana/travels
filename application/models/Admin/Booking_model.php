<?php

Class Booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
     var $table = 'bookings';
     
   

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
 public function getDetailsById($tourId) {
        
        $this->db->select('*');
        $this->db->from('tours');
        $this->db->where('tour_id', $tourId);
        $query = $this->db->get();

        return $query->row_array();
    }
    public function saveBooking($data) {
      
        $this->db->insert('bookings', $data);

        return $this->db->insert_id();
    }
    public function getBookingList($id = null) {
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
public function getBookingView($bookingId) {
        $this->db->select('*');
        $this->db->from('bookings');
        $this->db->join('tours', 'bookings.packagetitle = tours.tour_id');
        $this->db->where('bookings.id', $bookingId);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function delete($id) //delete table(update status to '0')
    {
    	$this->db->where('id',$id);
    	$this->db->delete($this->table);
        return true;
    }
 /*********************************/   

 

   
  
    }
    