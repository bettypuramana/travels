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
 <header class="head-a clearfix">
  <div class="">
   <div class="container-fluid">
     <div class="head-a-in clearfix">

       <div class="hda-r"> 
         <div class="hda-r clearfix">
         <div class="btn-group">
          <div class="dropdown-menu dropdown-menu-right">
            <ul class="pro-tool-drop">  
            
            </ul>    
          </div>
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
      <div class="col-lg-5 col-xl-5 bag-men-ab">
      <div class="hda-nav clearfix">
      <nav class="applePie nav clearfix">
       <div class="menubtn"><i class="glyph-icon flaticon-menu-button"></i></div>
        <ul id="nav" class="clearfix">
            <li><a class="active" href="<?= CUSTOM_BASE_URL;?>">Home</a></li>
            <li><a href="#">Products</a>
              <ul class="menu-f-w">
               <!--- Hide on small screen --->    
               <div class="container-fluid had-non-s">   
               <div class="row">
                 <?php foreach ($cat_list as $catLists) { ?>
                <div class="col-12 col-lg-2 col-lg-2 col-xl-2 menu-fw-out">
                   <div class="menu-fw-in">
                  
                     <div class="menu-s-l pieCollapse">
                        <li><a href="<?= CUSTOM_BASE_URL. 'product-list/'.$catLists['cat_id'] ?>"><?php if($catLists['parent_id']==0) { echo '<b>'.$catLists['cat_name'].'</b>'; } else { echo $catLists['cat_name']; } ?></a></li>
                     </div>
                      
                   </div>
                </div>
                <?php } ?>
                </div>    
               </div>
             <!--- /Hide on small screen --->   
                 
              <!--- /Show on small screen --->
              </ul>            
            </li>
            <li><a href="<?= CUSTOM_BASE_URL;?>contact">Contact Us</a></li>
            <li><a href="<?= CUSTOM_BASE_URL;?>offers">Offers</a>
              <ul>
                <?php foreach ($list as $key => $cat_row) { ?>
                  <li><a href="<?= CUSTOM_BASE_URL . 'offers-category/'.$cat_row->cat_id; ?>"><?= $cat_row->cat_name; ?></a></li> 
                <?php  } ?>
               
              </ul>
            </li>
            
        </ul>
       </nav>
     </div>   
       </div>
       <div class="col-10 col-sm-11 col-lg-3 col-xl-3">
        <div class="hda-search">
          <form name="search" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'search' ?>">
           <button class="hd-sub" type="submit"><i class="glyph-icon flaticon-magnifying-glass"></i></button>   
           <input id="search" class="hd-sea" type="text" name="search" placeholder="Search for Products">
          </form> 

          <div id="key_display"></div>
          
        </div>
       </div>
       <div class="col-2 col-sm-1 col-lg-1 col-xl-1">
        <a class="hda-cart" href="<?= CUSTOM_BASE_URL;?>view-cart">
            <div class="hda-cart-ab"><img src="<?php echo base_url();?>assets/images/cart.svg"></div>
            <span>0</span>
        </a>
       </div>
      </div>
     </div>
    </div>
   </div>
     

 </header>   
 <!--- Header end---> 

<script src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script> 
         
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
</script>
      
