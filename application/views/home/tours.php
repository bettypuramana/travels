<!DOCTYPE html>
<html class="load-full-screen">
    <head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Travels">
	
	<title>Travels</title>
	
 <?php include('assets/home/include/header.php'); ?>

</head>
<body class="load-full-screen">

<?php include('assets/home/include/menu_bar.php'); ?>

<!-- START: MODIFY SEARCH -->
	<div class="row modify-search modify-holiday">
		<div class="container">
			<form >
				<div class="col-md-3 col-sm-6">
					<div class="form-gp">
						<label>Starting From</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" name="departure_city" class="form-control" required placeholder="E.g. London">
							<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-gp">
						<label>Going To</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" name="destination_city" class="form-control" required placeholder="E.g. Paris">
							<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Month Of Travel</label>
						<select class="selectpicker">
							<option>Any</option>
							<option>July</option>
							<option>August</option>
							<option>September</option>
							<option>October</option>
							<option>December</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Budget</label>
						<select class="selectpicker">
							<option>All</option>
							<option>Upto $500</option>
							<option>Above $1000+</option>
							<option>Upto $5000</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-9">
					<div class="form-gp">
						<button type="submit" class="modify-search-button btn transition-effect text-center">MODIFY SEARCH</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<!-- END: MODIFY SEARCH -->

<!-- START: LISTING AREA-->
<div class="row">
	<div class="container">
		<!-- START: FILTER AREA -->
		<div class="col-md-3 clear-padding">
			<div class="filter-head text-center">
				<h4>25 Result Found Matching Your Search.</h4>
			</div>
			<div class="filter-area">
				<div class="price-filter filter">
					<h5><i class="fa fa-usd"></i> Price</h5>
					<p>
						<label></label>
						<input type="text" id="amount" readonly>
					</p> 
					<div id="price-range"></div>
				</div>
				<div class="star-filter filter">
					<h5><i class="fa fa-calendar"></i> Duration</h5>
					<ul>
						<li><input type="checkbox"> Upto 3 Days</li>
						<li><input type="checkbox"> 5 to 7 Days</li>
						<li><input type="checkbox"> 9 to 11 Days</li>
						<li><input type="checkbox"> 12 to 14 Days</li>
						<li><input type="checkbox"> Above 14 Days</li>
						<li><input type="checkbox"> Any</li>
					</ul>
				</div>
				<div class="location-filter filter">
					<h5><i class="fa fa-globe"></i> Country</h5>
					<ul>
						<li><input type="checkbox"> USA</li>
						<li><input type="checkbox"> UK</li>
						<li><input type="checkbox"> India</li>
						<li><input type="checkbox"> Australia</li>
						<li><input type="checkbox"> Thialand</li>
						<li><input type="checkbox"> All</li>
					</ul>
				</div>
				<div class="filter">
					<h5><i class="fa fa-pagelines"></i> Holiday Theme</h5>
					<ul>
						<li><input type="checkbox"> <i class="fa fa-heart"></i> Honeymoon</li>
						<li><input type="checkbox"> <i class="fa fa-users"></i> Group Tours</li>
						<li><input type="checkbox"> <i class="fa fa-users"></i> Family Tours</li>
						<li><input type="checkbox"> <i class="fa fa-sun-o"></i> Summer Tours</li>
						<li><input type="checkbox"> <i class="fa fa-heart"></i> Honeymoon</li>
						<li><input type="checkbox"> <i class="fa fa-users"></i> Group Tours</li>
						<li><input type="checkbox"> All</li>
					</ul>
				</div>
				<div class="facilities-filter filter">
					<h5><i class="fa fa-list"></i> Inclusion</h5>
					<ul>
						<li><input type="checkbox"> <i class="fa fa-plane"></i> Flight</li>
						<li><input type="checkbox"> <i class="fa fa-taxi"></i> Transportation</li>
						<li><input type="checkbox"> <i class="fa fa-eye"></i> Sightseeing</li>
						<li><input type="checkbox"> <i class="fa fa-cutlery"></i> Meals</li>
						<li><input type="checkbox"> <i class="fa fa-glass"></i> Drinks</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END: FILTER AREA -->
		
		<!-- START: INDIVIDUAL LISTING AREA -->
		<div class="col-md-9 hotel-listing">
			
			<!-- START: SORT AREA -->
			<div class="sort-area col-sm-10">
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Price</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Star Rating</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>User Rating</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Name</option>
						<option> Ascending</option>
						<option> Descending</option>
					</select>
				</div>
			</div>
			<!-- END: SORT AREA -->
			<div class="clearfix visible-xs-block"></div>
			<div class="col-sm-2 view-switcher">
				<div class="pull-right">
					<a class="switchgrid" title="Grid View">
						<i class="fa fa-th-large"></i>
					</a>
					<a class="switchlist active" title="List View">
						<i class="fa fa-list"></i>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- START: HOTEL LIST VIEW -->
			<div class="switchable col-md-12 clear-padding">
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour3.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Sky High Dubai <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>Dubai <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-plane" title="Flight Included"></i><i class="fa fa-bed" title="Luxury Hotel"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>$50/Person</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour1.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Romantic Paris <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>Paris <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-wifi" title="Free Wifi"></i><i class="fa fa-bed" title="Luxury Bedroom"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
		
							<div class="room-book-box">
								<div class="price">
									<h5>$100/Person</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour2.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Amazing Bangkok <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>Bangkok <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-wifi" title="Free Wifi"></i><i class="fa fa-bed" title="Luxury Bedroom"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>$50/Person</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-md-block"></div>
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour4.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Wonderful Italy <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>Italy <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-wifi" title="Free Wifi"></i><i class="fa fa-bed" title="Luxury Bedroom"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>$50/Person</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour5.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Hilly Austria <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>Austria <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-wifi" title="Free Wifi"></i><i class="fa fa-bed" title="Luxury Bedroom"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>$50/Person</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="<?php echo base_url();?>assets/home/images/tour6.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>Wonderful France <span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><i class="fa fa-map-marker"></i>France <i class="fa fa-phone"></i>123456789</p>
								</div>
								<div class="hotel-facility">
									<p><i class="fa fa-wifi" title="Free Wifi"></i><i class="fa fa-bed" title="Luxury Bedroom"></i><i class="fa fa-taxi" title="Transportation"></i><i class="fa fa-beer" title="Bar"></i><i class="fa fa-cutlery" title="Restaurant"></i></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding">
							<div class="rating-box">
								<div class="tripadvisor-rating">
									<img src="<?php echo base_url();?>assets/home/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
								</div>
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>$50 Avg/Night</h5>
								</div>
								<div class="book">
									<a href="tour-details.html">Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<!-- END: HOTEL LIST VIEW -->
			</div>
			<div class="clearfix"></div>
			<!-- START: PAGINATION -->
			<div class="bottom-pagination">
				<nav class="pull-right">
					<ul class="pagination pagination-lg">
						<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
						<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">2 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">3 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">4 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">5 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">6 <span class="sr-only">(current)</span></a></li>
						<li><a href="#" aria-label="Previous"><span aria-hidden="true">&#187;</span></a></li>
					</ul>
				</nav>
			</div>
			<!-- END: PAGINATION -->
		</div>
	</div>
</div>
<!-- END: LISTING AREA -->

<!-- START: FOOTER -->
 <?php include('assets/home/include/footer.php'); ?>
<script>

	/* Price Range Slider */
	  
	$(function() {
		"use strict";
		$( "#price-range" ).slider({
		  range: true,
		  min: 0,
		  max: 100,
		  values: [ 3, 50 ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
		  }
		});
		$( "#amount" ).val( "$ " + $( "#price-range" ).slider( "values", 0 ) +
		  " - $ " + $( "#price-range" ).slider( "values", 1 ) );
	  });
</script>
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh-oh'},{'server':'sg2plzcpnl466829'},{'id':'7770191'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='../../../../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</html>