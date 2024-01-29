<?php include("web/assets/include/header-c.php");?>

  <main role="main" class="cart-main">

    <?php  if(!empty($result)) { ?>
      
    <div id="you" class="container-fluid">
     
      <div class="row">

       <!-- Left side -->
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8"> 
         <div class="crt-left-main">
           <div class="col-lg-12 col-xl-12">   
           <h2 class="crt-head-txt">Total Cart</h2>
  <section class="shopping-cart">
    <div class="ui-list shopping-cart--list" id="shopping-cart--list">

      <div id="shopping-cart--list-item-template">
        <?php foreach ($result as $key => $row) { 
            
            $itemckratt = base64_encode($row['id'] .SALT_KEY.CKRAT_KEY);
        
        ?>
        <div class="_grid shopping-cart--list-item">
          <div class="cart-img-out">
             <a href="<?= CUSTOM_BASE_URL . 'product-details/'.$itemckratt; ?>" target="_blank"><img class="product-image--img" src="<?= CUSTOM_BASE_URL . 'admin/uploads/product_multimage/'.$row['image']; ?>" alt="Item image" /></a>
          </div>
          <div class="_column crt-product-info">
            <h4 class="product-name font-w600"><?= $row['stock_name']; ?></h4>
            <br>
          <div class="crt-price product-single-price font-w600">₹ <?= $row['list_price']; ?></div>
            <button value="<?= $row['id']; ?>" class="_btn entypo-trash product-remove">Remove</button>
          </div>
          <div class="crt-product-col _column product-modifiers" data-product-price="<?= $row['list_price']; ?>">
            <div class="_grid">
              <button id="product-subtract<?= $row['id']; ?>" class="_btn _column product-subtract" onclick="myFunctionSub(<?= $row['id']; ?>)">&minus;</button>
              <div class="_column product-qty"><?= $row['qty']; ?></div>
              <button id="product-plus<?= $row['id']; ?>" class="_btn _column product-plus" onclick="myFunction(<?= $row['id']; ?>)">&plus;</button>
              </div>
            <div class="price product-total-price">₹ <?= $row['list_price'] * $row['qty'] ; ?></div>
          </div>
        </div>

         <input type="hidden" name="stock_qty[]" id="key_qty" value="1">   

      <?php } ?>
      </div>
    </div>

  </section>  
          </div>  
         </div>
       </div>
      <!-- /Left side -->       
 
      <!-- right side -->
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
            
          <div class="crt-right-main clearfix">
            <div class="col-lg-12 col-xl-12 crt-i-sticky">
    <div class="crt-cart-totals">
     <div class="_grid cart-totals">
      <div class="_column subtotal" id="subtotalCtr">
        <div class="cart-totals-key">Subtotal</div>
        <div class="cart-totals-value">₹ <?= $row['sub_total']; ?></div>
      </div>
      <div class="_column shipping" id="shippingCtr">
        <div class="cart-totals-key">Shipping</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column taxes" id="taxesCtr">
        <div class="cart-totals-key">Taxes (0%)</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column total" id="totalCtr">
        <div class="cart-totals-key">Total</div>
        <div class="cart-totals-value">₹ <?= $row['sub_total']; ?></div>
      </div>
      <div class="_column checkout">
        <a href="<?= CUSTOM_BASE_URL ?>" class="_btn-b checkout-btn entypo-forward">Continue Shopping</a>
        <a href="<?= CUSTOM_BASE_URL;?>checkout" class="_btn checkout-btn entypo-forward">Checkout</a>
      </div>
    </div>
   </div>
         </div>
        </div>
      </div>
     <!-- /right side --> 
   
    </div> 

  </div>

  <?php } else { ?>

    <div id="me" class="container-fluid">

     <div class="row justify-content-center">
       <div class="col-md-6">
         <div class="cart-em12">
           <img src="<?php echo base_url();?>assets/images/cart-empty.jpg">
         </div>
      </div> 
         
         </div>

   </div>

      <?php } ?>
 
 </main> 



 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function () {

   $(".product-remove").click(function () {

       var id =  $(this).val();

        $.ajax({
              type: 'post',
              url: '<?= CUSTOM_BASE_URL . 'Account/remove_cart_list' ?>', //Here you will fetch records 
              data: 'id=' + id , //Pass $id
              success: function (data) {

                if(data==0)
                {
                  location.reload();

                }

              }
          });

    });
}); 
</script> 
<script type="text/javascript">
  
  function myFunction(id) {
        
    var qtyCtr = $('#product-plus'+id).prev(".product-qty"),
    quantity = parseInt(qtyCtr.html(), 10)+1;

    var stock_id = id;

    $.ajax({
              type: 'post',
              url: '<?= CUSTOM_BASE_URL . 'Account/add_cart_order' ?>', //Here you will fetch records 
              data: 'quantity=' + quantity + '&stock_id=' + stock_id, //Pass $id
              success: function (data) {

              }
          });
  }
</script>

<script type="text/javascript">
  
  function myFunctionSub(id) {
        
    var qtyCtr = $('#product-subtract'+id).next(".product-qty"),
    quantity = parseInt(qtyCtr.html(), 10)-1;

    var stock_id = id;

    $.ajax({
              type: 'post',
              url: '<?= CUSTOM_BASE_URL . 'Account/add_cart_order' ?>', //Here you will fetch records 
              data: 'quantity=' + quantity + '&stock_id=' + stock_id, //Pass $id
              success: function (data) {

              }
          });
  }
</script>
 <?php include("web/assets/include/footer.php");?>
