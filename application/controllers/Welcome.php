<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Auth_Controller {

	public function __construct() 
    {

	    parent::__construct();
	    $this->load->model('Welcome_model','model');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{   
        if($this->rankfordAdminDetails->role == 'admin'){
		$this->load->view('index');
        }
        else if($this->rankfordAdminDetails->role == 'user'){
        $this->load->view('index_user');    
        }

    }


	public function index1()
	{   

		$this->load->helper('url');
		$this->load->view('institute_dash');
	
}

    public function explist() {

    	$this->load->view('institute/exp_list/list');
    }

    public function list() {

        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $course) {

	        $no++;

	        $row = array();

	        $row[] = $no;
	        $row[] = $course['user_name'];
	        $row[] = $course['exp_date'];

	        $data[] = $row;
        }

        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->model->count_all(),
        "recordsFiltered" => $this->model->count_filtered(),
        "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function payment() {
        
        $this->load->view('payment_page');
        if (isset($_POST['success'])) 
        {

        $id = $_POST['id']; 

        $exp_date = $_POST['date']; 

            $value = array('exp_date'=>$exp_date);
            $this->model->updateStudentData($id,$value);             

    	redirect('Welcome');
        }
    }



}