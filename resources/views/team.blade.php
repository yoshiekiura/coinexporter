<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','Team')
@include("layout.menu")


<section class="ptb-50 dark-bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12">
        <div class="team-head">
          <h3 class="heading">Our Team Member</h3>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="team-box">
          <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="team-img">
                <img src="{{BASEURL}}images/team-1.png" alt="">
              </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
              <div class="team-content">
                <h5 class="heading">Chief Executive Officer (CEO)</h5>
                <p class="text">The CEO is a Product Researcher, Business Process Manager and Data Aggregator. CEO has six (6) years working experience as Business Process Manager, four (4) years as Product Researcher and three (3) years as Data Aggregator in different four (4) companies both within and outside his country.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="team-box box2">
          <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-sm-6">
              <div class="team-content">
                <h5 class="heading">Chief Operation Officer (COO)</h5>
                <p class="text">The Chief Operation Officer is an experienced Software Quality Assurance Expert with experience in Blockchain Technology and specialty in cryptocurrency. He has significant working experience with successful projects both within cryptocurrency and non-cryptocurrency space.  </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="team-img">
                <img src="{{BASEURL}}images/team-1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="team-box">
          <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="team-img">
                <img src="{{BASEURL}}images/team-1.png" alt="">
              </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
              <div class="team-content">
                <h5 class="heading">Chief Technology Officer (CTO)</h5>
                <p class="text">The Technical Assistant is a Full Stark developer with three (3) years working experience. Ceko has worked with and for successful projects both within cryptocurrency and non-cryptocurrency space.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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


<!--============================= Footer =============================-->


@include("layout.footer")