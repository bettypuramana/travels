<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Auth_Controller {

    protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

	public function __construct() 
    {

	    parent::__construct();
	    $this->ci_name = strtolower($this->router->fetch_class());
	    $this->load->model('Admin/Booking_model','model');
	    $this->load->library('Image');//custom image library to crop
     //   $this->load->library('encrypt');

	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
    
    
    public function index(){
 
      $data['list'] = $this->model->getBookingList();
       $this->load->view('admin/booking/list',$data);
       
    }
     public function fetchDetails() {
        $tourId = $this->input->post('tourId');

        if (!empty($tourId)) {
           
            $details = $this->model->getDetailsById($tourId);
            echo json_encode($details);
        } else {
          
            echo json_encode(array());
        }
    }
    public function create(){
          $data['packagetitle'] = $this->model->getPackageTitle();
           $this->load->view('admin/booking/add',$data);
    }
   public function saveBooking() {
       $bookingCode = $this->generateRandomBookingCode();
        $data = array(
            'bookingCode' => $bookingCode,
            'customerName' => $this->input->post('customerName'),
            'customerPhone' => $this->input->post('customerPhone'),
            'customerEmail' => $this->input->post('customerEmail'),
            'packagetitle' => $this->input->post('packagetitle'),
            'adult' => $this->input->post('adult'),
            'child' => $this->input->post('child'),
            'perPersonAmount' => $this->input->post('perPersonAmount'),
            'totalAmount' => $this->input->post('totalAmount')
        );

       
        $booking_id = $this->model->saveBooking($data);

        if ($booking_id) {
            
            echo json_encode(array('status' => 'success', 'booking_id' => $booking_id));
        } else {
           
            echo json_encode(array('status' => 'error', 'message' => 'Failed to save booking.'));
        }
    }
    
    private function generateRandomBookingCode($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}
public function edit($id){
    
        $data['list'] = $this->model->getBookingView($id);
        $this->load->view('admin/booking/view',$data);
    }
   
  public function delete($id)  {

  
   //   $id = $this->input->post('id');
      $this->model->delete($id);
      $this->session->set_flashdata('delete', 'Deleted Successfully');
      redirect('Admin/Tour');
  
  }   

}