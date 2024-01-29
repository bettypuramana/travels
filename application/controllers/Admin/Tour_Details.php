<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_Details extends MY_Auth_Controller {

    protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

	public function __construct() 
    {

	    parent::__construct();
	    $this->ci_name = strtolower($this->router->fetch_class());
	    $this->load->model('Admin/TourDetails_model','model');
	    $this->load->library('Image');//custom image library to crop
     //   $this->load->library('encrypt');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
    public function index(){
 
     $data['list'] = $this->model->getTourListByType('itinerary');
      $this->load->view('admin/tour_details/list',$data);
       
    }
    public function create(){
          $data['packagetitle'] = $this->model->getPackageTitle();
           $this->load->view('admin/tour_details/add',$data);
    }
   public function store(){
     $this->form_validation->set_rules('packagetitle', 'Package Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('day', 'day', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    // Adding a rule for image upload
  //  $this->form_validation->set_rules('userfile', 'Image', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) {
       $data['packagetitle'] = $this->model->getPackageTitle();
       $this->load->view('admin/tour_details/add',$data);
    } else {
        // Process form data
        $optionsString='';
        $tourid = $this->input->post('packagetitle');
        $title = $this->input->post('title');
        $day = $this->input->post('day');
        $description = $this->input->post('description');
        if(isset($_POST['options'])) {
            $selectedOptions = $_POST['options'];
            $optionsString = implode(", ", $selectedOptions);
        }
        $config['upload_path'] = 'uploads/tour_details/';
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
                'tour_ref_id' => $tourid,
                'title' => $title,
                'day' => $day,
                'options' => $optionsString,
                'description' => $description,
                'type'=>'itinerary',
                'image' => $file2 // Store the image file name in the database
            );

            $this->model->insert($value);

            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Admin/Tour_Details');
        
    }
}
public function edit($id){
       $data['packagetitle'] = $this->model->getPackageTitle();
        $data['list'] = $this->model->getTourList($id);
        $this->load->view('admin/tour_details/list_edit',$data);
    }
    public function update($id){
        
       $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('day', 'day', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $data['list'] = $this->model->getTourList($id);
        $data['packagetitle'] = $this->model->getPackageTitle();
        $this->load->view('admin/tour_details/list_edit',$data);
    } else {
         $optionsString='';
        $tourid = $this->input->post('packagetitle');
        $title = $this->input->post('title');
        $day = $this->input->post('day');
        $description = $this->input->post('description');
        if(isset($_POST['options'])) {
            $selectedOptions = $_POST['options'];
            $optionsString = implode(", ", $selectedOptions);
        }
       $image = $this->input->post('old');
        if ($_FILES['image_file2']['size'] > 0){
             $config['upload_path'] = 'uploads/tour_details/';
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
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                'title' => $title,
                'day' => $day,
                'options' => $optionsString,
                'description' => $description,
                'type'=>'itinerary',
                'image' => $file2 // Store the image file name in the database
            );
             $this->model->update($id,$value);
             $this->session->set_flashdata('add', 'Updated Successfully');
            redirect('Admin/Tour_Details');
    }
        
    }
  public function delete($id)  {

  
   //   $id = $this->input->post('id');
      $this->model->delete($id);
      $this->session->set_flashdata('delete', 'Deleted Successfully');
      redirect('Admin/Tour_Details');
  
  }   
  
  
  
  
  
  public function tour_details(){
 
     $data['list'] = $this->model->getTourListByType('tour_detail');
      $this->load->view('admin/tour_details/tour_detail_list',$data);
       
    }
     public function tour_details_create(){
          $data['packagetitle'] = $this->model->getPackageTitle();
           $this->load->view('admin/tour_details/tour_details_add',$data);
    }
    public function store_tour_details(){
     $this->form_validation->set_rules('packagetitle', 'Package Title', 'trim|required|xss_clean');
   
    $this->form_validation->set_rules('tour_detail', 'Description', 'trim|required|xss_clean');
    // Adding a rule for image upload
  //  $this->form_validation->set_rules('userfile', 'Image', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) {
       $data['packagetitle'] = $this->model->getPackageTitle();
       $this->load->view('admin/tour_details/tour_details_add',$data);
    } else {
        // Process form data
        $optionsString='';
        $tourid = $this->input->post('packagetitle');
       
        $tour_detail = $this->input->post('tour_detail');
       
           
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                'type'=>'tour_detail',
                'description' => $tour_detail,
                
            );

            $this->model->insert($value);

            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Admin/Tour_Details/tour_details');
        
    }
    }
     public function tour_detail_delete($id)  {
    
      
       //   $id = $this->input->post('id');
          $this->model->delete($id);
          $this->session->set_flashdata('delete', 'Deleted Successfully');
          redirect('Admin/Tour_Details/tour_details'); 
      
      } 
      public function tour_detail_edit($id){
       $data['packagetitle'] = $this->model->getPackageTitle();
        $data['list'] = $this->model->getTourList($id);
        $this->load->view('admin/tour_details/tour_detail_edit',$data);
    }
    public function update_tour_details($id){
        
       
    $this->form_validation->set_rules('tour_detail', 'Description', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $data['list'] = $this->model->getTourList($id);
        $data['packagetitle'] = $this->model->getPackageTitle();
        $this->load->view('admin/tour_details/tour_detail_edit',$data);
    } else {
         
        $tourid = $this->input->post('packagetitle');
        
        $description = $this->input->post('tour_detail');
        
      
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                
                'description' => $description,
            
                
            );
             $this->model->update($id,$value);
             $this->session->set_flashdata('add', 'Updated Successfully');
            redirect('Admin/Tour_Details/tour_details');
    }
        
    }
    
    
    
    
    public function tour_inclusion(){
 
     $data['list'] = $this->model->getTourListByType('inclusion');
      $this->load->view('admin/tour_details/tour_inclusion_list',$data);
       
    }
    public function tour_inclusion_create(){
          $data['packagetitle'] = $this->model->getPackageTitle();
           $this->load->view('admin/tour_details/tour_inclusion_add',$data);
    }
   public function store_tour_inclusion(){
     $this->form_validation->set_rules('packagetitle', 'Package Title', 'trim|required|xss_clean');
     $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('day', 'day', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    // Adding a rule for image upload
  //  $this->form_validation->set_rules('userfile', 'Image', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) {
       $data['packagetitle'] = $this->model->getPackageTitle();
       $this->load->view('admin/tour_details/tour_inclusion_add',$data);
    } else {
        // Process form data
        $optionsString='';
        $tourid = $this->input->post('packagetitle');
        $category = $this->input->post('category');
        $title = $this->input->post('title');
        $day = $this->input->post('day');
        $description = $this->input->post('description');
        if(isset($_POST['options'])) {
            $selectedOptions = $_POST['options'];
            $optionsString = implode(", ", $selectedOptions);
        }
        $config['upload_path'] = 'uploads/tour_details/';
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
                'tour_ref_id' => $tourid,
                'inclusion_categorey' => $category,
                'title' => $title,
                'day' => $day,
                'options' => $optionsString,
                'description' => $description,
                'type'=>'inclusion',
                'image' => $file2 // Store the image file name in the database
            );

            $this->model->insert($value);

            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Admin/Tour_Details/tour_inclusion');
        
    }
}
public function tour_inclusion_edit($id){
       $data['packagetitle'] = $this->model->getPackageTitle();
        $data['list'] = $this->model->getTourList($id);
        $this->load->view('admin/tour_details/tour_inclusion_edit',$data);
    }
    public function update_tour_inclusion($id){
        
       $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
       $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
    $this->form_validation->set_rules('day', 'day', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $data['list'] = $this->model->getTourList($id);
        $data['packagetitle'] = $this->model->getPackageTitle();
        $this->load->view('admin/tour_details/tour_inclusion_edit',$data);
    } else {
         $optionsString='';
        $tourid = $this->input->post('packagetitle');
         $category = $this->input->post('category');
        $title = $this->input->post('title');
        $day = $this->input->post('day');
        $description = $this->input->post('description');
        if(isset($_POST['options'])) {
            $selectedOptions = $_POST['options'];
            $optionsString = implode(", ", $selectedOptions);
        }
       $image = $this->input->post('old');
        if ($_FILES['image_file2']['size'] > 0){
             $config['upload_path'] = 'uploads/tour_details/';
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
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                'inclusion_categorey' => $category,
                'title' => $title,
                'day' => $day,
                'options' => $optionsString,
                'description' => $description,
                'type'=>'inclusion',
                'image' => $file2 // Store the image file name in the database
            );
             $this->model->update($id,$value);
             $this->session->set_flashdata('add', 'Updated Successfully');
            redirect('Admin/Tour_Details/tour_inclusion');
    }
        
    }
  public function tour_inclusion_delete($id)  {

  
   //   $id = $this->input->post('id');
      $this->model->delete($id);
      $this->session->set_flashdata('delete', 'Deleted Successfully');
      redirect('Admin/Tour_Details/tour_inclusion');
  
  }
  
  
  
  
  public function tour_additional_info(){
 
     $data['list'] = $this->model->getTourListByType('additional_info');
      $this->load->view('admin/tour_details/additional_info_list',$data);
       
    }
     public function tour_additional_info_create(){
          $data['packagetitle'] = $this->model->getPackageTitle();
           $this->load->view('admin/tour_details/additional_info_add',$data);
    }
    public function store_additional_info(){
     $this->form_validation->set_rules('packagetitle', 'Package Title', 'trim|required|xss_clean');
   
    $this->form_validation->set_rules('tour_detail', 'Description', 'trim|required|xss_clean');
    // Adding a rule for image upload
  //  $this->form_validation->set_rules('userfile', 'Image', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) {
       $data['packagetitle'] = $this->model->getPackageTitle();
       $this->load->view('admin/tour_details/additional_info_add',$data);
    } else {
        // Process form data
        $optionsString='';
        $tourid = $this->input->post('packagetitle');
       
        $tour_detail = $this->input->post('tour_detail');
       
           
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                'type'=>'additional_info',
                'description' => $tour_detail,
                
            );

            $this->model->insert($value);

            $this->session->set_flashdata('add', 'Added Successfully');
            redirect('Admin/Tour_Details/tour_additional_info');
        
    }
    }
     public function additional_info_delete($id)  {
    
      
       //   $id = $this->input->post('id');
          $this->model->delete($id);
          $this->session->set_flashdata('delete', 'Deleted Successfully');
          redirect('Admin/Tour_Details/tour_additional_info'); 
      
      } 
      public function tour_additional_info_edit($id){
       $data['packagetitle'] = $this->model->getPackageTitle();
        $data['list'] = $this->model->getTourList($id);
        $this->load->view('admin/tour_details/additional_info_edit',$data);
    } 
    public function update_additional_info($id){
        
       
    $this->form_validation->set_rules('tour_detail', 'Description', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $data['list'] = $this->model->getTourList($id);
        $data['packagetitle'] = $this->model->getPackageTitle();
        $this->load->view('admin/tour_details/additional_info_edit',$data);
    } else {
         
        $tourid = $this->input->post('packagetitle');
        
        $description = $this->input->post('tour_detail');
        
      
       
          /* 	$this->image->imageCropAdd();//call custom image library
	    	$image= $this->image->crop_image_name; */   

            // Now you can use $uploaded_file as the image file name to store in the database or perform other operations
            // Insert the data into your model
            $value = array(
                'tour_ref_id' => $tourid,
                
                'description' => $description,
            
                
            );
             $this->model->update($id,$value);
             $this->session->set_flashdata('add', 'Updated Successfully');
            redirect('Admin/Tour_Details/tour_additional_info');
    }
        
    }

}