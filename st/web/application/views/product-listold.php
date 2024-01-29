<?php include("web/assets/include/header-c.php");?>
  <main role="main" class="filter-main">
    <div class="container-fluid">    
      <div class="row">
       <!-- Left side -->
        <div class="col-lg-3 col-xl-3">

<div class="flt-left-main">
  <a href="#flt-toggle-menu" id="flt-toggle"><span></span><h1>Category Filters</h1></a>
    <div id="flt-toggle-menu">
   
          <div class="flt-out-m">   
           <h1 class="flt-cate-txt had-non-s">Category Filters</h1>
              
      <ul id="accordion" class="flt-accordion">
		<li class="default open">
           
			<ul class="submenu">
				 <?php foreach ($category as $key => $categorys) {  ?>
				<li><a href="<?= CUSTOM_BASE_URL. 'product-list/'.$categorys->cat_id; ?>"><?= $categorys->cat_name;?></a></li>
         <?php } ?>
			</ul>
		</li>
		<li class="default open">
			<div class="link"><a>Price</a><i class="glyph-icon flaticon-down-arrow fa-chevron-down"></i></div>
			<ul class="submenu submenu2">
                  <section class="range-slider" id="facet-price-range-slider" data-options='{"output":{"prefix":"₹"},"maxSymbol":"+"}'>
                    <?php foreach ($price_range as $key => $ranges) {  ?>
                   <input name="range-1" value="<?= $ranges->SmallestPrice;?>" min="<?= $ranges->SmallestPrice;?>" max="<?= $ranges->LargestPrice;?>" step="1" type="range">
                    <input name="range-2" value="<?= $ranges->LargestPrice;?>" min="<?= $ranges->SmallestPrice;?>" max="<?= $ranges->LargestPrice;?>" step="1" type="range">
                    <?php } ?>
                  </section>
			</ul>
		</li>

         <?php foreach ($option as $key12 => $options) {  ?>
   <form id="formName1" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'filter-list' ?>">

    <li class="default open">
            <div class="link"><a href="Brand.html"><?= $options['name']; ?></a><i class="glyph-icon flaticon-down-arrow fa-chevron-down"></i></div>
      <ul class="submenu">
        <div class="flt-search-out">
                    <table class="table flt-table">
                      <tbody>
                        <?php foreach ($options['option_var'] as $key => $opt_vars) {  ?>
                        <tr>
                          <td width="20">
                            <label class="flt-con">
                             <input <?php if(isset($option_chks[$key12])) {  if($option_chks[$key12] == $opt_vars['opt_var_id']) {echo "checked";} } ?> type="checkbox" name="chk_option[]" id="ftr_checkbox" value="<?= $opt_vars['opt_var_id']; ?>" onchange="document.getElementById('formName1').submit()">
                             <span class="checkmark"></span>
                            </label> 
                          </td>
                          <td><?= $opt_vars['type_name']; ?></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                     </table>
                      </form>
                     <div class="flt-see-all"><a href="See all 345 Quantity.html">See all 345 Brand >></a></div>
                </div>
      </ul>
    </li>
    <?php } ?>  


    <?php foreach ($feature as $key => $features) {  ?>
		<li class="default open">
            <div class="link"><a href="Brand.html"><?= $features['name']; ?></a><i class="glyph-icon flaticon-down-arrow fa-chevron-down"></i></div>
			<ul class="submenu">
				<div class="flt-search-out">
                 <input class="flt-sear-in-a" type="text" placeholder="Search Brand">
                  <form id="formName" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'filter-list' ?>">
                    <table class="table flt-table">
                      <tbody>
                        <?php foreach ($features['feature_var'] as $keys => $feature_vars) {  ?>
                        <tr>
                          <td width="20">
                            <label class="flt-con"> 
                             <input <?php if(isset($feature_chks[$keys])) {  if($feature_chks[$keys] == $feature_vars['f_var_id']) {echo "checked";} } ?> type="checkbox" name="feature[]" id="ftr_checkbox" type="checkbox" value="<?= $feature_vars['f_var_id']; ?>" onchange="document.getElementById('formName').submit()">
                             <span class="checkmark"></span>
                            </label> 
                          </td>
                          <td><?= $feature_vars['variants_name']; ?></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                     </table>
                      </form>
                     <div class="flt-see-all"><a href="See all 345 Quantity.html">See all 345 Brand >></a></div>
                </div>
			</ul>
		</li>
    <?php } ?>  
     
		<li>
      <div class="link"><a href="Bath and Spa.html">Availability</a><i class="glyph-icon flaticon-down-arrow fa-chevron-down"></i></div>
			<ul class="submenu">
              <div class="">
                  <div class="flt-check-out">
                      <label class="flt-con"> 
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      <span>Include Out of Stock</span>
                  </div>
                </div>
			</ul>
		</li>          
	</ul>  
 </div>       
</div>
  </div>
    </div>
            
        <div class="col-lg-9 col-xl-9">
          <div class="flt-right-main clearfix">
           <h2 class="fil-head-txt">Personal Care</h2>
              
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
       
             <!--- box 1 --->
             <?php foreach ($result as $key => $row) { ?>
              <div class="flt-pro-box">
                <a class="flt-pro-img" href="<?= CUSTOM_BASE_URL . 'product-details/'.$row['id']; ?>"><img src="<?= CUSTOM_BASE_URL .'admin/uploads/product_multimage/'.$row['image_name']; ?>" alt="onlister"></a>
                <div class="flt-cont-out">
                 <div class="flt-cont-price">
                   <div class="flt-p-out"> 
                    <div class="flt-p"><i class="glyph-icon flaticon-rupee-indian"></i> <span><?= $row['list_price']; ?></span></div>
                   </div>
                 </div>
                <a class="flt-img-txt-out" href="#">
                 <h1 class="flt-img-txt"><?= $row['stock_name'];?></h1>
                 <h2 class="flt-img-txt-b">Extra 5% off</h2>
                </a>
                </div>
              </div> 
            <?php } ?>
            
             
             <!--- /box 1 --->   
            
                  
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
     <h1>Recently Viewed</h1>
     <a href="#">View All</a>
    </div>      
     <div class="h-spm-out-a">
       <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="h-spm-slider">
           <div class="owl-carousel owl-carousel-flt-a owl-theme">
            <div class="item">
             <div class="on-out-pro">   
              <div class="on-out-pro-img snip1252"> 
                  <a href="#"><img src="<?php echo base_url();?>assets/images/spice-img_1.jpg" alt="banglure bazaar"></a>
              </div>
              <a class="on-pro-ou-ab" href="#">
               <h1 class="on-pro-hd-a">Safe Harvest Wheat Daliya Daliya</h1>
               <h2 class="on-pro-hd-b">10% Off</h2>
              </a>
               <div class="on-sh-out"> 
                <div class="pro-price">
                 <span class="pro-rup"><i class="glyph-icon flaticon-rupee-indian"></i></span><span class="pro-price-in">25.00</span> 
                </div>
               </div>   
             </div>
            </div>
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
