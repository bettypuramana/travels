<?php

Class Account_model extends MY_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();
    }

    var $table = 'register';
    
    public function getMainCategorys() {
   
        $this->db->select('cart_category.cat_id,cart_category.parent_id,cart_category.cat_name,cart_category.image as img_name,cart_category.cat_icon');
        $this->db->from('cart_category');
        $this->db->where('cart_category.menu_cat_status',1);
        $this->db->where('cart_category.parent_id',0);
        $this->db->order_by('cart_category.cart_page_order','ASC');
        $this->db->limit(10);
        $parent = $this->db->get();

        $categories = $parent->result_array();
    
        return $categories;
    }
    
    public function getCartOrderData($id='')
    {
   
        $this->db->select('cart_order.id,cart_order.date,cart_order.address_id,cart_order.total_amt');
        $this->db->from('cart_order');
        $this->db->where('cart_order.id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['order_sub'] = $this->getCartOrderDataSub($p_cat['id']);

            $categories[$i]['address'] = $this->getDeliveryAddressSub($p_cat['address_id']);

            $i++;
        }
                
        return $categories;
    }
    
      public function getDeliveryAddressSub($id='') {
   
        $this->db->select('user_delivery_address.id,user_delivery_address.name,user_delivery_address.address,user_delivery_address.land_mark,user_delivery_address.pincode,user_delivery_address.phone');
        $this->db->from('user_delivery_address');
        $this->db->where('user_delivery_address.id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();

        return $categories;
    }

    public function getCartOrderDataSub($id='') {
   
        $this->db->select('cart_order_sub.id as sub_id,cart_order_sub.sub_total,cart_order_sub.qty,cart_stock.id as stock_id,cart_stock.stock_name,cart_stock.list_price,cart_order_sub.status');
        $this->db->from('cart_order_sub');
        $this->db->join('cart_stock', 'cart_order_sub.stock_id = cart_stock.id');
        $this->db->where('cart_order_sub.order_id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['image_name'] = $this->getSingleImageSub($p_cat['stock_id']);

            $i++;
        }
                
        return $categories;
    }
    
    public function insertCartOfferOrder($value='',$qty='',$stock_id='',$sub_total='') { 
        
        if(!array_key_exists('date', $value)){
            $value['date'] = date("Y-m-d H:i:s");
        }

        if ($this->db->insert('cart_order', $value)) {

            $insert_id = $this->db->insert_id();

             foreach ($stock_id as $key => $stock_ids) {
            
                $value_order= array('order_id' => $insert_id,'stock_id' => $stock_ids,'qty' => $qty,'sub_total' => $sub_total);

                $this->db->insert('cart_order_sub', $value_order);

            }
             
            return $insert_id;

        } else{

            return false;
        }

    }

    
    public function insertCartOrder($value='',$qty='',$stock_id='',$sub_total='') { 
        
        if(!array_key_exists('date', $value)){
            $value['date'] = date("Y-m-d H:i:s");
        }

        if ($this->db->insert('cart_order', $value)) {

            $insert_id = $this->db->insert_id();

            $value_order= array('order_id' => $insert_id,'stock_id' => $stock_id,'qty' => $qty,'sub_total' => $sub_total);

                $this->db->insert('cart_order_sub', $value_order);
             
            return $insert_id;

        } else{

            return false;
        }

    }
    
    public function insertAddCartOrder($value='',$qty='',$stock_id='',$sub_total='') { 
        
        if(!array_key_exists('date', $value)){
            $value['date'] = date("Y-m-d H:i:s");
        }

        if ($this->db->insert('cart_order', $value)) {

            $insert_id = $this->db->insert_id();

            foreach ($stock_id as $key => $stock_ids) {
            

                $value_order= array('order_id' => $insert_id,'stock_id' => $stock_ids,'qty' => $qty[$key],'sub_total' => $sub_total[$key]);

                $this->db->insert('cart_order_sub', $value_order);

            }
             
            return $insert_id;

        } else{

            return false;
        }

    }

    public function removeProductCart($user_id='') { 

        $this->db->where('cart_addtocart.user_id', $user_id);
        $this->db->delete('cart_addtocart');

        return true;
    }

    public function getSubCategoryData($parent = 0,$category_tree_array = '')
    {

    if (!is_array($category_tree_array))
        $category_tree_array = array();

      $this->db->from('cart_category');

      $this->db->where('parent_id', $parent);
      $this->db->where('top_category_status', 1);
      $this->db->order_by('cat_id','asc');
      $query = $this->db->get();



    if ($query->num_rows() > 0) {


      foreach($query->result_array() as $rowCategories){

        
            $category_tree_array[] = array("cat_id" => $rowCategories['cat_id'],"parent_id" => $rowCategories['parent_id'], "cat_name" => $rowCategories['cat_name']);
            $category_tree_array = $this->getSubCategoryData($rowCategories['cat_id'], $category_tree_array);
        }
    }
    return $category_tree_array;
  }

    public function getOfferCategory()
    {
        $date = date('Y-m-d G:i:s', time());

        $this->db->select('cart_category.cat_id,cart_category.cat_name');
        $this->db->from('cart_combo_offer');
        $this->db->join('cart_combo_products', 'cart_combo_offer.id = cart_combo_products.deal_id');
        $this->db->join('cart_stock', 'cart_combo_products.stock_id = cart_stock.id');
        $this->db->join('cart_product', 'cart_stock.product_id = cart_product.id');
        $this->db->join('cart_category', 'cart_product.cat_id = cart_category.cat_id');
        $this->db->where('cart_combo_offer.offer_start <=', $date);
        $this->db->where('cart_combo_offer.offer_end >=', $date);
        $this->db->group_by('cart_category.cat_id');
        $this->db->order_by('cart_category.cat_name','ASC');
        $query = $this->db->get();

        $categories=$query->result();

        return $categories;

    }

    public function getProfileData($id='')
    {
   
        $this->db->select('user_registration.id,user_registration.user_name,user_registration.email,user_registration.phone,user_registration.prof_image,user_registration.status');
        $this->db->from('user_registration');
        $this->db->where('user_registration.id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();
    
        return $categories;
    }
    
    public function getSelfProfileData($id='') {
   
        $this->db->select('user_registration.prof_image');
        $this->db->from('user_registration');
        $this->db->where('user_registration.id',$id);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
         
            $res = $query->result()[0]->prof_image;           

        }
        else{

            $res = "";

        }
    
        return $res;
    }

    public function updateProfile($id='',$value='') {
   
        $this->db->where('user_registration.id',$id);
        $this->db->update('user_registration',$value);

        return true; 

    }

    public function getDeliveryAddressData($id='')
    {
   
        $this->db->select('user_delivery_address.id,user_delivery_address.name,user_delivery_address.pincode,user_delivery_address.address,user_delivery_address.land_mark,user_delivery_address.phone');
        $this->db->from('user_delivery_address');
        $this->db->where('user_delivery_address.user_id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();
    
        return $categories;
    }

    public function insertDeliveryAddress($data='') {
   
        $this->db->insert('user_delivery_address',$data);

        return true; 

    }

    public function getNotificationData($id='')
    {
   
        $this->db->select('user_notification.id,user_notification.notification,user_notification.created');
        $this->db->from('user_notification');
        $this->db->where('user_notification.user_id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();
    
        return $categories;
    }
    
    public function removeCartList($id='',$user_id='') {
   
        $this->db->where('cart_addtocart.stock_id',$id);
        $this->db->where('cart_addtocart.user_id',$user_id);
        $this->db->delete('cart_addtocart');

        return true;
    }
    
    public function removeWishList($id='',$user_id='') {
   
        $this->db->where('cart_movetowishlist.stock_id',$id);
        $this->db->where('cart_movetowishlist.user_id',$user_id);
        $this->db->delete('cart_movetowishlist');

        return true;
    }

    public function getWishListData($id='')
    {
   
        $this->db->select('cart_movetowishlist.move_id as id,cart_stock.stock_name,cart_stock.list_price,cart_movetowishlist.stock_id,cart_movetowishlist.date');
        $this->db->from('cart_movetowishlist');
        $this->db->join('cart_stock', 'cart_movetowishlist.stock_id = cart_stock.id');
        $this->db->where('cart_movetowishlist.user_id',$id);
        $parent = $this->db->get();

        $categories = $parent->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['image_name'] = $this->getSingleImageSub($p_cat['stock_id']);

            $i++;
        }
            
        return $categories;
    }

    public function getMyorderData($id='')
    {
   
        $this->db->select('cart_order.id,cart_order_sub.id as sub_id,cart_stock.id as stock_id,cart_stock.stock_name,cart_stock.list_price,cart_order.date,cart_order_sub.status');
        $this->db->from('cart_order');
        $this->db->join('cart_order_sub', 'cart_order.id = cart_order_sub.order_id');
        $this->db->join('cart_stock', 'cart_order_sub.stock_id = cart_stock.id');
        $this->db->where('cart_order.user_id',$id);
        $this->db->order_by('cart_order.id','DESC');
        $parent = $this->db->get();

        $categories = $parent->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['image_name'] = $this->getSingleImageSub($p_cat['stock_id']);

            $i++;
        }
                
        return $categories;
    }

    public function insertRatingData($id='',$data) { 

        if(!array_key_exists('date_rated', $data)){
            $data['date_rated'] = date("Y-m-d H:i:s");
        }

        $this->db->where('user_id',$id);
        $this->db->where('stock_id',$data['stock_id']);
        $query = $this->db->get('cart_rating');

        if ($query->num_rows() >= 1){

            $this->db->where('user_id',$data['user_id']);
            $this->db->where('stock_id',$data['stock_id']);
            $this->db->update('cart_rating',$data);

        }
        else{

            $insert =$this->db->insert('cart_rating', $data);

        }

       return ($this->db->affected_rows() != 1) ? false : true;
      
    }

    public function getCartProductUserWise($id='') {
        
        $this->db->select('cart_stock.id,cart_addtocart.id as cart_id,cart_addtocart.user_id,cart_product.product_name,cart_stock.stock_name,cart_stock.price,cart_addtocart.qty,cart_stock.list_price,cart_stock.stock,cart_stock.discount,cart_addtocart.payment_mode as pay_mode');
        $this->db->from('cart_product');
        $this->db->join('cart_stock', 'cart_product.id = cart_stock.product_id');
        $this->db->join('cart_addtocart', 'cart_stock.id = cart_addtocart.stock_id');
        $this->db->where('cart_addtocart.user_id',$id);
        $this->db->order_by('cart_addtocart.id','desc');

        $query = $this->db->get();

        $categories = $query->result_array();

        $i=0;
       
        foreach($categories as $p_cat) {

            $categories[$i]['image'] = $this->getImageDataSub($p_cat['id']);

            $i++;
        }

        return $categories;
    }

    public function getImageDataSub($id='') {
   
        $this->db->select("cart_product_image.image");
        $this->db->from('cart_product_image');
        $this->db->where('cart_product_image.stock_id',$id);
        $this->db->order_by('cart_product_image.id','ASC');
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {

            $image=$query->result_array()[0]['image'];

            return $image;
        }
        else{

            return "no image";
        }
    }

    public function getCartCount($user_id='') {
   
        $this->db->select('cart_addtocart.id');
        $this->db->from('cart_addtocart');
        $this->db->where('cart_addtocart.user_id',$user_id);
        $query = $this->db->get();

        $categories = $query->num_rows();
    
        return $categories;
    }

    /////////////////////////////////////////////////////////////

    // public function getMainCategorys()
    // {
   
    //     $this->db->select('cart_category.cat_id,cart_category.parent_id,cart_category.display_name as cat_name,cart_category.image as img_name,cart_category.cat_icon');
    //     $this->db->from('cart_category');
    //     $this->db->where('cart_category.top_category_status',1);
    //     $this->db->order_by('cart_category.cart_page_order','ASC');
    //     $parent = $this->db->get();

    //     $categories = $parent->result_array();
        
    //     return $categories;
    // }

    public function getProductDetailsBySeller($id='') {
      
        $this->db->select('register.reg_id,register.bus_category,register.bus_name as seller_name,register.facebook,register.whatsapp,register.twitter,register.instagram,register.email,register.phone,register.crop_image,register.loc_latitude,register.loc_longitude,register.website,register.about_us,register.comp_overview,register.location_name,register.address');
        $this->db->from('register');
        $this->db->order_by('register.reg_id','desc');
        $this->db->where('register.reg_id',$id);
        $query = $this->db->get();

        $categories = $query->result_array();

        $i=0;

        foreach($categories as $p_cat) {

        //     $like = $this->getSellerLikeSub($id,$user_id);
        //     $categories[$i]->liked=$like[0]['like_count'];

        //     $total_like = $this->getSelleRatingTotalLikeSub($id);
        //     $categories[$i]->total_likes=$total_like[0]['like_count'];

        //     $categories[$i]->top_best_product = $this->getSellerBestProductListSub($p_cat->reg_id);

        //  $categories[0]->top_banner = $this->getSellerBestListBannerSub($p_cat->reg_id);

            $categories[$i]['best_deal'] = $this->getSellerBestDealDataListSub($p_cat['reg_id']);

            $categories[$i]['new_arrival'] = $this->getSellerNewArrivalsListSub($p_cat['reg_id']);

            $categories[$i]['category'] = $this->getSellerCategoryListSub($p_cat['reg_id']);

            $categories[$i]['all_category'] = $this->getSellerAllCategoryListSub($p_cat['reg_id']);

        //     if(!empty($best_deal)) {

        //         $trending_list = $this->getSellerTopTrendingList($p_cat->reg_id);

        //         $best_deal1=array("title"=>'Best deal',"value"=>$best_deal);

        //         $trending_list1=array("title"=>'Trending list ',"value"=>$trending_list);

        //         $categories[0]->best_deal = array_merge(array($best_deal1,$trending_list1));
        //     }

            $categories[$i]['cover'] = $this->getSellerImageSub($p_cat['reg_id']);

        //     $categories[$i]->modules = $this->getBusUserlistSub($p_cat->bus_category);

        //     $categories[$i]->service = $this->getSellerServiceListSub($p_cat->reg_id);

            $i++;
        }
        
        return $categories;

    }

    public function getSellerImageSub($id='')
    {
        $this->db->select("cart_seller_coverimage.id,cart_seller_coverimage.cover_image");
        $this->db->from('cart_seller_coverimage');
        $this->db->where('cart_seller_coverimage.seller_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

       public function getSellerAllCategoryListSub($reg_id='')
    {

        $parent = $this->db->query("SELECT cat_id,cat_name,display_name,image,cat_icon,id,discount,reg_id

        FROM (
        SELECT cart_stock.discount,z.cat_id,cart_category.cat_name,cart_category.display_name,cart_category.image,cart_category.cat_icon,z.id,z.reg_id
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        WHERE cart_stock.status=1
        AND z.reg_id = $reg_id
        GROUP BY cat_id
        ) AS d
        ORDER BY cat_name ASC LIMIT 15");

        $categories = $parent->result_array();
        
        return $categories;    
    }

    public function getSellerCategoryListSub($reg_id='')
    {

        $parent = $this->db->query("SELECT cat_id,cat_name,display_name,image,cat_icon,id,discount,reg_id

        FROM (
        SELECT MAX(cart_stock.discount) as discount,z.cat_id,cart_category.cat_name,cart_category.display_name,cart_category.image,cart_category.cat_icon,z.id,z.reg_id
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        WHERE cart_stock.status=1
        AND z.reg_id = $reg_id
        GROUP BY cat_id
        ) AS d
        ORDER BY discount DESC LIMIT 10");

        $categories = $parent->result_array();
        
        return $categories;    
    }

    public function getSellerBestDealDataListSub($reg_id='')
    {

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
        
            $f=0;

            foreach ($result as $row) {

                $category[$f]=$row->cat_id;

                $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND cart_category.cat_id IN($comma_list)";
        }
        else
        {
            $cat_condition="";
        }

        $parent = $this->db->query("SELECT id,price,list_price,stock_name,url_slug,discount,stock,reg_id,bus_name,cat_id,cat_name,description

        FROM (
        SELECT cart_stock.id,cart_stock.price,cart_stock.list_price,cart_stock.discount,cart_stock.stock,cart_stock.stock_name,cart_stock.url_slug,z.reg_id,register.bus_name,z.cat_id,cart_category.cat_name, z.description
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        JOIN register ON z.reg_id=register.reg_id 
        WHERE z.reg_id = $reg_id        
        AND cart_stock.status=1 
        $cat_condition
        LIMIT 10
        ) AS d
        ORDER BY discount DESC");

        $categories = $parent->result_array();

        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]['image_name'] = $this->getSingleImageSub($p_cat['id']);

            $i++;
        }
        
        return $categories;    
    }

    public function getSellerNewArrivalsListSub($reg_id='')
    {

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
        
            $f=0;

            foreach ($result as $row) {

                $category[$f]=$row->cat_id;

                $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND cart_category.cat_id IN($comma_list)";
        }
        else
        {
            $cat_condition="";
        }

        $parent = $this->db->query("SELECT id,price,list_price,stock_name,url_slug,discount,stock,reg_id,bus_name,cat_id,cat_name,description

        FROM (
        SELECT cart_stock.id,cart_stock.price,cart_stock.list_price,cart_stock.discount,cart_stock.stock,cart_stock.stock_name,cart_stock.url_slug,z.reg_id,register.bus_name,z.cat_id,cart_category.cat_name, z.description
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        JOIN register ON z.reg_id=register.reg_id 
        WHERE z.reg_id = $reg_id        
        AND cart_stock.status=1 
        $cat_condition
        LIMIT 10
        ) AS d
        ORDER BY id DESC");

        $categories = $parent->result_array();

        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]['image_name'] = $this->getSingleImageSub($p_cat['id']);

            $i++;
        }
        
        return $categories;    
    }



    public function getSingleImageSub($id='')
    {
        $this->db->select('cart_product_image.image');
        $this->db->from('cart_product_image');
        $this->db->where('cart_product_image.stock_id',$id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() >= 1) {

            $result = $query->result_array()[0]['image'];

            return $result;

        }

        else{

            $result = 'no image';

            return $result;
        }


    }

    public function insertAddToCart($user_id='',$stock_id='',$qty='')
    { 

        $this->db->where('user_id',$user_id);
        $this->db->where('stock_id',$stock_id);
        $query = $this->db->get('cart_addtocart');

        $value_Cart= array('date' => date("Y-m-d H:i:s"),'user_id' => $user_id,'stock_id' => $stock_id,'qty' => $qty);

        if ($query->num_rows() > 0) {

            $this->db->where('user_id',$user_id);
            $this->db->where('stock_id',$stock_id);
            $this->db->update('cart_addtocart',$value_Cart);

            return true;
        }
        else{

            $insert =$this->db->insert('cart_addtocart', $value_Cart);
            return true;
        }
    }

    public function getUserAddress($id='')
    {
        $this->db->select('user_delivery_address.id as address_id,user_registration.user_name,user_delivery_address.name,user_delivery_address.address,user_delivery_address.pincode,user_delivery_address.land_mark,user_delivery_address.country,user_delivery_address.phone,user_delivery_address.alter_phone,user_delivery_address.status');
        $this->db->from('user_delivery_address');
        $this->db->join('user_registration', 'user_delivery_address.user_id = user_registration.id');
        $this->db->order_by('user_delivery_address.id','ASC');
        $this->db->where('user_delivery_address.user_id',$id);
        $query = $this->db->get();

        $categories = $query->result_array();

        return $categories;
    }

    public function getProductData($id='') {
   
        $this->db->select('cart_stock.id,cart_stock.stock_name,cart_stock.price,cart_stock.list_price,cart_stock.stock,cart_stock.discount');
        $this->db->from('cart_stock');
        $this->db->where('cart_stock.id',$id);

        $query = $this->db->get();

        $categories = $query->result_array();

        $i=0;
       
        foreach($categories as $p_cat) {

            $categories[$i]['image'] = $this->getImageDataSub($p_cat['id']);

            $i++;
        }

        return $categories;
    }

    public function getAllCartDataByUser($id='') {
   
        $this->db->select('cart_stock.id,cart_stock.stock_name,cart_stock.price,cart_stock.list_price,cart_stock.stock,cart_stock.discount,cart_addtocart.qty');
        $this->db->from('cart_product');
        $this->db->join('cart_stock', 'cart_product.id = cart_stock.product_id');
        $this->db->join('cart_addtocart', 'cart_stock.id = cart_addtocart.stock_id');
        $this->db->where('cart_addtocart.user_id',$id);

        $query = $this->db->get();

        $categories = $query->result_array();

        $i=0;
       
        foreach($categories as $p_cat) {
            
            $categories[$i]['sub_total'] = $this->getAllCartDataByUserSub($id);

            $categories[$i]['image'] = $this->getImageDataSub($p_cat['id']);

            $i++;
        }

        return $categories;
    }
    
    public function getAllCartDataByUserSub($id='')
    {
        $this->db->select('SUM(cart_stock.list_price * cart_addtocart.qty) as sub_total');
        $this->db->from('cart_addtocart');
        $this->db->join('cart_stock', 'cart_addtocart.stock_id = cart_stock.id');
        $this->db->where('cart_addtocart.user_id',$id);
        $query = $this->db->get();

        if ($query->num_rows() >= 1){ 

            $categories = $query->result_array()[0]['sub_total'];
        }
        else{

            $categories = 0;

        }        

        return $categories;
    }
    
    public function insertMoveToWishList($data) 
    {
        if(!array_key_exists('date', $data)){
            $data['date'] = date("Y-m-d H:i:s");
        }

        if($data['status'] == 1) {

            $this->db->where('user_id',$data['user_id']);
            $this->db->where('stock_id',$data['stock_id']);
            $query = $this->db->get('cart_movetowishlist');

            if ($query->num_rows() >= 1){

                $this->db->where('user_id',$data['user_id']);
                $this->db->where('stock_id',$data['stock_id']);
                $this->db->update('cart_movetowishlist',$data);
            }
            else {

                $this->db->insert('cart_movetowishlist', $data);
            }

            return TRUE;

        }
        else{

            $this->db->where('user_id',$data['user_id']);
            $this->db->where('stock_id',$data['stock_id']);
            $this->db->delete('cart_movetowishlist');

            return FALSE;
        }
    }
    
    public function updateImageUserprofile($user_id='',$multi_image='') { 

        $this->db->select('user_registration.prof_image');
        $this->db->where('id',$user_id);
        $query = $this->db->get('user_registration');

        if ($query->num_rows() >= 1){
         
            unlink("admin/uploads/profile/" . $query->result()[0]->prof_image);           

        }

        $value_image= array('prof_image' => $multi_image[0]);

        $this->db->where('id',$user_id);
        $this->db->update('user_registration', $value_image);

        return true;
    }
    
    public function getOfferDetailsData($id='') {

        $date = date('Y-m-d G:i:s', time());

        $this->db->select('cart_combo_offer.id,cart_combo_offer.offer_price,cart_combo_offer.discount,cart_combo_offer.actual_price,cart_combo_offer.image,cart_combo_offer.caption,cart_combo_offer.description');
        $this->db->from('cart_combo_offer');
        $this->db->where('cart_combo_offer.offer_start <=', $date);
        $this->db->where('cart_combo_offer.offer_end >=', $date);
        $this->db->where('cart_combo_offer.id', $id);
        $this->db->order_by('cart_combo_offer.id','ASC');
        $query = $this->db->get();

        $categories=$query->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['items'] = $this->getOfferDetailsDataSub($p_cat['id']);

            $i++;
        }
        
        return $categories;    
    }

    public function getOfferDetailsDataSub($id='') {

        $this->db->select('cart_stock.id,cart_stock.stock_name,cart_stock.discount,cart_stock.stock,cart_product_image.image as product_image,cart_stock.status');
        $this->db->from('cart_combo_products');
        $this->db->join('cart_stock', 'cart_combo_products.stock_id = cart_stock.id');
        $this->db->join('cart_product_image', 'cart_stock.id = cart_product_image.stock_id');
        $this->db->where('cart_combo_products.deal_id',$id);
        $this->db->group_by('cart_product_image.stock_id','ASC');
        $query = $this->db->get();


        $result = $query->result_array();
      
        return $result;

    }

}
