<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>assets/images/fav.png">
    <title>Bangalore Bazaar</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/banglore-bazaar.css" rel="stylesheet">

  </head>
  <body>

 <!--- Header start--->
 <header class="head-a clearHeader clearfix">
  <div class="">
   <div class="container-fluid">
       
     <div class="head-a-in clearfix">
      <div class="head-cu12"><i> <img src="<?php echo base_url();?>assets/images/customer.svg"></i>Customer Care: <a href="tel:+91-9544 33 33 81">+91-9544 33 33 81</a></div>
       <div class="hda-r"> 
         <div class="hda-r clearfix">
         <div class="btn-group">

          <?php $session_data=$this->session->userdata('userDetails');?>

           <?php if(empty($session_data->id)) { ?>

         <button type="button" class="hda-ma" data-toggle="modal" data-target="#my-account"><i class="glyph-icon flaticon-user"></i>Login & Signup</button>
         <?php } else{ ?>  
             
          <button type="button" class="log-pro dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $session_data->phone;?>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <ul class="pro-tool-drop">  
             <li><a href="<?= CUSTOM_BASE_URL;?>my-profile">My Profile</a></li>
             <li><a href="<?= CUSTOM_BASE_URL. 'my-order' ?>">Order</a></li>
             <li><a href="<?= CUSTOM_BASE_URL. 'wish-list' ?>">Wish list</a></li>
             <li><a href="<?= CUSTOM_BASE_URL. 'user_login/logout' ?>">Logout</a></li>
            </ul>    
          </div>
           <?php } ?> 
         </div>  
<!--          <button type="button" class="hda-ma" data-toggle="modal" data-target="#my-account"><i class="glyph-icon flaticon-user"></i>My Account</button>-->
         </div>
       </div> 
     </div>
       
     
   
       
     <div class="">
      <div class="row">
       <div class="col-lg-3 col-xl-3 hda-lg-out">
         <a href="<?= CUSTOM_BASE_URL;?>" class="hda-s-logo">
           <img src="<?php echo base_url();?>assets/images/logo.png" alt="onlister">  
         </a>
       </div>
      <div class="col-lg-5 col-xl-5">
        <div class="hda-search">
          <form autocomplete="off" name="search" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'product-list' ?>">
           <button class="hd-sub" type="submit"><i class="glyph-icon flaticon-magnifying-glass"></i></button>   
           <input id="search" class="hd-sea" type="text" name="search" placeholder="Search for Products">
          </form> 

          <div id="key_display"></div>
          
        </div>
       </div>
       <div class="col-10 col-sm-11 col-lg-3 col-xl-3">
        <ul class="head-top12">
          <li><a href="<?= CUSTOM_BASE_URL . 'product-list'; ?>">Products</a></li>
          <li><a href="<?= CUSTOM_BASE_URL;?>contact">Contact Us</a></li>
          <li><a href="<?= CUSTOM_BASE_URL;?>store-list">Store</a></li>
        </ul>
       </div>
       <div class="col-2 col-sm-1 col-lg-1 col-xl-1">
        <a class="hda-cart" href="<?= CUSTOM_BASE_URL;?>view-cart">
            <div class="hda-cart-ab"><img src="<?php echo base_url();?>assets/images/cart.svg"></div>
            <span><?= $cart_count;?></span>
        </a>
       </div>
      </div>
     </div>
     
     
    </div>
   </div>
     
<div class="menu-out12">
      <div class="col-lg-12 col-xl-12 bag-men-ab">
      <div class="hda-nav clearfix">
      <nav class="applePie nav clearfix">
       <div class="menubtn"><i class="glyph-icon flaticon-menu-button"></i></div>
        <ul id="nav" class="clearfix">
            <?php foreach ($main_category as $key => $main_cat_row) { 
                
                $mainmackratt = base64_encode($main_cat_row['cat_id'] .SALT_KEY.CKRAT_KEY);
            ?>
           <li><a class ="outer" sectionId="<?= $main_cat_row['cat_id'] ?>" href="<?= CUSTOM_BASE_URL . 'product-list/'.$mainmackratt; ?>"><?= $main_cat_row['cat_name']; ?></a>
              <ul id="<?= "output_".$main_cat_row['cat_id'] ?>">
               <!--- Hide on small screen --->    

         

             <!--- /Hide on small screen --->   
                 
              <!--- /Show on small screen --->
              </ul>            
            </li>
             <?php } ?>
            <li><a href="<?= CUSTOM_BASE_URL;?>offers">Offer Zone</a>
              <ul>
                <?php foreach ($list as $key => $cat_row) { 
                    
                    $offermackratt = base64_encode($cat_row->cat_id .SALT_KEY.CKRAT_KEY);
                
                ?>
                  <li><a href="<?= CUSTOM_BASE_URL . 'offers-category/'.$offermackratt; ?>"><?= $cat_row->cat_name; ?></a></li> 
                <?php  } ?>
               
              </ul>
            </li>


        </ul>
       </nav>
     </div>   
       </div>
       </div>


 </header>   
 <!--- Header end---> 

<script src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script> 

<script type="text/javascript">

$( ".outer" ).mouseover(function() {

  var rowid = $(this).attr('sectionId');

   $.ajax({
        type: 'post',
        url: '<?= CUSTOM_BASE_URL . 'Main/get_sub_category' ?>', //Here you will fetch records 
        data: 'rowid=' + rowid, //Pass $id
        success: function (data) {

           $("#output_"+rowid).html(data);

        }
  });

});

</script>
         
 <script type="text/javascript">

  function fill(value) {

   $('#search').val(value);

   //Hiding "display" div in "search.php" file.
 
   $('#key_display').hide();

   if (value) {

    document.search.submit();

    }
 
}

   $(document).ready(function() {
  
       $("#search").keyup(function() {
      
           var name = $('#search').val();
    
           if (name == "") {
      
               $("#key_display").html("");
     
           }
      
           else {
      
               $.ajax({
      
                   type: "POST",
     
                   url: '<?= CUSTOM_BASE_URL;?>Main/list_item',
       
                   data: {
      
                       search: name
     
                   },
      
                   success: function(html) {
    
                       $("#key_display").html(html).show();
     
                   }
     
               });
     
           }
     
       });

   });

$(document).on('click', function (e) {
    
    if ($(e.target).closest("#key_display").length === 0) {
        $("#key_display").hide();
    }
    
});
</script>
      
