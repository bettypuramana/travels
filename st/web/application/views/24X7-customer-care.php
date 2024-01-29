<?php include("web/assets/include/header-c.php");?>

  <main role="main" class="my-profile-main">
    <div class="container-fluid">    
      <div class="row">
       <!-- Left side -->
        <div class="col-lg-3 col-xl-3">  
            
         <div class="my-profile-left">
                
          <ul class="my-name-lnk">
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>contact">
             <div class="sid-ul-nam">Contact Us</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a class="active" href="<?= CUSTOM_BASE_URL;?>customer-care">
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
           <h2 class="in-heda-ab">24 X 7 Customer Care</h2>
            <div class="customer_out-ab">
             <div class="row">
              <div class="col-lg-6 col-xl-6">
               <div class="ma-con-out">
                <p>Bangalore Bazaar has a dedicated customer care department that addresses all kinds of customer issues and queries.<br>
                    Please call our 24x7 customer care centre on the following number.<br><br></p>
                <div class="custe-num-ad">Customer Care No: <a href="#">+91-9544 33 33 81</a></div>  


               </div>  
              </div>
              <div class="col-lg-6 col-xl-6">
               <div class="contact-map-ab">   
                <img src="<?php echo base_url();?>assets/images/24x7customer.jpg" style="max-width:100%;">
               </div>
              </div>   
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
