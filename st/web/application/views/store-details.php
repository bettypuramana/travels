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
             <div class="sid-ul-nam">Banglore bazaar Kannur</div>   
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
        <?php foreach ($store_list as $key => $store_rows) { ?>
           <h2 class="in-heda-ab">Banglore bazaar <?= $store_rows->location ?></h2>
            <div class="str-dts-out12">
             <div class="row">
                 
              <div class="col-md-6 col-lg-6 col-xl-6">
                  <div class="brch-img12">
                      <img src="<?= CUSTOM_BASE_URL . 'admin/uploads/store/'.$store_rows->og_image; ?>" alt="banglore bazaar">
                  </div>  
              </div>
                 
              <div class="col-md-6 col-lg-6 col-xl-6">
                  <div class="str-deta-con13">
                      
                   <div class="str-abt14"><?= $store_rows->description ?></div>
                   <div class="ma-con-add-ab">
                    <i class="glyph-icon flaticon-signs-1"></i> 
                    <div class="ma-spm-ac">Sagittis hendrerit, Morbi pharetra luctus, Vivamus est lectus, Proin congue augue finibus, Kerala- 673572.</div>
                   </div>
                   <div class="ma-con-add-ab">
                    <i class="glyph-icon flaticon-technology"></i> 
                    <div class="ma-spm-ac"><a href="tel:+91-0000 00 00 00">+91-0000 00 00 00</a></div>
                   </div>
                   <div class="ma-con-add-ab">
                    <i class="glyph-icon flaticon-technology"></i> 
                    <div class="ma-spm-ac"><a href="tel:+91-9744 212 789">+91-0000 000 000</a></div>
                   </div>
                   <div class="ma-con-add-ab">
                    <i class="glyph-icon flaticon-contact"></i> 
                    <div class="ma-spm-ac"><a href="mailto:info@banglorebazaar.org">info@banglorebazaar.org</a></div>
                   </div>
                  </div>  
              </div>

              <div class="col-lg-12 col-xl-12">
                <div class="str-de-map15">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31236.406224143775!2d75.3523532164014!3d11.866685810306885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba422b9b2aca753%3A0x380605a11ce24f6c!2sKannur%2C+Kerala!5e0!3m2!1sen!2sin!4v1554872745073!5m2!1sen!2sin"   frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> 
              </div>

                 
 
             </div>
            </div>  
            <?php } ?>
          </div>
         </div>  
        </div>
        <!-- /Right side -->
          
      </div>    
    </div> 
        
 </main>    
 <?php include("web/assets/include/footer.php");?>
