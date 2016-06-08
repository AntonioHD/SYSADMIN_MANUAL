<!DOCTYPE html>

<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title>M.E.I.T - Meet Enterprise IT</title>
    <meta name="description" content="">	
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/logo2.png">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons
	================================================== -->
	<link rel="icon" href="http://themewinter.com/html/bizcraft/onepage/img/favicon/favicon-32x32.png" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://themewinter.com/html/bizcraft/onepage/img/favicon/favicon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://themewinter.com/html/bizcraft/onepage/img/favicon/favicon-72x72.png">
	<link rel="apple-touch-icon-precomposed" href="http://themewinter.com/html/bizcraft/onepage/img/favicon/favicon-54x54.png">
	
	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/bootstrap.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<!--
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/font-awesome.css">-->
	<!-- Animation -->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/owl.css">
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/owl_002.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="BizCraft%20-%20Responsive%20Html5%20Template_files/flexslider.css">
	<!-- Style Swicther -->
	<link id="style-switch" href="BizCraft%20-%20Responsive%20Html5%20Template_files/preset1.css" media="screen" rel="stylesheet" type="text/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<script style="" src="BizCraft%20-%20Responsive%20Html5%20Template_files/common.js" charset="UTF-8" type="text/javascript"></script><script src="BizCraft%20-%20Responsive%20Html5%20Template_files/util.js" charset="UTF-8" type="text/javascript"></script><script src="BizCraft%20-%20Responsive%20Html5%20Template_files/stats.js" charset="UTF-8" type="text/javascript"></script></head>
	
<body>
	<div class="body-inner">
	<!-- Header start -->
	<header id="header" class="navbar-fixed-top header2 landing-header" role="banner">
		<div class="container">
			<div class="row">
				<!-- Logo start -->
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <div class="navbar-brand">
					    <a href="index.html">
					    <strong>M E I T</strong>
					    	<!--<img class="img-responsive" src="images/logo.png" alt="logo">-->
					    </a> 
				    </div>                   
				</div><!--/ Logo end -->
				<nav class="collapse navbar-collapse clearfix" role="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="page-scroll" href="#home" tabindex="-1">Home</a></li>
						<li class=""><a class="page-scroll" href="#overview" tabindex="-1">Overview</a></li>
						<li class=""><a class="page-scroll" href="#pricing" tabindex="-1">Pricing</a></li>
						<li class=""><a class="page-scroll" href="#contact" tabindex="-1">Contact</a></li>
						<li class="dropdown"><!--Dropdown to sign in form-->
			             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
			             <ul class="dropdown-menu">
			             	<li>
			             	<div>
				              <form class="form" id="formLogin" action=<?php echo $_SERVER['PHP_SELF']?> method="post"> 
				                <input name="username" id="username" placeholder="Username" type="text"> <br>
				                <input name="password" id="password" placeholder="Password" type="password"><br><br>
				                <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-default btn-md">Login</button>
				              </form>
				            </div>
				        	</li>
			                <li class="divider"></li>
			                <li class="nav-header">Are you new here?</li>
			                <li>
			                <div>
			                 <form class="form" id="formRegister" action=<?php echo $_SERVER['PHP_SELF']?> method="post"> 
				               <input name="username2" id="username2" placeholder="Username" type="text"> 
				               <input name="email" id="email" placeholder="Email" type="email">
				               <input name="password2" id="password2" placeholder="Password" type="password"><br><br>
				               <button type="submit" id="btnRegister" name="btnRegister" class="btn btn-default btn-md">Register now</button>
				             </form>
				        	</div>
				        	</li>
			             </ul>
			          </li>
					</ul>
				</nav><!--/ Navigation end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->

	<!-- Home start -->
	<section id="home" class="hero landing hero-section">

		<div class="parallax-overlay"></div>

		<div class="container">
			<div class="hero-content">
				<div style="visibility: visible;-webkit-animation-delay: .8s; -moz-animation-delay: .8s; animation-delay: .8s;" class="hero-text wow fadeIn animated" data-wow-delay=".8s">
					<h1 class="hero-title"><strong>MEIT</strong> is a company which want to make it easy your first online steps</h1>
					<p class="hero-description">Lorem ipsum dolor sit amet, consectetur adip iscing elit. Mauris hendrerit eros ac ferment sodales</p>
					<p class="hero-buttons">
						<a href="#" class="btn btn-primary">
							<strong>Learn More </strong> <i class="fa fa-arrow-right"></i>
						</a>
						<a href="#" class="btn btn-primary solid">
							<strong>Buy Now </strong> <i class="fa fa-shopping-cart"></i>
						</a>
					</p>
				</div><!--/ Hero text end -->
				<div style="visibility: visible;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;" class="hero-images wow fadeInUp animated" data-wow-delay="1s">
					<img style="width:90%; height:auto;" class="pull-right" src="images/logo.png" alt="meet enterprise information technologies">
				</div><!--/ Hero image end -->
			</div><!--/ Hero content end -->
		</div><!--/ Container end -->
    </section><!--/ Home end -->


    <!-- Overview tab start -->
	<section id="overview" class="overview">
		<div class="container">
			<div style="visibility: visible;" class="row wow fadeInUp animated">
				<div class="col-md-12 heading text-center">
					<h2 class="title2">App Overview<span class="title-desc">A Quality Experience Team with 4 years experience</span></h2>
				</div>
			</div>
			<div class="row">
				<div class="landing-tab clearfix">
					<ul class="nav nav-tabs nav-stacked col-md-3 col-sm-5">
					  	<li class="">
					  		<a class="animated fadeIn" href="#tab_a" data-toggle="tab">
					  			<span class="tab-icon"><i class="fa fa-desktop"></i></span>
					  			<div class="tab-info">
						  			<h3>Responsive Ready</h3>
					  			</div>
					  		</a>
					  	</li>
					  	<li class="">
						  	<a class="animated fadeIn" href="#tab_b" data-toggle="tab">
						  		<span class="tab-icon"><i class="fa fa-sliders"></i></span>
					  			<div class="tab-info">
						  			<h3>Easy To Customize</h3>
					  			</div>
						  	</a>
						</li>
					 	<li class="">
						  	<a class="animated fadeIn" href="#tab_c" data-toggle="tab">
						  		<span class="tab-icon"><i class="fa fa-android"></i></span>
					  			<div class="tab-info">
						  			<h3>Highly Capable</h3>
					  			</div>
						  	</a>
						</li>
						<li class="">
						  	<a class="animated fadeIn" href="#tab_d" data-toggle="tab">
						  		<span class="tab-icon"><i class="fa fa-pagelines"></i></span>
					  			<div class="tab-info">
						  			<h3>Modern Design</h3>
					  			</div>
						  	</a>
						</li>
						<li class="active">
						  	<a class="animated fadeIn" href="#tab_e" data-toggle="tab">
						  		<span class="tab-icon"><i class="fa fa-support"></i></span>
					  			<div class="tab-info">
						  			<h3>Dedicated Support</h3>
					  			</div>
						  	</a>
						</li>
					</ul>
					<div class="tab-content col-md-9 col-sm-7">
				        <div class="tab-pane animated fadeInRight" id="tab_a">
				        	<i class="fa fa-desktop big"></i>
				            <h3>Full Responsive with All Devices</h3> 
				            <p>Over the year we have lots of experience in our 
field. In sit amet massa sapien. Vestibulum diam turpis, gravida in 
lobortis id, ornare a eros. Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Aliquam sagittis nulla non elit dignissim suscipit. 
Duis lorem nulla, eleifend.</p>
				        </div>
				        <div class="tab-pane animated fadeInLeft" id="tab_b">
				        	<i class="fa fa-sliders big"></i>
				            <h3>Fully Flexible to Customize this apps</h3> 
							<p>Helvetica cold-pressed lomo messenger bag ugh. Vinyl jean 
shorts Austin pork belly PBR retro, Etsy VHS kitsch actually messenger 
bag pug. Pbrb semiotics try-hard, Schlitz occupy dreamcatcher master 
cleanse Marfa Vice tofu. </p>							 
				        </div>
				        <div class="tab-pane animated fadeIn" id="tab_c">
				            <i class="fa fa-android big"></i>
				            <h3>Amazing Capability To use</h3> 
				            <p>Over the year we have lots of experience in our 
field. In sit amet massa sapien. Vestibulum diam turpis, gravida in 
lobortis id, ornare a eros. Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Aliquam sagittis nulla non elit dignissim suscipit. 
Duis lorem nulla, eleifend.</p>
				        </div>
				        <div class="tab-pane animated fadeIn" id="tab_d">
				            <i class="fa fa-pagelines big"></i>
				            <h3>Clean and Modern Design</h3> 
				            <p>Over the year we have lots of experience in our 
field. In sit amet massa sapien. Vestibulum diam turpis, gravida in 
lobortis id, ornare a eros. Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Aliquam sagittis nulla non elit dignissim suscipit. 
Duis lorem nulla, eleifend.</p>
				        </div>
				        <div class="tab-pane animated fadeIn active" id="tab_e">
				            <i class="fa fa-support big"></i>
				            <h3>24/7 Dedicated Support</h3> 
				            <p>Occupy selfies Tonx, +1 Truffaut beard organic 
normcore tilde flannel artisan squid cray single-origin coffee. Master 
cleanse vinyl Austin kogi, semiotics skateboard fap wayfarers health 
goth. Helvetica cray church-key hashtag Carles. Four dollar toast 
meggings seitan, Tonx pork belly VHS Bushwick. Chambray banh mi 
cornhole. Locavore messenger bag seitan.</p>
				        </div>
					</div><!-- tab content -->
	    		</div><!-- Overview tab end -->
			</div><!--/ Content row end -->
		</div><!--/ Container end -->
    </section><!--/ Overview tab start end -->



	<!-- Testimonial start-->
	<section class="testimonial parallax parallax3">
		<div class="parallax-overlay"></div>
	  	<div class="container">
		    <div class="row">
			   
		    </div><!--/ Row end-->
	  	</div><!--/  Container end-->
	</section><!--/ Testimonial end-->



	<!-- Pricing table start -->
	<section id="pricing" class="pricing">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading text-center">
					<h2 class="title2">Flexible Package 
						<span class="title-desc">We Love to Work with Passion</span>
					</h2>
				</div>
		  	</div><!--/ Title row end -->
	  		<div class="row">
				<!-- plan start -->
				<div style="visibility: visible;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;" class="col-md-3 col-sm-6 wow fadeInUp animated" data-wow-delay=".5s">
				    <div class="plan text-center">
				        <span class="plan-name">Basic <small>Monthly plan</small></span>
				        <p class="plan-price"><sup class="currency">$</sup><strong>49</strong><sub>.99</sub></p>
				        <ul class="list-unstyled">
				            <li>100GB Monthly Bandwidth</li>
				            <li>$100 Google AdWords</li>
				            <li>100 Domain Hosting</li>
				            <li>SSL Shopping Cart</li>
				            <li>24/7 Live Support</li>
				        </ul>
				    </div>
				</div><!-- plan end -->

				<!-- plan start -->
				<div style="visibility: visible;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;" class="col-md-3 col-sm-6 wow fadeInUp animated" data-wow-delay="1s">
				    <div class="plan text-center">
				        <span class="plan-name">Standared <small>Monthly plan</small></span>
				        <p class="plan-price"><sup class="currency">$</sup><strong>99</strong><sub>.99</sub></p>
				        <ul class="list-unstyled">
				            <li>100GB Monthly Bandwidth</li>
				            <li>$100 Google AdWords</li>
				            <li>100 Domain Hosting</li>
				            <li>SSL Shopping Cart</li>
				            <li>24/7 Live Support</li>
				        </ul>
				    </div>
				</div><!-- plan end -->

				<!-- plan start -->
				<div style="visibility: visible;-webkit-animation-delay: 1.4s; -moz-animation-delay: 1.4s; animation-delay: 1.4s;" class="col-md-3 col-sm-6 wow fadeInUp animated" data-wow-delay="1.4s">
				    <div class="plan text-center featured">
				        <span class="plan-name">Professional <small>Monthly plan</small></span>
				        <p class="plan-price"><sup class="currency">$</sup><strong>149</strong><sub>.99</sub></p>
				        <ul class="list-unstyled">
				            <li>100GB Monthly Bandwidth</li>
				            <li>$100 Google AdWords</li>
				            <li>100 Domain Hosting</li>
				            <li>SSL Shopping Cart</li>
				            <li>24/7 Live Support</li>
				        </ul>
				    </div>
				</div><!-- plan end -->

				<!-- plan start -->
				<div style="visibility: visible;-webkit-animation-delay: 1.6s; -moz-animation-delay: 1.6s; animation-delay: 1.6s;" class="col-md-3 col-sm-6 wow fadeInUp animated" data-wow-delay="1.6s">
				    <div class="plan text-center">
				        <span class="plan-name">Premium <small>Monthly plan</small></span>
				        <p class="plan-price"><sup class="currency">$</sup><strong>399</strong><sub>.99</sub></p>
				        <ul class="list-unstyled">
				            <li>100GB Monthly Bandwidth</li>
				            <li>$100 Google AdWords</li>
				            <li>100 Domain Hosting</li>
				            <li>SSL Shopping Cart</li>
				            <li>24/7 Live Support</li>
				        </ul>
				    </div>
				</div><!-- plan end -->
			</div><!--/ Content row end -->
		</div><!--/  Container end-->
	</section><!--/ Pricing table end -->

	
	<!-- Contact start -->
	<section id="contact" class="contact2 parallax parallax4">
		<div class="parallax-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading text-center">
					<h2 class="title2">Get In Touch
						<span class="title-desc">We Love to Work with Passion</span>
					</h2>
				</div>
		  	</div><!--/ Title row end -->
	    	<div class="row">
	    		<div class="col-md-8 col-md-offset-2">
	    			<form id="contact-form" action="contact-form.php" method="post" role="form">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Name</label>
								<input class="form-control" name="name" id="name" placeholder="" required="" type="text">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name="email" id="email" placeholder="" required="" type="email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Subject</label>
									<input class="form-control" name="subject" id="subject" placeholder="" required="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" name="message" id="message" placeholder="" rows="10" required=""></textarea>
						</div>
						<div class="text-right"><br>
							<button class="btn btn-primary white" type="submit">Send Message</button> 
						</div>
					</form>
	    		</div>
	    	</div><!--/ Content row end -->
		</div><!--/ Container end -->
	</section><!--/ Contact end -->
	

	<!-- Footer start -->
	<section id="footer" class="footer2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="social-icon unstyled">
						<li>
							<a title="Twitter" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-twitter"></i></span>
							</a>
							<a title="Facebook" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-facebook"></i></span>
							</a>
							<a title="Google+" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-google-plus"></i></span>
							</a>
							<a title="linkedin" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-linkedin"></i></span>
							</a>
							<a title="Pinterest" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-pinterest"></i></span>
							</a>
							<a title="Skype" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-skype"></i></span>
							</a>
							<a title="Dribble" href="#">
								<span style="visibility: visible;" class="icon-pentagon wow bounceIn animated"><i class="fa fa-dribbble"></i></span>
							</a>
						</li>
					</ul>
				</div>
			</div><!--/ Row end -->
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="copyright-info">
         			 © Copyright 2015 Craft. <span>Designed &amp; developed by- <a href="#" target="_blank">TrippleS</a></span>
        			</div>
				</div>
			</div><!--/ Row end -->
		   <div style="display: none;" title="" data-original-title="" id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix-top">
				<button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
			</div>
		</div><!--/ Container end -->
	</section><!--/ Footer end -->

	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/jquery_003.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/bootstrap.js"></script>
	<!-- Style Switcher -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/style-switcher.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/owl.js"></script>
	<!-- PrettyPhoto -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/jquery.js"></script>
	<!-- Bxslider -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/jquery_002.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/isotope.js"></script>
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/ini.js"></script>
	<!-- Wow Animation -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/wow.js"></script>
	<!-- SmoothScroll -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/smoothscroll.js"></script>
	<!-- Eeasing -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/jquery_004.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/jquery_005.js"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/waypoints.js"></script>
	<!-- Google Map API Key Source -->
	<script src="BizCraft%20-%20Responsive%20Html5%20Template_files/js"></script>
	<!-- For Google Map -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/gmap3.js"></script>
	<!-- Doc http://www.mkyong.com/google-maps/google-maps-api-hello-world-example/ -->
	<!-- Template custom -->
	<script type="text/javascript" src="BizCraft%20-%20Responsive%20Html5%20Template_files/custom.js"></script>

	</div><!-- Body inner end -->

</body></html>