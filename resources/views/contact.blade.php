<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','Contact Us')
@include("layout.menu")

<div class="con-social-sec ptb-50">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3">
				<div class="con-social-box">
					<a href="#" class="box-color1"><i class="fab fa-facebook-f"></i></a>
					<p>Facebook</p>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="con-social-box">
					<a href="#" ><i class="fab fa-telegram-plane"></i></a>
					<p>Telegram</p>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="con-social-box">
					<a href="#" class="box-color3"><i class="fab fa-twitter"></i></a>
					<p>Twitter</p>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="con-social-box">
					<a href="#" class="box-color4"><i class="fab fa-instagram"></i></a>
					<p>Instagram</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contact-form">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-4 col-lg-4">
				<div class="cof-img">
					<img src="{{BASEURL}}images/contact-page.jpg" alt="">
					<div class="form-title">
						<h4>Leave A <br/> Meassage</h4>
						<a href="mailto:info@gmail.com">info@gmail.com</a>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="cof-form">
					<div class="cof-title">
						<h4>Get In Touch!</h4>
						<p>You can kindly contact us if you have not get what you want from FAQs or any part of this platform. </p>
						<p>We are ready and happy to reply. Thank you."</p>
					</div>
					<div class="form-sec">
						<form>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="input-box">
										<input type="email" class="form-control" placeholder="Your Full Name">
										<i class="fas fa-user"></i>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="input-box">
										<input type="email" class="form-control" placeholder="Your Email">
										<i class="fal fa-envelope"></i>
									</div>
								</div>
								<div class="col-md-12 col-lg-12">
									<div class="input-box">
										 <textarea class="form-control" placeholder="Write Message" rows="3"></textarea>
										 <i class="fas fa-pen"></i>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="captcha">
										<img src="{{BASEURL}}images/captcha.jpg" alt="">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-button">
										<button>Send Meassage</button>
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="faq-accodian ptb-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="faq-head text-center">
					<h2>FAQs</h2>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="accordion accordion-flush" id="accordionFlushExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingOne">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
				        How can I post campaign? 
				      </button>
				    </h2>
				    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingTwo">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
				        Can I stop my campaign anytime?
				      </button>
				    </h2>
				    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingThree">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
				      Can I open multiple accounts with the same social links? 
				      </button>
				    </h2>
				    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingfour">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
				      How can I be paid?
				      </button>
				    </h2>
				    <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingFive">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
				       How do I verify if my campaigns are done appropriately?
				      </button>
				    </h2>
				    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingSix">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
				      Can I report Direct Marketers for not appropriately promote my campaigns?
				      </button>
				    </h2>
				    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingSeven">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
				       How long does withdrawals take?
				      </button>
				    </h2>
				    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingEight">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
				      What are the important things I should know?
				      </button>
				    </h2>
				    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">
				      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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