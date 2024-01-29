<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        //load database library
        $this->load->database();
    }

    public function loginWithCredentials($email) {
        $this->db->select('username,email,role,id,password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function change_password($id,$password,$new_password) {
        
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        $data = $query->row();
        
        if(!empty($data)){
        
        $pass = array('password'=>md5($new_password));
            
        $this->db->where('id', $id);
        $this->db->update('users', $pass); 
            
        return 1;    
        }
        else{
            
            return 2;
        }
        
    }
    
    
    public function insertUser($value,$mobile)  //add new user
    {
        
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('mobile',$mobile);
        $query = $this->db->get();
        $data = $query->num_rows();
        
        if($data < 1){

    	$this->db->insert('users', $value);
    	$insert_id = $this->db->insert_id();
    	
    	$this->db->select('username,email,role,id,password');
        $this->db->from('users');
        $this->db->where('id', $insert_id);
        $query = $this->db->get();
        return $query->row();
    	
        }
        else{
            
        $status = 0; 
        return $status;
            
        }
        
        
    }    
    
    
}
?>