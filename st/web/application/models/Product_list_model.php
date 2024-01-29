<?php

class Product_list_model extends MY_Model {

    public function __construct() {
        
    parent::__construct();
    
    }
    
    
    public function getCategoryName($id='') {
   
        $this->db->select("cart_category.cat_name");
        $this->db->from('cart_category');
        $this->db->where('cart_category.cat_id',$id);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {

            $catname = $query->result_array()[0]['cat_name'];

        }
        else{

            $catname = "";
        }
        
        return $catname;
    }

    
    public function getMainCategorys()
    {
   
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


    function make_query($minimum_price, $maximum_price, $feature, $option,$cat_id,$availability,$pop,$high,$low,$first)
    {
        
        
        if(!empty($cat_id)) {

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

            $cat_condition="AND z.cat_id IN($comma_list)";

        }
        else
        {
            $cat_condition="";
        }

        if( !empty($option) && !empty($feature) )
        {
            $option = implode(',', $option);
            $feature = implode(',', $feature);

            $cond=" JOIN cart_stock_option ON cart_stock.id=cart_stock_option.comb_id INNER JOIN cart_stock_feature ON z.id=cart_stock_feature.product_id WHERE cart_stock_option.option_id in ($option) AND cart_stock_feature.feature_id in ($feature) AND";
        }

        else if(!empty($option))
        {
            $option = implode(',', $option);

            $cond="JOIN cart_stock_option ON cart_stock.id=cart_stock_option.comb_id WHERE cart_stock_option.option_id in ($option) AND";

        }
           
        else if(!empty($feature))
        {
            $feature = implode(',', $feature);


            $cond="JOIN cart_stock_feature ON z.id=cart_stock_feature.product_id WHERE cart_stock_feature.feature_id in ($feature) AND";
        }

        else
        {
            $cond='WHERE'; 
        }


        $query = "SELECT cart_stock.id,z.cat_id,z.id as product_id,cart_stock.price,cart_stock.list_price,cart_stock.stock_name,cart_stock.url_slug,cart_stock.discount,cart_stock.stock,z.description
        FROM cart_product AS z  
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        $cond
        cart_stock.status=1 
        $cat_condition ";

        if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price)) {
            
            $query .= " AND list_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'";
        }
  
        if(empty($availability)) {

            $query .= ' AND cart_stock.stock >= 1';

        }
    
        if(!empty($pop)) {

            $query .= ' ORDER BY cart_stock.discount DESC';

        }


        if(!empty($high)) {

            $query .= ' ORDER BY cart_stock.list_price ASC';

        }

        if(!empty($low)) {

            $query .= ' ORDER BY cart_stock.list_price DESC';

        }

        if(!empty($first)) {

            $query .= ' ORDER BY cart_stock.id DESC';

        }

  
        return $query;
    }

    function count_all($minimum_price, $maximum_price, $feature, $option,$cat_id,$availability,$pop,$high,$low,$first) {
        
        $query = $this->make_query($minimum_price, $maximum_price, $feature, $option,$cat_id,$availability,$pop,$high,$low,$first);
        $data = $this->db->query($query);
        
        return $data->num_rows();
    }

    function fetch_data($limit='', $start='', $minimum_price='', $maximum_price='', $feature='', $option='',$cat_id='',$availability='',$pop='',$high='',$low='',$first='')
    {
        $query = $this->make_query($minimum_price, $maximum_price, $feature, $option,$cat_id,$availability,$pop,$high,$low,$first);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        
        if($data->num_rows() > 0)
        {
      
            $categories = $data->result_array();

            $i=0;
       
            foreach($categories as $p_cat) {

            $categories[$i]['image_name'] = $this->getImageDataSub($p_cat['id']);

            $i++;
            }
      
            foreach($categories as $row)
            {
                $mackratt = base64_encode($row['id'] .SALT_KEY.CKRAT_KEY);
                
                $limited_word = character_limiter($row['stock_name'],15);

                $output .= '
                <div class="flt-pro-box">
                    <a class="flt-pro-img" href="'. CUSTOM_BASE_URL . 'product-details/'.$mackratt.'" target="_blank"><img src="'. CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$row['image_name'].'" alt="onlister"></a>
                    <div class="flt-cont-out">
                     <div class="flt-cont-price">
                       <div class="flt-p-out"> 
                        <div class="flt-p"><i class="glyph-icon flaticon-rupee-indian"></i> <span>'.$row['list_price'].'</span></div>
                       </div>
                     </div>
                    <a class="flt-img-txt-out" href="#">
                     <h1 class="flt-img-txt">'. $limited_word.'</h1>
                     <h2 class="flt-img-txt-b">Extra '. $row['discount'].'% off</h2>
                    </a>
                    </div>
                </div>  ';
            }
        }
        else
        {
            $output = '<h3 class="no-data12">No Data Found</h3>';
        }
        
        return $output;
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

    public function getProductFeatureList($cat_id='',$st_name='') {

        $conditions = array();

        if(!empty($st_name)){

            $conditions[] = 'z.product_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_category.cat_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_stock.stock_name  LIKE "%' . $st_name . '%"';

            $sqlStatement = 'AND '. implode(' OR ', $conditions);
        }
        else{

            $sqlStatement = "";
        }

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
            
            $f=0;
            foreach ($result as $rows) {


               $category[$f]=$rows->cat_id;

               $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND z.cat_id IN($comma_list)";

        }
        else
        {
            $cat_condition="";
        }

        $query = $this->db->query("SELECT cart_stock_feature.feature_id,cart_feature.id,cart_feature.name
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_stock_feature ON z.id=cart_stock_feature.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        JOIN cart_feature_variant ON cart_stock_feature.feature_id=cart_feature_variant.f_var_id
        JOIN cart_feature ON cart_feature_variant.f_id=cart_feature.id
        WHERE cart_stock.status=1 
        $cat_condition
        $sqlStatement
        GROUP BY cart_feature.id
        ORDER BY name ASC");

        $categories = $query->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['feature_var'] = $this->getFilterFeatureVarSub($p_cat['id']);

            $i++;
        }
        
        return $categories; 

    }

    public function getFilterFeatureVarSub($id) {
        
        $parent = $this->db->query("SELECT cart_feature_variant.f_var_id,cart_feature_variant.variants_name
        FROM cart_stock_feature  
        JOIN cart_feature_variant ON cart_stock_feature.feature_id=cart_feature_variant.f_var_id
        WHERE cart_feature_variant.f_id = $id 
        GROUP BY cart_feature_variant.f_var_id
        ORDER BY cart_feature_variant.variants_name ASC");

        $categories = $parent->result_array();

        return $categories; 
    }

    public function getProductOptionList($cat_id='',$st_name='')
    {

        $conditions = array();

        if(!empty($st_name)) { 

            $conditions[] = 'z.product_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_category.cat_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_stock.stock_name  LIKE "%' . $st_name . '%"';

            $sqlStatement = 'AND '. implode(' OR ', $conditions);
        }
        else{

            $sqlStatement = "";
        }

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
            
            $f=0;
            foreach ($result as $rows) {


               $category[$f]=$rows->cat_id;

               $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND z.cat_id IN($comma_list)";

        }
        else
        {
            $cat_condition="";
        }
      
        $query = $this->db->query("SELECT options.option_id,options.name
        
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        JOIN cart_stock_option ON cart_stock.id=cart_stock_option.comb_id
        JOIN options_type ON cart_stock_option.option_id=options_type.opt_var_id
        JOIN options ON options_type.opt_id=options.option_id
        WHERE cart_stock.status=1 
        $cat_condition
        $sqlStatement
        GROUP BY options.option_id
        ORDER BY name ASC");

        $categories = $query->result_array();

        $i=0;

        foreach($categories as $p_cat){

            $categories[$i]['option_var'] = $this->getFilterOptionVarSub($p_cat['option_id']);

            $i++;
        }

        return $categories;  

    }

    public function getFilterOptionVarSub($id)
    {
        $parent = $this->db->query("SELECT cart_stock_option.comb_id,options_type.opt_var_id,options_type.type_name,options_type.color_name
        FROM cart_stock_option  
        JOIN options_type ON cart_stock_option.option_id=options_type.opt_var_id
        WHERE options_type.opt_id = $id 
        GROUP BY options_type.opt_var_id
        ORDER BY options_type.type_name ASC LIMIT 5");

        $categories = $parent->result_array();

        return $categories; 
    }

    public function getProductFilterPriceList($cat_id='',$st_name='')  {

        $conditions = array();

        if(!empty($st_name)) { 

            $conditions[] = 'z.product_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_category.cat_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_stock.stock_name  LIKE "%' . $st_name . '%"';

            $sqlStatement = 'AND '. implode(' OR ', $conditions);
        }
        else{

            $sqlStatement = "";
        }

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
            
            $f=0;
            foreach ($result as $rows) {

               $category[$f]=$rows->cat_id;

               $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND z.cat_id IN($comma_list)";

        }
        else
        {
            $cat_condition="";
        }
   
        $parent = $this->db->query("SELECT MIN(cart_stock.list_price) AS SmallestPrice,MAX(cart_stock.list_price) AS LargestPrice
        FROM cart_product AS z
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        JOIN cart_stock ON z.id=cart_stock.product_id
        WHERE cart_stock.status=1 
        $cat_condition
        $sqlStatement");

        $res = $parent->result();

        return $res;
    }

    public function getProductFilterCategoryList($cat_id='',$st_name='')
    {

        $conditions = array();

        if(!empty($st_name)){

            $conditions[] = 'z.product_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_category.cat_name  LIKE "%' . $st_name . '%"';
            $conditions[] = 'cart_stock.stock_name  LIKE "%' . $st_name . '%"';

            $sqlStatement = 'AND '. implode(' OR ', $conditions);
        }
        else{

            $sqlStatement = "";
        }

        if( !empty($cat_id) ) {

            $query =$this->db->query("SELECT p6.parent_id as parent6_id, p5.parent_id as parent5_id, p4.parent_id as parent4_id, p3.parent_id as parent3_id, p2.parent_id as parent2_id, p1.parent_id as parent_id, p1.cat_id as cat_id, p1.cat_name from cart_category p1 left join cart_category p2 on p2.cat_id = p1.parent_id left join cart_category p3 on p3.cat_id= p2.parent_id left join cart_category p4 on p4.cat_id= p3.parent_id left join cart_category p5 on p5.cat_id= p4.parent_id left join cart_category p6 on p6.cat_id =p5.parent_id where $cat_id in (p1.parent_id, p2.parent_id, p3.parent_id, p4.parent_id, p5.parent_id, p6.parent_id) order by 1, 2, 3, 4, 5");

            $result = $query->result();

            $category= array();
            
            $f=0;

            foreach ($result as $rows) {

                $category[$f]=$rows->cat_id;

                $f++;
            }

            array_unshift($category,$cat_id);

            $comma_list = implode(",", $category);

            $cat_condition="AND z.cat_id IN($comma_list)";

        }
        else
        {
            $cat_condition="";
        }
      
        $parent = $this->db->query("SELECT z.cat_id,cart_category.cat_name
        FROM cart_product AS z
        JOIN cart_stock ON z.id=cart_stock.product_id
        JOIN cart_category ON z.cat_id=cart_category.cat_id
        WHERE cart_stock.status=1 
        $cat_condition
        $sqlStatement
        GROUP BY cart_category.cat_id
        ORDER BY cat_name ASC LIMIT 6");

        $res = $parent->result();

        return $res;
    }

    // public function getSubCategoryData($parent = 0,$category_tree_array = '') {

    //     if (!is_array($category_tree_array))

    //     $category_tree_array = array();

    //     $this->db->from('cart_category');
    //     $this->db->where('parent_id', $parent);
    //     $this->db->where('top_category_status', 1);
    //     $this->db->order_by('cat_id','asc');
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {

    //         foreach($query->result_array() as $rowCategories){

    //             $category_tree_array[] = array("cat_id" => $rowCategories['cat_id'],"parent_id" => $rowCategories['parent_id'], "cat_name" => $rowCategories['cat_name']);
    //             $category_tree_array = $this->getSubCategoryData($rowCategories['cat_id'], $category_tree_array);
    //         }
    //     }
    //     return $category_tree_array;
    // }

    public function getCartCount($user_id='') {
   
        $this->db->select('cart_addtocart.id');
        $this->db->from('cart_addtocart');
        $this->db->where('cart_addtocart.user_id',$user_id);
        $query = $this->db->get();

        $categories = $query->num_rows();
    
        return $categories;
    }
    
    public function getOfferCategory() {

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



}
