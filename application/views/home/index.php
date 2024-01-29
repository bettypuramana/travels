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


	<!-- BEGIN: SEARCH SECTION -->
	<div class="row full-width-search">
		<div class="container clear-padding">

			<div class="col-md-12 search-section">
				<div role="tabpanel">
					<!-- BEGIN: CATEGORY TAB -->
					<ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
						<li role="presentation" class="text-center">
							<a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">
								<i class="fa fa-plane"></i> 
								<span>FLIGHTS</SPAN>
							</a>
						</li>
						<li role="presentation" class="active  text-center">
							<a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">
								<i class="fa fa-bed"></i> 
								<span>HOTELS</span>
							</a>
						</li>
						<li role="presentation" class="text-center">
							<a href="#holiday" aria-controls="holiday" role="tab" data-toggle="tab">
								<i class="fa fa-suitcase"></i>
								<span>HOLIDAYS</span>
							</a>
						</li>
						<li role="presentation" class="text-center">
							<a href="#taxi" aria-controls="taxi" role="tab" data-toggle="tab">
								<i class="fa fa-cab"></i>
								<span>CAR</span>
							</a>
						</li>
						<li role="presentation" class="text-center">
							<a href="#cruise" aria-controls="cruise" role="tab" data-toggle="tab">
								<i class="fa fa-ship"></i>
								<span>CRUISE</span>
							</a>
						</li>
					</ul>
					<!-- END: CATEGORY TAB -->

					<!-- BEGIN: TAB PANELS -->
					<div class="tab-content">
							<!-- BEGIN: FLIGHT SEARCH -->
							<div role="tabpanel" class="tab-pane" id="flight">
								<form >
									<div class="col-md-12 product-search-title">Book Flight Tickets</div>
									<div class="col-md-12 search-col-padding">
										<label class="radio-inline">
											<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="One Way"> One Way
										</label>
										<label class="radio-inline">
											<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Round Trip"> Round Trip
										</label>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Leaving From</label>
										<div class="input-group">
											<input type="text" name="departure_city" class="form-control" required placeholder="E.g. London">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Leaving To</label>
										<div class="input-group">
											<input type="text" name="destination_city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Departure</label>
										<div class="input-group">
											<input type="text" id="departure_date" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Return</label>
										<div class="input-group">
											<input type="text" id="return_date" class="form-control" name="return_date" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Adult</label><br>
										<input id="adult_count" name="adult_count" value="1" class="form-control quantity-padding">
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Child</label><br>
										<input type="text" id="child_count" name="child_count" value="1" class="form-control quantity-padding">
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Class</label><br>
										<select class="selectpicker">
											<option>Business</option>
											<option>Economy</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 search-col-padding">
										<button type="submit" class="search-button btn transition-effect">Search Flights</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<!-- END: FLIGHT SEARCH -->
							
							<!-- START: HOTEL SEARCH -->
							<div role="tabpanel" class="tab-pane active" id="hotel">
								<form >
									<div class="col-md-12 product-search-title">Book Hotel Rooms</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>I Want To Go</label>
										<div class="input-group">
											<input type="text" name="destination-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Check - In</label>
										<div class="input-group">
											<input type="text" name="check-in" id="check_in" class="form-control" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Check - Out</label>
										<div class="input-group">
											<input type="text" name="check-out" id="check_out" class="form-control" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Adult</label><br>
										<input id="hotel_adult_count" name="adult_count" value="1" class="form-control quantity-padding">
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Child</label><br>
										<input type="text" id="hotel_child_count" name="child_count" value="1" class="form-control quantity-padding">
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Rooms</label><br>
										<select class="selectpicker" name="rooms">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
										</select>
									</div>
									<div class="col-md-3 col-sm-3 search-col-padding">
										<label>Nights</label><br>
										<select class="selectpicker" name="nights">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 search-col-padding">
										<button type="submit" class="search-button btn transition-effect">Search Hotels</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<!-- END: HOTEL SEARCH -->
								
							<!-- START: BEGIN HOLIDAY -->
							<div role="tabpanel" class="tab-pane" id="holiday">
								<form >
									<div class="col-md-12 product-search-title">Book Holiday Packages</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>From</label>
										<div class="input-group">
											<input type="text" name="pack-departure-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>I Want To Go</label>
										<div class="input-group">
											<input type="text" name="pack-destination-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Starting From</label>
										<div class="input-group">
											<input type="text" id="package_start" class="form-control" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Duration(Optional)</label><br>
										<select class="selectpicker" name="holiday_duration">
											<option>3 Days</option>
											<option>5 Days</option>
											<option>1 Week</option>
											<option>2 Weeks</option>
											<option>1 Month</option>
											<option>1+ Month</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Package Type(Optional)</label><br>
										<select class="selectpicker" name="package_type">
											<option>Group</option>
											<option>Family</option>
											<option>Individual</option>
											<option>Honeymoon</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Budget(Optional)</label><br>
										<select class="selectpicker" name="package_budget">
											<option>500</option>
											<option>1000</option>
											<option>1000+</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 search-col-padding">
										<button type="submit" class="search-button btn transition-effect">Search Packages</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<!-- END: HOLIDAYS -->
							
							<!-- START: CAR SEARCH -->
							<div role="tabpanel" class="tab-pane" id="taxi">
								<form >
									<div class="col-md-12 product-search-title">Search Perfect Car</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Pick Up Location</label>
										<div class="input-group">
											<input type="text" name="departure-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Drop Off Location</label>
										<div class="input-group">
											<input type="text" name="destination-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Pick Up Date</label>
										<div class="input-group">
											<input type="text" id="car_start" class="form-control" placeholder="MM/DD/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Pick Off Date</label>
										<div class="input-group">
											<input type="text" id="car_end" class="form-control" placeholder="MM/DD/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Car Brnad(Optional)</label><br>
										<select class="selectpicker" name="brand">
											<option>BMW</option>
											<option>Audi</option>
											<option>Mercedes</option>
											<option>Suzuki</option>
											<option>Honda</option>
											<option>Hyundai</option>
											<option>Toyota</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Car Type(Optional)</label><br>
										<select class="selectpicker" name="car_type">
											<option>Limo</option>
											<option>Sedan</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 search-col-padding">
										<button type="submit" class="search-button btn transition-effect">Search Cars</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<!-- END: CAR SEARCH -->
							
							<!-- START: CRUISE SEARCH -->
							<div role="tabpanel" class="tab-pane" id="cruise">
								<form >
									<div class="col-md-12 product-search-title">Cruise Holidays</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>From</label>
										<div class="input-group">
											<input type="text" name="pack-departure-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>I Want To Go</label>
										<div class="input-group">
											<input type="text" name="pack-destination-city" class="form-control" required placeholder="E.g. New York">
											<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Starting From</label>
										<div class="input-group">
											<input type="text" id="cruise_start" class="form-control" placeholder="DD/MM/YYYY">
											<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Duration(Optional)</label><br>
										<select class="selectpicker" name="holiday_duration">
											<option>3 Days</option>
											<option>5 Days</option>
											<option>1 Week</option>
											<option>2 Weeks</option>
											<option>1 Month</option>
											<option>1+ Month</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Package Type(Optional)</label><br>
										<select class="selectpicker" name="package_type">
											<option>Group</option>
											<option>Family</option>
											<option>Individual</option>
											<option>Honeymoon</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 search-col-padding">
										<label>Budget(Optional)</label><br>
										<select class="selectpicker" name="package_budget">
											<option>500</option>
											<option>1000</option>
											<option>1000+</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 search-col-padding">
										<button type="submit" class="search-button btn transition-effect">Search Cruises</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<!-- END: CRUISE SEARCH -->
							
						</div>
						<!-- END: TAB PANE -->
				</div>
			</div>
		</div>
	</div>
	<!-- END: SEARCH SECTION -->



	
<!-- STRAT: LAST MINUTE DEALS -->
<section class="pkg-fj12">
	<div class="row last-minute-deal">
		<div class="container">
			<div class="section-title text-center">
				<h2>LAST MINUTE DEALS</h2>
				<h4>SAVE MORE</h4>
			</div>
			<div class="owl-carousel" id="lastminute">
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour1.jpg" alt="cruise">
						<h5 class="location">PARIS</h5>
					</div>
					<div class="body text-center">
						<h5>Romantic Paris</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$199</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour2.jpg" alt="cruise">
						<h5 class="location">BANGKOK</h5>
					</div>
					<div class="body text-center">
						<h5>Disneyland</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$299</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour3.jpg" alt="cruise">
						<h5 class="location">DUBAI</h5>
					</div>
					<div class="body text-center">
						<h5>Sky High Dubai</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$399</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour4.jpg" alt="cruise">
						<h5 class="location">ITALY</h5>
					</div>
					<div class="body text-center">
						<h5>Cruise Escape</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$399</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour1.jpg" alt="cruise">
						<h5 class="location">PARIS</h5>
					</div>
					<div class="body text-center">
						<h5>One Way Trip</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$199</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
				<div class="col-grid">
					<div class="wrapper">
						<img src="<?php echo base_url();?>assets/home/images/tour2.jpg" alt="cruise">
						<h5 class="location">BANGKOK</h5>
					</div>
					<div class="body text-center">
						<h5>Round Trip</h5>
						<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						<p class="back-line">Starting From</p>
						<h3>$299</h3>
						<p class="text-sm">Thu Aug 12 - Sun 14 Aug</p>
					</div>
					<div class="bottom">
						<a href="tours.html">VIEW DETAIL</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: LAST MINUTE DEALS -->




<!-- BEGIN: TOP DESTINATION -->
<section id="top-tour-row">
	<div class="row top-tour">
		<div class="container">
			<div class="section-title text-center">
				<h2>TOP DESTINATION</h2>
				<h4>CHECK OUT OUR TOP TOURS</h4>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.1s">
				<img src="<?php echo base_url();?>assets/home/images/tour1.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>FRANCE</h4>
					</div>
					<div class="pull-right">
						<h4>$499</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>FRANCE, UK</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 4 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.2s">
				<img src="<?php echo base_url();?>assets/home/images/tour3.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>DUBAI</h4>
					</div>
					<div class="pull-right">
						<h4>$999</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>UAE</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 4 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.3s">
				<img src="<?php echo base_url();?>assets/home/images/tour2.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>BANGKOK</h4>
					</div>
					<div class="pull-right">
						<h4>$699</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>THIALAND</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 7 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.4s">
				<img src="<?php echo base_url();?>assets/home/images/tour7.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>AFRICA</h4>
					</div>
					<div class="pull-right">
						<h4>$799</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>KENYA</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 4 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.5s">
				<img src="<?php echo base_url();?>assets/home/images/tour10.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>BELGIUM</h4>
					</div>
					<div class="pull-right">
						<h4>$899</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>BELGIUM</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 4 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 tour-grid clear-padding wow slideInUp" data-wow-delay="0.6s">
				<img src="<?php echo base_url();?>assets/home/images/tour5.jpg" alt="Cruise">
				<div class="tour-brief">
					<div class="pull-left">
						<h4><i class="fa fa-map-marker"></i>AUSTRIA</h4>
					</div>
					<div class="pull-right">
						<h4>$499</h4>
					</div>
				</div>
				<div class="tour-detail text-center">
					<p><strong><i class="fa fa-map-marker"></i>Itinerary: </strong>AUSTRIA</p>
					<p><strong><i class="fa fa-clock-o"></i>Duration: </strong> 4 Days</p>
					<p><a href="tours.html">DETAIL</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: TOP DESTINATION -->



<!-- START: HOT  DEALS -->
<section>
	<div class="row hot-deals">
		<div class="container clear-padding">
			<div class="section-title text-center">
				<h2>HOT DEALS</h2>
				<h4>SAVE MORE</h4>
			</div>
			<div role="tabpanel" class="text-center">
				<!-- BEGIN: CATEGORY TAB -->
				<ul class="nav nav-tabs" role="tablist" id="hotDeal">
					<li role="presentation" class="active text-center">
						<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">
							<i class="fa fa-bed"></i> 
							<span>HOTELS</SPAN>
						</a>
					</li>
					<li role="presentation" class="text-center">
						<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">
							<i class="fa fa-suitcase"></i> 
							<span>HOLIDAYS</SPAN>
						</a>
					</li>
					<li role="presentation" class="text-center">
						<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">
							<i class="fa fa-plane"></i> 
							<span>FLIGHTS</SPAN>
						</a>
					</li>
					<li role="presentation" class="text-center">
						<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">
							<i class="fa fa-taxi"></i> 
							<span>CARS</SPAN>
						</a>
					</li>

				</ul>
				<!-- END: CATEGORY TAB -->
				<div class="clearfix"></div>
				<!-- BEGIN: TAB PANELS -->
				<div class="tab-content">
					<!-- BEGIN: FLIGHT SEARCH -->
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="col-md-6 hot-deal-list wow slideInLeft">
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer1.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Hotel Grand Lilly</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$499</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer2.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Royal Resort</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$399</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer3.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Hotel Grand Lilly</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$499</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-6 hot-deal-grid wow slideInRight">
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour1.jpg" alt="Cruise">
									<h5>Paris Starting From $49/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour2.jpg" alt="Cruise">
									<h5>Bangkok Starting From $69/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour3.jpg" alt="Cruise">
									<h5>Dubai Starting From $99/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour4.jpg" alt="Cruise">
									<h5>Italy Starting From $59/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab2">
						<div class="col-md-6 hot-deal-list">
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer3.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Hotel Grand Lilly</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$499</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer2.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Royal Resort</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$399</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="item">
								<div class="col-xs-3">
									<img src="<?php echo base_url();?>assets/home/images/offer1.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>Hotel Grand Lilly</h5>
									<p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>$499</h4>
									<h6>Per Night</h6>
									<a href="hotel-details.html">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-6 hot-deal-grid">
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour5.jpg" alt="Cruise">
									<h5>Paris Starting From $49/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour6.jpg" alt="Cruise">
									<h5>Bangkok Starting From $69/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour7.jpg" alt="Cruise">
									<h5>Dubai Starting From $99/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="<?php echo base_url();?>assets/home/images/tour8.jpg" alt="Cruise">
									<h5>Italy Starting From $59/Night</h5>
									<a href="hotel-details.html">DETAILS</a>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab3">
						Lorem Lpsum 3
					</div>
					<div role="tabpanel" class="tab-pane" id="tab4">
						Lorem Lpsum 4
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: HOT DEALS -->

<!-- START: FOOTER -->
 <?php include('assets/home/include/footer.php'); ?>
<!-- END: FOOTER -->
</div>
<!-- END: SITE-WRAPPER -->
<!-- Load Scripts -->
<script src="<?php echo base_url();?>assets/home/js/respond.js"></script>
<script src="<?php echo base_url();?>assets/home/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/home/plugins/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/home/plugins/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/supersized.3.1.3.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/js.js"></script>
<script type="text/javascript">  
			
			jQuery(function($){
				"use strict";
				$.supersized({
				
					//Functionality
					slideshow               :   1,		//Slideshow on/off
					autoplay				:	1,		//Slideshow starts playing automatically
					start_slide             :   1,		//Start slide (0 is random)
					random					: 	0,		//Randomize slide order (Ignores start slide)
					slide_interval          :   10000,	//Length between transitions
					transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	500,	//Speed of transition
					new_window				:	1,		//Image links open in new window/tab
					pause_hover             :   0,		//Pause slideshow on hover
					keyboard_nav            :   0,		//Keyboard navigation on/off
					performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,		//Disables image dragging and right click with Javascript

					//Size & Position
					min_width		        :   0,		//Min width allowed (in pixels)
					min_height		        :   0,		//Min height allowed (in pixels)
					vertical_center         :   1,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					fit_portrait         	:   1,		//Portrait images will not exceed browser height
					fit_landscape			:   0,		//Landscape images will not exceed browser width
					
					//Components
					navigation              :   1,		//Slideshow controls on/off
					thumbnail_navigation    :   1,		//Thumbnail navigation
					slide_counter           :   1,		//Display slide numbers
					slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
					slides 					:  	[		//Slideshow Images
														{image : '<?php echo base_url();?>assets/home/images/beach.jpg', title : 'Slide 1'},  
														{image : '<?php echo base_url();?>assets/home/images/switzerland.jpg', title : 'Slide 2'},  
														{image : '<?php echo base_url();?>assets/home/images/cruise.jpg', title : 'Slide 3'}  
												]
												
				}); 
		    });
		    
</script>
</body>
</html>