<?php include("web/assets/include/header-c.php");?>


  <main role="main" class="pro-details-main">
      
    <div class="container-fluid">

      <div class="row">
      <?php foreach ($offer as $key => $row) { 
          
        $new_date = $row['offer_end'];

        $new_date = date('D M d Y G:i:s',strtotime($new_date)); ?>
        
       <!-- Left side -->
        <div class="col-lg-5 col-xl-5"> 
        

<!-- Sticky section gallery -->
 <div class="fixedsticky">
  <div>
      
      
   <div class="prd-left-main">
       
       <div class="row">
       <div class="col-lg-2 col-xl-2">
          
            <ul class="recent_list">
                <li class="photo_container">
                    <a href="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>" rel="gallerySwitchOnMouseOver: true, popupWin:'<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>', useZoom: 'cloudZoom', smallImage: '<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>'" class="cloud-zoom-gallery">
                        <img itemprop="image" src="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>" class="img-responsive">
                    </a>
                </li>
            </ul> 
      </div>
           
      <div class="col-lg-10 col-xl-10">     
             <div class="gallery-sample">
            <a height="200" width="200" href="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>" class="cloud-zoom" id="cloudZoom">
                <img src="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$row['image']; ?>" class="img-responsive">
            </a>
           </div>      
      </div>
      <div class="col-lg-12 col-xl-12">    
          <div class="prd-control-out">
            <button class="prd-control-add" type="button">Add to cart</button>
            <button value="<?= $row['id']; ?>" id="buynow" class="prd-control-buy" type="button">buy now</button>
          </div>
      </div>       
           
           
    </div>
   </div>
  </div>
</div>

        <!-- /Sticky section gallery -->
   
       </div>
      <!-- /Left side -->       
 
      <!-- right side -->
        <div class="col-lg-7 col-xl-7">
          <div class="prd-right-main clearfix">
            <div class="row">
             <div class="col-sm-9 col-md-9 col-sm-9 col-lg-9 col-xl-9">
               <h1 class="prd-rt-head"><?= $row['caption']; ?></h1>      
             </div>
             <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
               <div class="prd-li-co-out">
                <a class="on-love" href="#"><i class="glyph-icon flaticon-heart-shape-silhouette"></i></a>
               
               </div> 
             </div>   
            </div>
             <div class="row">
             <div class="col-4 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="prd-pri-out">
                  <div class="prd-p"><i class="glyph-icon flaticon-rupee-indian"></i> <span><?= $row['offer_price']; ?></span></div>
                 </div>
                 </div>
                <div class="col-8 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                 <div class="prd-pri-out">
                    <div class="prd-p-rgt">
                      <div class="prd-p-n"><i class="glyph-icon flaticon-rupee-indian"></i> <span><?= $row['actual_price']; ?></span></div>
                      <div class="prd-p-off"><?= $row['discount']; ?>% OFF</div> 
                    </div>
                 </div>
               </div>  
             </div>
             
            <div class="row combo-main15">
            <?php foreach ($row['items'] as $key => $sub) {  
                      
                $itemckratt = base64_encode($sub['id'] .SALT_KEY.CKRAT_KEY); ?>
                
             <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                 <div class="combo-out12">
                  <div class="combo-outimg13">
                    <a href="<?= CUSTOM_BASE_URL . 'product-details/'.$itemckratt; ?>" target="_blank">
                    <img itemprop="image" src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$sub['product_image']; ?>" class="img-responsive"></a>
                  </div>
                  <div class="combo-outtxt14">
                    <?= $sub['stock_name'];?>  
                  </div>
                 </div>
             </div>
             
             <?php } ?>    
         
            </div>
           
             <div class="row mar-top40">
             <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="prd-details-out">
                 <h3 class="font-w400">Time Left :</h3>
                   <div class="prd-de-co"><p style="color:green; font-size:25px;font-weight:bold;" id="demo"></p></div>
                </div>
             </div>
            </div>
            
            <div class="row mar-top40">
             <div class="col-lg-12 col-xl-12">
                <div class="prd-details-out-b">
                 <h3 class="font-w400">Description :</h3>
                   <div class="prd-de-co-b">
                       <p><?= $row['description']; ?></p>
                    </div>
                </div>
             </div>
            </div>
             <div class="prd-tab-out clearfix">
               <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#specification" role="tab">Specification</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-description" role="tab">Product Description</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#more-details" role="tab">More Details</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="specification" role="tabpanel">
                    <div class="prd-tab-content">
                        
                      <div class="prd-tab-con-in">
                        <h3 class="prd-tab-de-h font-w600">Key Feature</h3>
                        <div class="prd-tab-con-a">
                          <h3>Brand</h3>
                          <h4>iVooMi</h4>
                        </div>
                      </div>

                    </div>
                  </div>
                 
                </div> 
            </div>
              
            <div class="prd-rating-out clearfix">
              <h2 class="prd-rating-txt font-w400">Ratings and Reviews</h2>
              <div class="prd-rating-in">
                <div class="prd-rating-in-a">
                  <div class="prd-rating-in-a-a">
                    <div class="prd-rating-m">
                      <form action="" method="post">
                        <p class="clasificacion">
                           <input id="radio1" type="radio" name="estrellas" value="5"><!--
                          --><label for="radio1">&#9733;</label><!--
                          --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                          --><label for="radio2">&#9733;</label><!--
                          --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                          --><label for="radio3">&#9733;</label><!--
                          --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                          --><label for="radio4">&#9733;</label><!--
                          --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                          --><label for="radio5">&#9733;</label>
                        </p>
                      </form>
                    </div>
                  </div>
                 <div class="prd-rating-in-a-b">
                     <div class="prd-rating-in-a-c">
                       <a>12000</a>
                     </div>
                 </div>
                </div>
                <div class="prd-rating-in-b">
                    <div class="prd-progrees-rate-out">
                     <div class="prd-progrees-rate"><i class="glyph-icon flaticon-star"></i> <span>5</span></div>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="prd-at-rate">2645</div>
                    </div>
                    <div class="prd-progrees-rate-out">
                     <div class="prd-progrees-rate"><i class="glyph-icon flaticon-star"></i> <span>4</span></div>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="prd-at-rate">645</div>
                    </div>
                    <div class="prd-progrees-rate-out">
                     <div class="prd-progrees-rate"><i class="glyph-icon flaticon-star"></i> <span>3</span></div>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30"></div>
                     </div>
                     <div class="prd-at-rate">500</div>
                    </div>
                    <div class="prd-progrees-rate-out">
                     <div class="prd-progrees-rate"><i class="glyph-icon flaticon-star"></i> <span>2</span></div>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="prd-at-rate">403</div>
                    </div>
                    <div class="prd-progrees-rate-out">
                     <div class="prd-progrees-rate"><i class="glyph-icon flaticon-star"></i> <span>1</span></div>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="prd-at-rate">74</div>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>
     <!-- /right side -->  

     <?php } ?>        
    </div>     
        
    </div> 
      

      
<div class="container-fluid">
 <div class="row"> 
  <div class="col-lg-12 col-xl-12">
  <!-- product slider 1 -->  
   <div class="pro-flt-main">        
    <div class="pro-spm-txt-m"> 
     <h1>Other Offers</h1>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
              
            <?php foreach ($result as $key => $results) { 

              $oferckratt = base64_encode($results->id .SALT_KEY.CKRAT_KEY); ?>
              
            <div class="item">
             <div class="on-out-pro">   
              <div class="on-out-pro-img snip1252"> 
                  <a href="<?= CUSTOM_BASE_URL . 'offer-details/'.$oferckratt; ?>"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/combo_offer/'.$results->image; ?>" alt="banglure bazaar"></a>
                  
                
              </div>
              
              <a class="on-pro-ou-ab" href="#">
               <h1 class="on-pro-hd-a"><?= $results->caption; ?></h1>
               <h2 class="on-pro-hd-b"><?= $results->discount; ?>% Off</h2>
              </a>
               <div class="on-sh-out"> 
                <div class="pro-price">
                 <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in"><?= $results->offer_price; ?></span> 
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
  <script type="text/javascript">

  $("#buynow").click(function () {
  
  var id = $(this).val();
  
  window.location = '<?= CUSTOM_BASE_URL . "offer-buy-now/" ?>'+id;

});

</script>

 <script>
 
    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo $new_date ?>").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get todays date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "days: " + hours + "h: "
      + minutes + "m: " + seconds + "s ";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Offer Expired";
    
        document.getElementById("buynow").innerHTML = "EXPIRED";
    
        $("#buynow").prop('disabled', true);
      }
    }, 1000);

</script>
 <?php include("web/assets/include/footer.php");?>