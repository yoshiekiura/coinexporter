<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>

@include("layout.menu")

<div class="innerpage_banner">
	<div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <h2>About Us</h2>
	        <div class="breadcrumb">
	          <ul class="clearfix">
	            <li class="ib bg">
	              <a href="<?php echo BASEURL;?>">Home</a>
	            </li>
	            <li class="ib current-page">About Us</li>
	          </ul>
	        </div>
	      </div>
	    </div>
	</div>
</div>

<div class="top-about ptb-50">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-img">
					<img src="images/about.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-txt">
					<p>CoinExporter is an high impact web application with new generational marketing model services that bridges the gap in over-demanding of real, credible and results-oriented Marketing Agency in the cryptocurrency space. </p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="snd-about">
	<div class="container-fluid p-0">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="snd-txt">
					<p>CoinExporter uses a business model that provides rare opportunities for cryptocurrency enthusiasts and investors to earn by working as Direct Marketers, whose work is to promote some targeted campaigns for cryptocurrency projects. </p>
					<p>CoinExporter as a cryptocurrency Marketing Agency will continue to be a friendly and globally recognized marketing agency with solution-driven marketing techniques.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 p-0">
				<div class="snd-img">
					<img src="images/about2.jpg" alt="">
					<a id="play-video" class="video-play-button" href="#">
					  <span></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="testimonial-sec ptb-50">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-sm-12">
				<div class="testiti-head">
					<h2>What They Are <br /> Telling About Us</h2>
					<p>2356+ Clients Trusted Us</p>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="owl-carousel testimonial">
					<div class="item">
						<div class="testi-box">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="testi-box-img">
								<img src="images/client.jpg" alt="">
								<div class="testi-client-title">
									<h5>Michale Yeah</h5>
									<p>Senior Designer</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testi-box">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="testi-box-img">
								<img src="images/client1.jpg" alt="">
								<div class="testi-client-title">
									<h5>David Jornas</h5>
									<p>Senior Designer</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include("layout.footer")
<!--============================= Scripts =============================-->
<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

<script>            
jQuery(document).ready(function() {
	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});
	
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	})
});
</script> 



<script>
	$('.testimonial').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})
</script>


<script src="js/menu.js"></script>
<script type="text/javascript">
	$("#cssmenu").menumaker({
		title: "",
		format: "multitoggle"
	});
</script>

<script src="js/wow.js"></script>
<script>new WOW().init();</script>

</body>
</html>