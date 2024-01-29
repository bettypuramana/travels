<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends MY_Auth_Controller {

    protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

	public function __construct() 
    {

	    parent::__construct();
	    $this->ci_name = strtolower($this->router->fetch_class());
	    $this->load->model('Admin/Tour_model','model');
	    $this->load->library('Image');//custom image library to crop
     //   $this->load->library('encrypt');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
    public function index(){
 
     $data['list'] = $this->model->getTourList();
      $this->load->view('admin/tours/list',$data);
       
    }
    public function create(){
        $data['regions'] = $this->model->getRegionList();
           $this->load->view('admin/tours/add',$data);
    }
   public function store(){
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
    $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('person', 'Per Person Amount', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    $this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean');
    // Adding a rule for image upload
  //  $this->form_validation->set_rules('userfile', 'Image', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) {
         $data['$regions'] = $this->model->getRegionList();
        $this->load->view('admin/tours/add',$data);
    } else {
        // Process form data
        $title = $this->input->post('title');
        $theme = $this->input->post('theme');
        $deptfrom = $this->input->post('deptfrom');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $location = $this->input->post('location');
        $phone = $this->input->post('phone');
        $person = $this->input->post('person');
        $region = $this->input->post('region');
        $description = $this->input->post('description');

        $config['upload_path'] = 'uploads/tour/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['file_name'] = $_FILES['image_file2']['name'];
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['min_width'] = '0';
        $config['min_height'] = '0';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('image_file2');
        $data = $this->upload->data();
        $file2 = $data['file_name'];       
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'title' => $title,
                'theme' => $theme,
                'departurefrom' => $deptfrom,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'location' => $location,
                'phone' => $phone,
                'person' => $person,
                'region'=>$region,
                'description' => $description,
                'image' => $file2 // Store the image file name in the database
            );

            $this->model->insert($value);

            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Admin/Tour');
        
    }
}
public function edit($id){
        $data['list'] = $this->model->getTourList($id);
        $data['regions'] = $this->model->getRegionList();
        $this->load->view('admin/tours/list_edit',$data);
    }
    public function update($id){
        
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
    $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('person', 'Per Person Amount', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    $this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean');
    
    if ($this->form_validation->run() == FALSE) {
        $data['list'] = $this->model->getTourList($id);
        $data['regions'] = $this->model->getRegionList();
        $this->load->view('admin/tours/list_edit',$data);
    } else {
        // Process form data
        $title = $this->input->post('title');
         $location = $this->input->post('location');
        $phone = $this->input->post('phone');
        $theme = $this->input->post('theme');
        $deptfrom = $this->input->post('deptfrom');
         $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $person = $this->input->post('person');
        $description = $this->input->post('description');
        $region=$this->input->post('region');
        $image = $this->input->post('old');
        if ($_FILES['image_file2']['size'] > 0){
             $config['upload_path'] = 'uploads/tour/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['file_name'] = $_FILES['image_file2']['name'];
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['min_width'] = '0';
        $config['min_height'] = '0';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('image_file2');
        $data = $this->upload->data();
        $file2 = $data['file_name'];       
        }else{
           $file2 =$image;
        }
        $value = array(
                'title' => $title,
                'location' => $location,
                'theme' => $theme,
                'departurefrom' => $deptfrom,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'phone' => $phone,
                'person' => $person,
                'region'=>$region,
                'description' => $description,
                'image' => $file2 // Store the image file name in the database
            );
            
             $this->model->update($id,$value);
             $this->session->set_flashdata('add', 'Updated Successfully');
            redirect('Admin/Tour');
    }
        
    }
  public function delete($id)  {

  
   //   $id = $this->input->post('id');
      $this->model->delete($id);
      $this->session->set_flashdata('delete', 'Deleted Successfully');
      redirect('Admin/Tour');
  
  }   

}