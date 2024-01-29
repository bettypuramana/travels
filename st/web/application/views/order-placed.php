<?php include("web/assets/include/header-c.php");?>

<main role="main" class="order-placed-main">
    
  <?php foreach ($cart_list as $key => $cat_row) { ?> 

 <div class="container">
   <div class="order-out-ab">
    <div class="row">
     <div class="col-12">   
      <div class="about-time-order-ab">Thankyou... Delivery expected by Mon, Feb 18th 19</div> 
     </div>
    </div>
       
    <div class="row justify-content-center">
        <div class="col-12">
         <div class="delivery-ac">
           <h2>Delivery Address</h2>
           <?php foreach ($cat_row['address'] as $key => $delivery_row) { ?> 
           <h3 class="add-me-ae"><?= $delivery_row['name']; ?></h3>
           <h4 class="add-ph-ae"><span>Phone:</span><?= $delivery_row['phone']; ?></h4>
           <p class="add-af"><?= $delivery_row['address']; ?> , 
          <span>Pin:</span><?= $delivery_row['pincode']; ?></p>
         <?php } ?>
        </div>
        </div>    
    </div>
      <?php foreach ($cat_row['order_sub'] as $key => $order_sub_row) { ?> 
    <a class="order-link-ab clearfix" href="#">
    <div class="row justify-content-center"> 
     <div class="col-11">
      <div class=" orde-cnt-ab-out">  
       <div class="orde-img-ab">
        <img src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$order_sub_row['image_name']; ?>"> 
       </div>   
       <div class="orde-cnt-ab">
        <h2><?= $rows['stock_name']; ?></h2>
        <h3><i class="glyph-icon flaticon-rupee-indian"></i><?= $order_sub_row['sub_total'] * $order_sub_row['qty']; ?></h3>
       </div>   
     </div>
     </div>
    </div>
    </a>
  <?php } ?>
       
    <div class="row justify-content-center"> 
     <div class="col-11">
       <div class="orde-total-ab">
        <h3>Total <i class="glyph-icon flaticon-rupee-indian"></i><?= $cat_row['total_amt']; ?></h3>
       </div>   
     </div>
    </div>   
       
   </div>
 </div>
<?php } ?>
    
</main>

 <?php include("web/assets/include/footer.php");?>
 
 <script type="text/javascript">
 $(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images
 history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
});

</script>
