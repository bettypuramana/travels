<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fcm_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        //load database library
        $this->load->database();
    }
    
    

    public function update_fcm($fcm,$id) {
        
        $this->db->select('fcm');
        $this->db->from('users');
        $this->db->where('fcm',$fcm);
        $query = $this->db->get();
        $data = $query->num_rows();
        
        if($data > 0){
        
        $val = array('fcm'=>NULL);
                
        $this->db->where('fcm',$fcm);
        $this->db->update('users',$val);
            
        }
        
        
        $this->db->set('fcm',$fcm)
         ->where('id',$id)
        ->update('users');
         return true;
        
        return true;

    }

    
    
    
}?>