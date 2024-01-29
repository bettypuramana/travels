<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Auth_Controller {

	public function __construct() 
    {

	    parent::__construct();
	    $this->load->model('Home_model','model');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }



	public function index()
	{   
        
        $this->load->view('home/index');    
        

    }


	

    



}