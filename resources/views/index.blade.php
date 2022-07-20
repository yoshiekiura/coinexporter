<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
	

@include("layout.menu")
<div class="container">

@include("layouts.alert")
@if (Session::has('success'))

<div class="alert success-alert  alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ Session::get('success') }}
</div>  
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
{{ Session::get('error') }}
</div>
 @endif
</div>
<div class="adv-banner">
	<div class="container">
    	<div class="row">
            <div class="col-lg-6 col-md-6 text-end">
			<a href="#">
				<div class="owl-carousel" id="adv-slider1">
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></div>
       	    		<div class="item"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></div>
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></div>
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></div>
				</div>
			</a>
            </div>
            <div class="col-lg-6 col-md-6 text-start">
			<a href="#">
       	    	<div class="owl-carousel" id="adv-slider2">
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></div>
       	    		<div class="item"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></div>
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></div>
					<div class="item"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></div>
				</div>
			</a>
            </div>
        </div>
    </div>
</div>
<div class="banner banner-section">
<div class="icon-layer-one"><img src="<?php echo BASEURL; ?>images/icon-1.png" alt=""/></div>
<div class="icon-layer-three"><img src="<?php echo BASEURL; ?>images/pattern-1.png" alt=""/></div>
<div class="icon-layer-two"><img src="<?php echo BASEURL; ?>images/icon-1.png" alt=""/></div>

	<div class="container">
	
    	<div class="row align-items-center">
            <div class="col-md-6">
       	    	<ul>
                	<li>Campaigns are well targeted</li>
                    <li>Employers decide who can promote and where to promote the campaign </li>
                    <li>Employers decide the payment </li>
                    <li>Employers get feedback and can verify if the work is well done or not</li>
                    <li>Direct Marketers choose from pool of available works</li>
                    <li>The campaign tasks are seamless </li>
                    <li>Payment is seamless </li>
                </ul>
                <a href="#" class="btn-style-one" data-bs-toggle="modal" data-bs-target="#register-modal">Signup Today</a>
            </div>
            <div class="col-md-6">
       	    	<img src="<?php echo BASEURL; ?>images/banner.png" alt=""/>
            </div>
        </div>
    </div>
</div>
</div>



<div class="coin-export">
	<div class="container-fluid p-0">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="ce-para">
					<p>Coinexporter provides a one stop marketing solutions through campaigns for the cryptocurrency projects under a designed system that is associated with transparency for both the employers and the Direct Marketers. </p>
					<p>CoinExporter is an high impact web application with new generational marketing model services that bridges the gap in over-demanding of real, credible and results-oriented Marketing Agency. CoinExporter builds its project's utilities around and in marketing agency industry.</p>
				</div>
			</div>
			<div class="col-md-6 p-0">
				<div class="ce-img">
				<img src="{{BASEURL}}images/exportbgdark.png" alt="">
				</div>
			</div>
		</div>
	</div>
</div>



<div class="service-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="service-head text-center">
					<h2 class="mb-0">Our Services</h2>
					<p class="text">Our range of services cover the marketing agency, education,
                        entertainment, resource facilities, and coins/tokens listings
                        platforms
                    </p>
				</div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service1.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Promote-To- Earn</h5>
                        <p class="text">Influencers and non-crypto enthusiasts can create accounts
                            with CoinExporter and promote campaigns on their social
                            channels as instructed by the employers. Promoters decide
                            which to promote and which not to promote. The employers
                            decide how to promote and how much to pay. Anybody can
                            be monetized their social channels for marketing services
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service2.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Peer-To-Peer Marketplace </h5>
                        <p class="text">A centralized marketplace which allow influencers to
                            incorporate their services and gives the employers to
                            connect with them for marketing and promotion services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service3.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Expert Reviews Report</h5>
                        <p class="text">This is the CoinExporter education page where crypto
                            experts from CoinExporter, publish a comprehensive review
                            of the projects and focusing on the SWOT analysis, in order
                            to give the investors an informed decision</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service4.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Investment Call Support</h5>
                        <p class="text">This is the investment call page where investment for
                            presales, private sales or any other form of investment are
                            called for the projects after serious reviews by
                            CoinExporter’s experts of investment team</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service5.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">AI Marketing</h5>
                        <p class="text">Data-driven marketing, email marketing, social media
                            channels marketing and others as driven by our AI
                            Infrastructure </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service6.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Coins Fora</h5>
                        <p class="text">Decentralized platform for coins/tokens listing, chart,
                            market capitalization, opinions, progresses, events, and so
                            on, by the system, project owners and investors
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service7.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Decentralized Payment Service
                        </h5>
                        <p class="text">CoinExporter will provide a decentralized auxiliary payment
                            services on Blockchain Technology</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service8.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">Affiliate Marketing</h5>
                        <p class="text">Marketing of all digital securities and commodities using
                            crypto as payment medium</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="features-wrap-card text-center">
                    <div class="features-image">
                        <img src="{{BASEURL}}images/service9.png" alt="image">
                    </div>
                    <div class="features-content">
                        <h5 class="heading">NFTs Marketplace</h5>
                        <p class="text">Decentralized marketplace for marketing and promoting
                            NFTs collections to the investors and site visitors</p>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>




<div class="social-sec ptb-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="social-sec-head text-center">
					<h2 class="mb-0">Our Social Channels</h2>
					<p>Stay updated with all the latest news/update of CoinExporter by Social Channels </p>
				</div>
			</div>
            <hr class="spacer20px"/>
			<div class="col-md-3 col-lg-3 col-6">
				<div class="social-box">
					<a href="#" class="box-color1"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-6">
				<div class="social-box">
					<a href="#" ><i class="fab fa-facebook-square"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-lg col-6">
				<div class="social-box">
					<a href="#" class="box-color3"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-6">
				<div class="social-box">
					<a href="#" class="box-color4"><i class="fab fa-linkedin"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="market-sec ptb-50">
	<div class="container">
    <div class="row">
    	<div class="col-lg-9 col-md-10 m-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="market-title text-center">
                        <h2>What Direct Marketers Must Have?</h2>
                    </div>
                </div>
                <hr class="spacer30px"/>
                <div class="col-md-6 col-lg-6">
                    <div class="market-box">
                        <i class="fas fa-shield-check"></i>
                        <p>DIRECT MARKETERS must have a verified Facebook, Twitter, Discord, Youtube or Tik Tok accounts by CoinExporter. </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="market-box">
                        <i class="fas fa-search-dollar"></i>
                        <p>Direct Marketers with the verified cryptocurrency Telegram, Facebook and YouTube channels/pages/groups have more access to more jobs.</p>
                    </div>
                    
                </div>
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
					<h2>What They Are <br /> Saying About Us</h2>
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
								<img src="<?php echo BASEURL; ?>images/client.jpg" alt="">
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
								<img src="<?php echo BASEURL; ?>images/client1.jpg" alt="">
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


<section class="our-partners">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="our-partners_main owl-carousel">
					<a href="" class="partners_single">
						<img src="{{BASEURL}}images/partner-1.jpg" alt="">
                    </a>
					<a href="" class="partners_single">
						<img src="{{BASEURL}}images/partner-2.jpg" alt="">
                    </a>
					<a href="" class="partners_single">
						<img src="{{BASEURL}}images/partner-3.jpg" alt="">
                    </a>
					<a href="" class="partners_single">
						<img src="{{BASEURL}}images/partner-4.jpg" alt="">
                    </a>
					<a href="" class="partners_single">
						<img src="{{BASEURL}}images/partner-5.jpg" alt="">
                    </a>
				</div>
			</div>
		</div>
	</div>
</section>

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
	$('#adv-slider1').owlCarousel({
   lazyLoad: true,
        loop: true,
        margin:0,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        nav: false,
		dots: false,
        navText : ["<i class='far fa-chevron-left sp'></i>","<i class='far fa-chevron-right sp'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})	
	
</script>
<script>
	$('#adv-slider2').owlCarousel({
   lazyLoad: true,
        loop: true,
        margin:0,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        nav: false,
		dots: false,
        navText : ["<i class='far fa-chevron-left sp'></i>","<i class='far fa-chevron-right sp'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})	
	
</script>
<script>
	jQuery(".our-partners_main").owlCarousel({
	    lazyLoad: true,
	    loop: true,
	    margin:20,
	    responsiveClass: true,
	    animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
	    autoplay:true,
		autoplayTimeout:1500,
		autoplayHoverPause:false,
	    autoHeight: true,
	    mouseDrag: true,
		touchDrag: true,
	    smartSpeed: 1000,
	    nav: false,
	    //navText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
	    dots:false,
	    responsive: {
	        0: {
	            items: 2
	        },

	        600: {
	            items: 3
	        },

	        1024: {
	            items: 4
	        },

	        1366: {
	            items: 5
	        }
	    }
	});
</script>
@include("layout.footer")
