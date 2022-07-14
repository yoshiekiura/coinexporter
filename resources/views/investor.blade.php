<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','Investors')
@include("layout.menu")

<section class="investor-sec ptb-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="token-img">
                    <img src="{{BASEURL}}images/about-token.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="token-content">
                    <h3 class="heading">Investors</h3>
                    <p class="text">The desire of every investor is to get involved in a good project with multiple streams of incomes which will give a significant Return-on-Investment (ROI). CoinExporter has taken this into consideration and has given it a complete solution, which is making this project to be investors based. </p>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="benifit-section ptb-50">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-sm-5 order-md-1">
            <div class="benifit-img">
              <img src="{{BASEURL}}images/benifit-th.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-7 col-sm-7">
          <div class="benifit-txt">
            <p class="text"> Investors who hold $COINEXPT, the CoinExporter native token will have opportunity to participate in the variety of the staking pools available to them and based on their interest. There are going to different staking pools of two categories: staking $COINEXPT and get $COINEXPT, while the other category is to stake $COINEXPT and get other valuable and amazing $COINS or $TOKENS from other projects who partner with CoinExporter.
                <br><br>
                Investors who hold $COINEXPT, the CoinExporter native token, stand a good chance to have significant Return-on-Investment (ROI) when the price of $COINEXPT appreciates over time.
                <br><br>
           Investors will have the opportunity to earn 20% of CoinExporter’s monthly revenue through staking pools.</p>
           
          </div>
        </div>
       
      </div>
    </div>
  </section>


<!--============================= Footer =============================-->


@include("layout.footer")
