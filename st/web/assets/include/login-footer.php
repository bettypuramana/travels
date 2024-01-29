   <!-- My Register model-->
<div class="modal fade bd-example-modal-lg" id="my-register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content my-act-modal">
    <button type="button" class="close my-cart-close" data-dismiss="modal" aria-label="Close">
     <span class="glyph-icon flaticon-cancel"></span>
    </button>
      <div class="modal-body-my-act">
        <div class="my-act-lft my-act-lft2">
          <div class="my-act-lft-a">  
            <h3>Signup</h3>
            <h4>Signup to use your Bangalore Bazzar account</h4>
          </div>
        </div>
        <div class="my-act-rgt">
         <div class="my-act-rgt-a">
          <div class="my-act-rgt-a-r">
           <h4>Phone Number and Password to Signup</h4>
          </div>
          <div class="my-act-rgt-a-l">
           <div class="my-act-qr">
              <input name="new_mobile_number" id="new_mobile_number" type="text" class="form-control log-fi12" placeholder="New Mobile Number"/>
           <p style="color:orange;" class="help-block error-info" id="newmobileErr"></p>
           <input  name="new_password" id="new_password" type="password" class="form-control log-fi12" placeholder="Set Password"/> 
           <p style="color:orange;" class="help-block error-info" id="newpasswordErr"></p>


          <div style="color:green;" id="sign_msg"></div>
          <div style="color:orange;" id="sign_msg_wrong"></div>

          <button id="new-password-login" type="submit"  class="btn btn-primary btn-block log13">SignUp</button>
           </div> 
          </div>

         </div> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- My account model-->  
   
   <footer class="foot-out">
    
    <div class="foot-ab">
    <div class="container-fluid">
    <div class="row">
     <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
       <div class="ft-mn-a">
         <h3 >Bangalore Bazaar</h3>
         <ul class="ft-mn-sd">
          <li><a href="<?= CUSTOM_BASE_URL;?>">Home</a></li>
          <li><a href="All Products.php">All Products</a></li>
          <li><a href="<?= CUSTOM_BASE_URL;?>offers">Offers</a></li>  
          <li><a href="<?= CUSTOM_BASE_URL;?>career">Careers</a></li>
         </ul>
       </div> 
     </div>
     <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
       <div class="ft-mn-a ft-mn-b">
         <h3>Get to Know Us</h3>
         <ul class="ft-mn-sd ft-mn-bo">
          <li><a href="<?= CUSTOM_BASE_URL;?>contact">Contact Us</a></li>
          <li><a href="<?= CUSTOM_BASE_URL;?>about">About Us</a></li>
          <li><a href="Privacy.php">Privacy</a></li>
         </ul>
       </div> 
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
         <div class="foot-pay clearfix">
           <h3>Payment Method</h3>
           <ul class="clearfix">
            <li><img src="<?php echo base_url();?>assets/images/payment-img_1.jpg"></li>
            <li><img src="<?php echo base_url();?>assets/images/payment-img_2.jpg"></li>
            <li><img src="<?php echo base_url();?>assets/images/payment-img_3.jpg"></li>

           </ul>
         </div>  
     </div>
     <div class="col-sm-6 col-md-3 col-lg-5 col-xl-5">
         <div class="foot-social">
          <h3>Social Media</h3>
          <ul>
           <li><a class="fac" href="#"><i class="glyph-icon flaticon-facebook-logo"></i></a></li>
           <li><a class="you" href="#"><i class="glyph-icon flaticon-social-media-7"></i></a></li> 
           <li><a class="twi" href="#"><i class="glyph-icon flaticon-twitter-logo-silhouette"></i></a></li> 
          </ul>
         </div>
    </div>   
    </div>     
    </div>
    </div>   
       
       <div class="foot-bot-ab">
        <div class="copy-foot">
          © 2019 Banglore Bazar. All Rights Reserved | <a href="#" target="_blank">Design & Technology Akinoz</a> 
        </div>
       </div> 
       
   </footer>



    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.slim.min.js"></script>
  <!--  <script>window.jQuery || document.write('<script src="../../js/jquery-1.12.4.js"><\/script>')</script>-->


    <script src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script> 
    <script>

$(function () {

  $('#password-login').on('click', function (e) {

    var mobile_number = $('#mobile_number').val();

    var password = $('#password').val();

   if (mobile_number == ''  )
   {
      document.getElementById("mobile_number_Err").innerHTML = "The field is required"; 
      status=false; 
   }
   else {
      document.getElementById('mobile_number_Err').innerHTML = "";
   }

  if (password == ''  )
   {
      document.getElementById("password_Err").innerHTML = "The field is required"; 
      status=false; 
   }
   else {
      document.getElementById('password_Err').innerHTML = "";
   }
    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?= CUSTOM_BASE_URL;?>User_login/login_password',
      data: 'mobile_number=' + mobile_number + '&password=' + password,

      success: function (data) {

        if(data==1) {

            window.location = '<?= CUSTOM_BASE_URL?>';
                
        }

        else{

          document.getElementById("pass_msg").innerHTML = 'user name or password are incorrect';

        }          
      }

    });

  });

});

</script>

 <script>

 $(function () {

  $('#new-password-login').on('click', function (ee) {

    var phone = $('#new_mobile_number').val();

    var pass = $('#new_password').val();


   if (phone == ''  )
   {
      document.getElementById("newmobileErr").innerHTML = "The field is required"; 
      status=false; 
   }
   else {
      document.getElementById('newmobileErr').innerHTML = "";
   }

  if (pass == ''  )
   {
      document.getElementById("newpasswordErr").innerHTML = "The field is required"; 
      status=false; 
   }
   else {
      document.getElementById('newpasswordErr').innerHTML = "";
   }
    ee.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?= CUSTOM_BASE_URL;?>User/index',
      data: 'phone=' + phone + '&pass=' + pass,

      success: function (data) {

        if(data==1) {

          document.getElementById("sign_msg").innerHTML = 'User Sucessfully Sign In';              
        }

        if(data==2) {

          document.getElementById("sign_msg_wrong").innerHTML = 'User Already Registered';              
        }

        else{

          document.getElementById("sign_msg_wrong").innerHTML = '';

        }          
      }

    });

  });

});

 </script>

    <script>
    $(document).ready(function(){
      $("#hide").click(function(){
        $("p").hide();
      });
      $("#show").click(function(){
        $("p").show();
      });
    });
    </script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    <script src="<?php echo base_url();?>assets/js/holder.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/js/drop.js"></script>

  </body>
</html>


 