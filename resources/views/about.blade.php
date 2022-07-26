<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','About Us')
@include("layout.menu")



<div class="top-about ptb-50">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-img">
					<img src="{{BASEURL}}images/about.png" alt="">
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

<div class="top-about ptb-50">
	<div class="container">
		<div class="row align-items-center  flex-column-reverse flex-sm-row flex-md-row flex-lg-row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-txt">
					<h3 class="heading">The Problem</h3>
					<p>The dream of every project, business or brand is to succeed. For this, every cryptocurrency project needs
						a wide range of impactful, data-based, solution-driven and targeted campaigns. Big, small and medium
						size influencers are available with varieties of promotion services but the employers are faced with
						serious challenges ranging from outsourcing the genuine influencers, high cost of services, inability to
						review the work and policing of the works done, and so on, are time-consuming and inefficient. </p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="about-img">
					<img src="{{BASEURL}}images/problem.png" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="top-about ptb-50">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="about-img">
					<img src="{{BASEURL}}images/solution.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-txt">
					<h3 class="heading">The Solution</h3>
					<p>CoinExporter understands the varieties of challenges the projects owners are facing in the cryptocurrency
						ecosystem when it comes to marketing and promotion. This is why CoinExporter is developing the
						product that is AI powered and engineered with modern technological infrastructure including machine
						learning to address most of those concerns. Among others, CoinExporter is a centralized marketing
						agency that provides the platform for small, medium and big influencers to execute a promotion
						campaigns and earn. The employers will have all the possibilities to monitor and manage the influencers
						with the jobs they have agreed to promote. CoinExporter is providing a scalable and improvable
						technological infrastructure that will bring relief to the employers, creating sustainable development in the
						areas of our target services and to become a mainstream company in the cryptocurrency space.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="top-about ptb-50">
	<div class="container">
		<div class="row align-items-center  flex-column-reverse flex-sm-row flex-md-row flex-lg-row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="top-ab-txt">
					<h3 class="heading">The Impact</h3>
					<p>CoinExporter’s solution will provide an easy access to the employers to meet small, medium and big
						influencers with genuine services that are cost efficient. Thereby, bridging the gap in the high cost and
						less efficient marketing and promotion services and providing more possibilities for crypto enthusiasts to
						work to earn and or get credible information as regards to other varieties of services offered by
						CoinExporter. </p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="about-img">
					<img src="{{BASEURL}}images/impact.png" alt="">
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
					<img src="{{BASEURL}}images/about2.jpg" alt="">
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
								<img src="{{BASEURL}}images/client.jpg" alt="">
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
								<img src="{{BASEURL}}images/client1.jpg" alt="">
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

@include("layout.footer")