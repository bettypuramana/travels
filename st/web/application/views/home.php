<?php include("web/assets/include/header-c.php");?>

<main role="main" class="online-shop-main">
   <section class="h-ban clearfix">
        <div class="large-12 columns">

          <div class="owl-carousel owl-carousela owl-theme">
        <?php foreach ($banner as $key => $banner_row) { ?>
            <div class="item">
              <a href="#"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/cart_banner/'.$banner_row->image; ?>" alt="onlister"></a>
            </div>
        <?php } ?>
          </div>

          <!-- <a class="button secondary play">Play</a> 
          <a class="button secondary stop">Stop</a> -->
        </div>
   </section>
   <section class="ser-out-ab clearfix">
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-4 col-md-3 col-lg-3 col-xl-3">
        <div class="h-se-ab">
         <div class="h-se-img-ab">
          <img src="<?php echo base_url();?>assets/images/order-online.jpg">   
         </div>
         <div class="h-se-txt-ab">Order Online</div>
        </div>   
      </div>
      <div class="col-4 col-md-3 col-lg-3 col-xl-3">
        <div class="h-se-ab">
         <div class="h-se-img-ab">
          <img src="<?php echo base_url();?>assets/images/best-offer.jpg">   
         </div>
         <div class="h-se-txt-ab">Best Offers</div>
        </div>   
      </div>  
      <div class="col-4 col-md-3 col-lg-3 col-xl-3">
        <div class="h-se-ab">
         <div class="h-se-img-ab">
          <img src="<?php echo base_url();?>assets/images/free-delivery.jpg">   
         </div>
         <div class="h-se-txt-ab">Free Delivery</div>
        </div>   
      </div>  
     </div>  
    </div>
   </section>
      
   <section class="off-out-ab clearfix">
    <div class="container">
     <div class="off-out-ac">
      <a href="#" class="off-in-ab">
       <img src="<?php echo base_url();?>assets/images/offer-1.jpg">
      </a>
      <a href="#" class="off-in-ab">
       <img src="<?php echo base_url();?>assets/images/offer-2.jpg">
      </a>
      <a href="#" class="off-in-ab">
       <img src="<?php echo base_url();?>assets/images/offer-3.jpg">
      </a>
     </div>
    </div>
   </section>
   
   

  
      
   <section class="cate-out-ab clearfix">
    <div class="container-fluid">
      <div class="cate-out-ac">
       <div class="owl-carousel owl-carousel-cate-a owl-theme">
           
       <?php foreach ($category as $key => $cat_row) { 
           
           $catmackratt = base64_encode($cat_row->cat_id .SALT_KEY.CKRAT_KEY);
       
       ?>
         
       <div class="item">  
        <a href="<?= CUSTOM_BASE_URL. 'product-list/'.$catmackratt; ?>" class="cate-offer-ad">
          <div class="cate-hove12">
           <img src="<?= CUSTOM_BASE_URL . 'admin/uploads/category/crop/'.$cat_row->image; ?>">
           <h4 class="hov-head"><?= ucfirst($cat_row->cat_name); ?></h4>
          </div>
        </a>
        </div>



      <?php } ?>

     </div>
               <!-- <a class="button secondary playb">Play</a> 
          <a class="button secondary stopb">Stop</a> -->  
     </div>
    </div>
   </section>

   <div class="container-fluid">
 <div class="row"> 
  <div class="col-lg-12 col-xl-12">
  <!-- product slider 1 -->  
   <div class="pro-flt-main">        
    <div class="pro-spm-txt-m"> 
     <h1><?php if(isset($best_deal_title)) { print_r($best_deal_title); } ?></h1>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
            <?php foreach ($top_selling as $key => $best_rows) { 
                
                $mackratt = base64_encode($best_rows['id'] .SALT_KEY.CKRAT_KEY);
            
            ?>
            <div class="item">
             <div class="on-out-pro">   
              <div class="on-out-pro-img snip1252"> 
               <a href="<?= CUSTOM_BASE_URL . 'product-details/'.$mackratt; ?>"  target="_blank"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$best_rows['image_name']; ?>" alt="onlister"></a>
              </div>
              <a class="on-pro-ou-ab" href="#">
               <h1 class="on-pro-hd-a"><?= $best_rows['stock_name']; ?></h1>
               <h2 class="on-pro-hd-b"><?= $best_rows['discount']; ?>% Off</h2>
              </a>
               <div class="on-sh-out"> 
                <div class="pro-price">
                 <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in"><?= $best_rows['list_price']; ?></span> 
                </div>
               </div>   
             </div>
            </div>
          <?php } ?>
          </div>
          <!-- <a class="button secondary playb">Play</a> 
          <a class="button secondary stopb">Stop</a> --> 
          </div> 
        </div>   
       </div>  
     </div>   
     </div>
    <!-- /product slider 1 --> 
      </div>
     </div>
    </div>
      
<div class="container-fluid">
 <div class="row"> 
  <div class="col-lg-12 col-xl-12">
  <!-- product slider 1 -->  
   <div class="pro-flt-main">        
    <div class="pro-spm-txt-m"> 
     <h1>Recommended Items</h1>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
          <?php foreach ($best_deal as $key => $rows) { 
              
              $mackratt = base64_encode($rows['id'] .SALT_KEY.CKRAT_KEY);
          
          ?>
            <div class="item">
             <div class="on-out-pro">   
              <div class="on-out-pro-img snip1252"> 
               <a href="<?= CUSTOM_BASE_URL . 'product-details/'.$mackratt; ?>"  target="_blank"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$rows['image_name']; ?>" alt="onlister"></a>
              </div>
              <a class="on-pro-ou-ab" href="#">
               <h1 class="on-pro-hd-a"><?= $rows['stock_name']; ?></h1>
               <h2 class="on-pro-hd-b"><?= $rows['discount']; ?>% Off</h2>
              </a>
               <div class="on-sh-out"> 
                <div class="pro-price">
                 <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in"><?= $rows['list_price']; ?></span> 
                </div>
               </div>   
             </div>
            </div>
          <?php }?>
          </div>
          <!-- <a class="button secondary playb">Play</a> 
          <a class="button secondary stopb">Stop</a> --> 
          </div> 
        </div>   
       </div>  
     </div>   
     </div>
    <!-- /product slider 1 --> 
      </div>
     </div>
    </div>
    
        <?php if(!empty($item)) {  ?>

  <div class="container-fluid">
 <div class="row"> 
  <div class="col-lg-12 col-xl-12">
  <!-- product slider 1 -->  
   <div class="pro-flt-main">        
    <div class="pro-spm-txt-m"> 
     <h1>Recently Viewed</h1>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
          <?php foreach ($item as $key => $item_rows) { 

            $itemckratt = base64_encode($item_rows['id'] .SALT_KEY.CKRAT_KEY);

            ?>
            <div class="item">
             <div class="on-out-pro">   
              <div class="on-out-pro-img snip1252"> 
               <a href="<?= CUSTOM_BASE_URL . 'product-details/'.$itemckratt; ?>" target="_blank"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$item_rows['image_name']; ?>" alt="onlister"></a>
              </div>
              <a class="on-pro-ou-ab" href="#">
               <h1 class="on-pro-hd-a"><?= $item_rows['stock_name']; ?></h1>
               <h2 class="on-pro-hd-b"><?= $item_rows['discount']; ?>% Off</h2>
              </a>
               <div class="on-sh-out"> 
                <div class="pro-price">
                 <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in"><?= $item_rows['list_price']; ?></span> 
                </div>
               </div>   
             </div>
            </div>
          <?php }?>
          </div>
          <!-- <a class="button secondary playb">Play</a> 
          <a class="button secondary stopb">Stop</a> --> 
          </div> 
        </div>   
       </div>  
     </div>   
     </div>
    <!-- /product slider 1 --> 
      </div>
     </div>
    </div>

  <?php } ?>
      
   <section class="h-shope clearfix">
       
       <div class="combo-hd">
        <h2>Combo Offer</h2> 
       </div>
       
          <div class="owl-carousel owl-carouselb owl-theme">
            <?php foreach ($combo as $key => $combo_rows) { ?>
            <div class="item">
              <a class="clearfix" href="<?= CUSTOM_BASE_URL . 'offers' ?>"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$combo_rows->image; ?>" alt="onlister"></a>
            </div>
          <?php } ?>
          </div>
          <!-- <a class="button secondary playb">Play</a> 
          <a class="button secondary stopb">Stop</a> --> 
   </section>
      
  <section class="best-op-out clearfix">
   <div class="container">
     <div class="best-op-ab">
       <img src="<?php echo base_url();?>assets/images/best-img.jpg">
     </div>
     <div class="row justify-content-center"> 
     <div class="col-9">
     <h3 class="best-txt-ac">Best option for your needs</h3>
     <p class="best-txt-ae">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinction. </p>
    </div>
    </div>
   </div>  
  </section>
      
  <section class="subscri-out-ab clearfix">
    <div class="container">
     <h3>Get 20% Discount</h3>
     <p>Subscribe our newsletter for get notification about new updates,<br>
information discount, etc.</p>
        
    <div class="row justify-content-center">
     <div class="col-11 col-sm-8 col-lg-7">  
      <form class="sub-field-ac">
       <input id="email" class="email" type="text" placeholder="EMAIL ADDRESS">
       <input class="sub" id="subscriber" type="button" value="SUBSCRIBE">  
      </form>
      <div id="sucess"></div>
     </div>
    </div>
        
    </div>  
  </section>
      
 </main>   
 <script type="text/javascript">
  $(document).ready(function () {

   $("#subscriber").click(function () {

       var email =  $("#email").val();

        $.ajax({
              type: 'post',
              url: '<?= CUSTOM_BASE_URL . 'Main/subscribe_create' ?>', //Here you will fetch records 
              data: 'email=' + email , //Pass $id
              success: function (data) {
                  
                if(data==1)
                {

                  $('#sucess').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sucessfully Subscribed</div>");

                }
                else{

                  $('#sucess').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed Subscribed</div>");


                }
              }
          });

    });
}); 
</script>

 <?php include("web/assets/include/footer.php");?>
