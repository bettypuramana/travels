<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

    public function __construct() 
    {
	    parent::__construct();
	    $this->ci_name = strtolower($this->router->fetch_class());
	    $this->load->model('Account_model','model');
	    
        if (!$this->is_logged_in()) //login only registered user from db
        { 
            redirect(CUSTOM_BASE_URL.'login');
        }
	   
    }
  
    public function index() {
        
        $data['main_category'] = $this->model->getMainCategorys();

        //$data['cat_list'] = $this->model->getSubCategoryData();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['result'] = $this->model->getProfileData($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $this->load->view('my-profile',$data);

    }

     public function profile_update() {

        $username   =$_POST['user_name'];

        $email   =$_POST['email'];

        $value = array('user_name' => $username , 'email' => $email );

        $res = $this->model->updateProfile($this->userDetails->id,$value);

        redirect(CUSTOM_BASE_URL.'account');
        
    }


    public function order() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getMyorderData($this->userDetails->id);
        
        $data['profile'] = $this->model->getSelfProfileData($this->userDetails->id);

        $this->load->view('my-order',$data);
    }

    public function product_rating() {

        $rate   =$_POST['rate'];

        $message   =$_POST['message'];

        $stock_id   =$_POST['stock_id'];

        $value = array('rating_score' => $rate , 'review' => $message,'stock_id' => $stock_id,'user_id' => $this->userDetails->id );

        $res = $this->model->insertRatingData($this->userDetails->id,$value);

        redirect(CUSTOM_BASE_URL.'my-order');
        
    }


    public function wish_list() {
        
        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getWishListData($this->userDetails->id);
        
        $data['profile'] = $this->model->getSelfProfileData($this->userDetails->id);

        $this->load->view('my-wishlist',$data);

        
    }

    public function notification() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getNotificationData($this->userDetails->id);
        
        $data['profile'] = $this->model->getSelfProfileData($this->userDetails->id);

        $this->load->view('notifications',$data);

        
    }

    public function manage_address() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getDeliveryAddressData($this->userDetails->id);
        
        $data['profile'] = $this->model->getSelfProfileData($this->userDetails->id);

        $this->load->view('manage-address',$data);
    }

    public function delivery_address_add() {

        $name   =$_POST['name'];
        $mobile   =$_POST['mobile'];
        $alter_phone   =$_POST['alter_phone'];
        $address   =$_POST['address'];
        $land_mark   =$_POST['land_mark'];
        $pincode   =$_POST['pincode'];


        $value = array('name' => $name , 'pincode' => $pincode, 'address' => $address, 'land_mark' => $land_mark, 'phone' => $mobile, 'alter_phone' => $alter_phone, 'user_id' => $this->userDetails->id );

        $res = $this->model->insertDeliveryAddress($value);

        redirect(CUSTOM_BASE_URL.'manage-address');
    }

    public function view_cart() {
        
        $data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();
        
        $data['list'] = $this->model->getOfferCategory();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        //$data['result'] = $this->model->getCartProductUserWise($this->userDetails->id);
        
        $data['result'] = $this->model->getAllCartDataByUser($this->userDetails->id);
        
        $this->load->view('cart',$data);
    }

    public function add_to_cart() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $id = $this->uri->segment(2);
        
        $qty = 1;

        $this->model->insertAddToCart($this->userDetails->id,$id,$qty);

        redirect(CUSTOM_BASE_URL.'view-cart');
        
    }
    
   public function remove_cart_list() {

        $id = $_POST['id'];

        $this->model->removeCartList($id,$this->userDetails->id);

        $res = $this->model->getCartCount($this->userDetails->id);

        echo $res;

    }
    
    public function offer_order_placed() {

        $cartOrder  = array();
        
        $cartOrder['user_id']     = $this->userDetails->id;
        $cartOrder['total_amt']   = $this->input->post('gross_total');
        $cartOrder['address_id']  = $this->input->post('address_id');
        $cartOrder['deal_id']    = $this->input->post('offer_id');
        $cartOrder['type']    = 1;

        $qty = $this->input->post('stock_qty');
        $stock_id = $this->input->post('stock_id');
        $sub_total = $this->input->post('sub_total');
        
        $res = $this->model->insertCartOfferOrder($cartOrder,$qty,$stock_id,$sub_total);
        
        $orckratt = base64_encode($res .SALT_KEY.CKRAT_KEY);

        $kekrat = base64_encode(ORDER_KEY);

        redirect(CUSTOM_BASE_URL.'order_sucess/'.$orckratt.'/'.$kekrat);

    }

    public function order_placed() {

        $cartOrder  = array();
        
        $cartOrder['user_id']  = $this->userDetails->id;
        $cartOrder['total_amt']  = $this->input->post('gross_total');
        $cartOrder['address_id']  = $this->input->post('address_id');
        
        $qty = $this->input->post('stock_qty');
        $stock_id = $this->input->post('stock_id');
        $sub_total = $this->input->post('sub_total');
        
        $res = $this->model->insertCartOrder($cartOrder,$qty,$stock_id,$sub_total);
        
        $orckratt = base64_encode($res .SALT_KEY.CKRAT_KEY);

        $kekrat = base64_encode(ORDER_KEY);

        redirect(CUSTOM_BASE_URL.'order_sucess/'.$orckratt.'/'.$kekrat);

    }

    public function cart_order_placed() {

        $cartOrder  = array();

        $stock_id = $this->input->post('stock_id');

        $cartOrder['user_id']  = $this->userDetails->id;
        $cartOrder['total_amt']  = $this->input->post('gross_total');
        $cartOrder['address_id']  = 1;
        
        $qty = $this->input->post('stock_qty');
        $stock_id = $this->input->post('stock_id');
        $sub_total = $this->input->post('sub_total');

        $res = $this->model->insertAddCartOrder($cartOrder,$qty,$stock_id,$sub_total);

        $data['cart_list'] = $this->model->getCartOrderData($res);

        $this->model->removeProductCart($this->userDetails->id);
        
        $orckratt = base64_encode($res .SALT_KEY.CKRAT_KEY);

        $kekrat = base64_encode(ORDER_KEY);

        redirect(CUSTOM_BASE_URL.'order_sucess/'.$orckratt.'/'.$kekrat);

    }
    
    public function order_sucess($encrypted_id='',$string='') {
        
        $decrypted_id = base64_decode($encrypted_id);

        $id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);

        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->userDetails->id);

        $data['list'] = $this->model->getOfferCategory();

        $data['cart_list'] = $this->model->getCartOrderData($id);

        $this->load->view('order-placed',$data);
    }

    public function buy_now() {

        $encrypted_id = $this->uri->segment(2);
        
        $decrypted_id = base64_decode($encrypted_id);

        $id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);

        $data['address'] = $this->model->getUserAddress($this->userDetails->id);

        $data['product'] = $this->model->getProductData($id);

        $this->load->view('single-checkout',$data);
    }
    
    public function offer_buy_now() {

        $id = $this->uri->segment(2);

        $data['address'] = $this->model->getUserAddress($this->userDetails->id);

        $data['offer'] = $this->model->getOfferDetailsData($id);
        
        $this->load->view('offer-checkout',$data);
    }

    public function checkout() {

        $data['address'] = $this->model->getUserAddress($this->userDetails->id);
        
        $data['product'] = $this->model->getAllCartDataByUser($this->userDetails->id);

        $this->load->view('checkout',$data);
    }
    
    public function addtowishlist() {

        $WishListData  = array();

        $WishListData['user_id']  = $this->userDetails->id;
        $WishListData['stock_id']  = $_POST['rowid'];
        $WishListData['status']  = $_POST['status'];

        $res = $this->model->insertMoveToWishList($WishListData);

        if($res)
        {
            echo "1";

        }
        else{
            echo "0";
        }
        
    }
    
    public function remove_wish_list() {

        $id = $_POST['id'];

        $res = $this->model->removeWishList($id,$this->userDetails->id);

    }
    
    public function profile_upload_process()
    {

        if($_FILES['images']['name']) {

            if (!is_dir('admin/uploads/profile'))
            {
                mkdir('admin/uploads/profile/', 0755, TRUE);
            }

            $number_of_files_uploaded = count($_FILES['images']['name']);

            for ($i = 0; $i < $number_of_files_uploaded; $i++) :

                $_FILES['userfile']['name']     = $_FILES['images']['name'][$i];
                $_FILES['userfile']['type']     = $_FILES['images']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['images']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['images']['size'][$i];
                $config = array(
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 300000,
                'overwrite'     => FALSE,
                'upload_path'   => 'admin/uploads/profile/',
                'encrypt_name'  => TRUE,
                'remove_spaces' =>  TRUE,
                );
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload()) :
                $error = array('error' => $this->upload->display_errors());
                else :
                $data = $this->upload->data();
                // Continue processing the uploaded data
                $multi_images[] = $data['file_name'];

                $this->load->library('upload', $config);

                $file_name = $data['file_name'];  
                $params['gambar'] = $file_name;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'admin/uploads/profile/'.$file_name;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 400;
                $config['height']   = 400;
                $config['new_image']        = 'admin/uploads/profile/' .$file_name;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                    endif;

                endfor;
            }
            else{

                $multi_images[] = "";

            }

        $result = $this->model->updateImageUserprofile($this->userDetails->id,$multi_images);

    }
    
    public function add_cart_order() {

        $quantity = $_POST['quantity'];
        $stock_id = $_POST['stock_id'];

        $this->model->insertAddToCart($this->userDetails->id,$stock_id,$quantity);
    }



}

?>
