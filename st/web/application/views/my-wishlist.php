<?php include("web/assets/include/header-c.php");?>

  <main role="main" class="my-profile-main">
    <div class="container-fluid">    
      <div class="row">
       <!-- Left side -->
        <div class="col-lg-3 col-xl-3">  
            
         <div class="my-profile-left">
             
          <div class="my-name-txt">
            <div class="my-name-pro">
                
         <img class="img-responsive" src="<?= CUSTOM_BASE_URL . 'admin/uploads/profile/'.$profile; ?>"  />
  
            </div>
            <h3 class="my-name"><?= print_r($this->userDetails->user_name); ?></h3>
          </div>
           
          <ul class="my-name-lnk">
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>my-profile">
             <div class="sid-ul-nam">Profile</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>manage-address">
             <div class="sid-ul-nam">Manage Address</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a href="<?= CUSTOM_BASE_URL;?>notification">
             <div class="sid-ul-nam">Notifications</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
           <li>
            <a class="active" href="<?= CUSTOM_BASE_URL. 'wish-list' ?>">
             <div class="sid-ul-nam">My Wishlist</div>   
             <span><img src="<?php echo base_url();?>assets/images/left-arrow.svg"></span>   
            </a>
           </li>
          </ul>
             
          <div class="logout-ab">
            <a href="<?= CUSTOM_BASE_URL. 'user_login/logout' ?>">
            <svg version="1.1" id="Capa_1" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <path style="fill:#1138F7;" d="M255.15,511.15H63.787C28.619,511.15,0,482.53,0,447.362V64.638C0,29.47,28.619,0.85,63.787,0.85H255.15c11.737,0,21.262,9.526,21.262,21.262s-9.526,21.262-21.262,21.262H63.787c-11.716,0-21.262,9.547-21.262,21.262v382.724c0,11.737,9.547,21.262,21.262,21.262H255.15c11.737,0,21.262,9.504,21.262,21.262C276.412,501.645,266.886,511.15,255.15,511.15z"/>
            <path style="fill:#1138F7;" d="M446.512,277.262h-255.15c-11.737,0-21.262-9.504-21.262-21.262
                c0-11.737,9.526-21.262,21.262-21.262h255.15c11.758,0,21.262,9.526,21.262,21.262C467.774,267.758,458.27,277.262,446.512,277.262
                z"/>
            <path style="fill:#1138F7;" d="M361.462,404.837c-5.486,0-10.971-2.126-15.139-6.336c-8.25-8.356-8.165-21.815,0.213-30.065
                L460.46,256L346.536,143.564c-8.377-8.25-8.441-21.709-0.213-30.086c8.229-8.377,21.73-8.441,30.065-0.191l129.276,127.575
                c4.04,3.997,6.336,9.441,6.336,15.139s-2.275,11.12-6.336,15.139L376.388,398.714C372.263,402.796,366.862,404.837,361.462,404.837
                z"/>
            </svg>
             <span>Logout</span>
            </a>
          </div>
             
         </div>

        </div>
        <!-- /Left side -->          
          
        <div class="col-lg-9 col-xl-9">
         <div class="my-profile-right clearfix">
          <div class="mange-add-ac">
           <h2 class="in-heda-ab">My Wishlist</h2>
            <div class="wsh-out-ab">

            <?php foreach ($result as $key => $row) { 
                
                $itemckratt = base64_encode($row['stock_id'] .SALT_KEY.CKRAT_KEY);
            ?>    
             <a id="<?= 'hide_'.$row['stock_id']; ?>" href="<?= CUSTOM_BASE_URL . 'product-details/'.$itemckratt; ?>" class="wsh-in-ac">
              <div class="wsh-in-ad"><img src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$row['image_name']; ?>"></div>
              <div class="wsh-in-ae">
                <div class="wsh-delete-out">
                 <button value="<?= $row['stock_id']; ?>" class="wish-remove wsh-delete-ab">Remove</button>
                </div>
                <h2 class="wsh-had-ab"><?= $row['stock_name']; ?></h2>
                <div class="pro-price">
                Now <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in"><?= $row['list_price']; ?></span> 
                </div>
              </div>
             </a>
            <?php }?>   

            </div>          
          </div>
         </div>  
        </div>
        <!-- /Right side -->
          
      </div>    
    </div> 
        
 </main>  
   <script type="text/javascript">
  $(document).ready(function () {

   $(".wish-remove").click(function () {

       var id =  $(this).val();

        $.ajax({
              type: 'post',
              url: '<?= CUSTOM_BASE_URL . 'Account/remove_wish_list' ?>', //Here you will fetch records 
              data: 'id=' + id , //Pass $id
              success: function (data) {

                $("#hide_"+id).hide();

              }
          });

    });
}); 
</script> 
 <?php include("web/assets/include/footer.php");?>
