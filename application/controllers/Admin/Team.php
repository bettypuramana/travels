<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Auth_Controller {

	public function __construct() 
    {

	    parent::__construct();
	    $this->load->model('Admin/Team_model','model');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
    public function index(){
 
     $data['list'] = $this->model->getTeamList();
      $this->load->view('admin/team/view',$data);
       
    }
    public function create() {
      
        $this->load->view('admin/team/add');
    }
     public function store() {
    // Form validation rules
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
 if ($this->form_validation->run() == FALSE) {
        // Validation failed, load the view with errors
        $data['name_error'] = form_error('name', '<p class="help-block error-info">', '</p>');
        $data['description_error'] = form_error('description', '<p class="help-block error-info">', '</p>');

      
        $this->load->view('admin/team/add', $data);
    } else {
        // Validation passed, insert data into the database
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
           
        );

        $this->model->insert_team($data); 

        // Redirect to a success page or perform other actions
      redirect('Admin/Team/index');

    }
}
public function edit() {

    $id = $this->uri->segment(4);
   
    $data['edit']=$this->model->getTeamList($id);

    $this->load->view('admin/team/edit',$data); 
  }
   
  public function update() {
    $id = $this->input->post('id');
    
    // Form validation rules
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Validation failed, load the view with errors
        $data['edit'] = $this->model->getTeamList($id); // Get the existing data for the view
        $data['name_error'] = form_error('name', '<p class="help-block error-info">', '</p>');
        $data['description_error'] = form_error('description', '<p class="help-block error-info">', '</p>');

        $this->load->view('admin/team/edit', $data);
    } else {
        // Validation passed, update the team data
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            // Add other fields as needed
        );

        $this->model->updateTeam($id, $data);

        // Redirect to a success page or wherever you need to go after the update
        redirect('Admin/Team/index');
    }
}
public function deleteTeam($id) {
   
    $this->model->deleteTeam($id);

    redirect('Admin/Team/index');
}


}