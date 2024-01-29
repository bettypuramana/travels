<?php include("web/assets/include/header-c.php");?>

  <main role="main" class="filter-main">
    <div class="container-fluid">    
      <div class="row">
 
            
        <div class="col-lg-12 col-xl-12">
          <div class="flt-right-main clearfix">
           <h2 class="fil-head-txt">offers</h2>
              
            <!-- Nav tabs -->
            <div class="product-nav">             
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#popularity" role="tab">Popularity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#low-high" role="tab">Low to High</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#high-low" role="tab">High to Low</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#newest-first" role="tab">Newest First</a>
              </li>
            </ul>
            <!-- /Nav tabs -->

        <!-- Tab panes -->
        <div class="tab-content clearfix">
         <div class="tab-pane active" id="popularity" role="tabpanel">
           <div class="flt-tab-out">
            <div class="flt-pro-out clearfix"> 
              <?php foreach ($result as $key => $row) { 
                  
                  $oferckratt = base64_encode($row->id .SALT_KEY.CKRAT_KEY); ?>
                  
              <div class="flt-pro-box">
                <a class="flt-pro-img" href="<?= CUSTOM_BASE_URL . 'offer-details/'.$oferckratt; ?>"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row->image; ?>" alt="onlister"></a>
                <div class="flt-cont-out">
                 <div class="flt-cont-price">
                   <div class="flt-p-out"> 
                    <div class="flt-p"><i class="glyph-icon flaticon-rupee-indian"></i> <span><?= $row->offer_price;?></span></div>
                   </div>
                 </div>
                <a class="flt-img-txt-out" href="#">
                 <h1 class="flt-img-txt"><?= $row->caption;?></h1>
                 <h2 class="flt-img-txt-b flt-img-txt-bb">Extra <?= $row->discount;?>% off</h2>
                </a>

                </div>
              </div> 
             <?php } ?>
            </div>
          </div>
        </div>
                  
      </div>  
    <!-- /Tab panes -->             
    </div>              
            
          </div>  

        </div>
       <!-- /Left side -->    
      </div>
        
        
    </div> 
      

      
<div class="container-fluid">
 <div class="row"> 
  <div class="col-lg-12 col-xl-12">
  <!-- product slider 1 -->  
   <div class="pro-flt-main">        
    <div class="pro-spm-txt-m"> 
      <h1><?php if(isset($title)) { echo $title; } ?></h1>
     <a href="#">View All</a>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
           <?php foreach ($item as $key => $rows) { 
           
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
 </main>    
<?php include("web/assets/include/footer.php");?>
