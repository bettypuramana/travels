<?php include("web/assets/include/header-c.php");?>

  <main role="main" class="my-profile-main">
    <div class="container-fluid">    
      <div class="row">
       <!-- Left side -->
        <div class="col-lg-3 col-xl-3">  
            
         <div class="my-profile-left">
                
          <ul class="my-name-lnk">
           <li>
            <a class="active" href="">
             <div class="sid-ul-nam">Stores</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>contact">
             <div class="sid-ul-nam">Contact Us</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>customer-care">
             <div class="sid-ul-nam">24 X 7 Customer Care</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
          </ul>
             
         </div>

        </div>
        <!-- /Left side -->          
          
        <div class="col-lg-9 col-xl-9">
         <div class="my-profile-right clearfix">
          <div class="mange-add-ac">
           <h2 class="in-heda-ab">Stores</h2>
            <div class="stores-out12">
             <div class="row">
                 
            <?php foreach ($store_list as $key => $store_rows) {  
                
                $stckratt = base64_encode($store_rows->id .SALT_KEY.CKRAT_KEY);
            
            ?>
            
              <div class="col-lg-6 col-xl-6">
                  <div class="str-con-out">
                     <div class="sto-img13" style="background-image: url(<?= CUSTOM_BASE_URL . 'admin/uploads/store/crop/'.$store_rows->image; ?>);">
                     </div>
                     <div class="sto-txt14">
                       <h2>Banglure bazaar - <?= $store_rows->location ?></h2>
                       <a class="transition sto-deta15" href="<?= CUSTOM_BASE_URL . 'store-details/'.$stckratt; ?>">View details</a>
                     </div>
                  </div>  
              </div>
                 
            <?php } ?>
 
             </div>
            </div>       
          </div>
         </div>  
        </div>
        <!-- /Right side -->
          
      </div>    
    </div> 
        
 </main>    
 <?php include("web/assets/include/footer.php");?>
