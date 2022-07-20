<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','Tokenomics')
@include("layout.menu")

<section class="ptb-50 token-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="tokenomic-img">
                    <img src="{{BASEURL}}images/project-style2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="with-text">
                    <h5>TOKEN ALLOCATION</h5>
                    <ul>
                        <li>Total Supply = 100,000,000 $COINEXPT</li>
                        <li>Circulating Supply = 100,000,000 $COINEXPT</li>
                        <li>Presale = 35,000,000 $COINEXPT</li>
                        <li>Liquidity = 35,000,000 $COINEXPT</li>
                        <li>Staking  = 15,000,000 $COINEXPT</li>
                        <li>Marketing and Development = 10,000,000 $COINEXPT</li>
                        <li>Team = 5,000,000 $COINEXPT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ptb-50 token-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="with-text">
                            <h5>TAX DISTRIBUTION</h5>
                            <ul>
                                <li>5% Liquidity</li>
                                <li>3% Marketing and Development</li>
                                <li>2% Staking </li>
                                <li>5% Staking</li>
                                <li>5% Marketing and Development </li>
                                <li>2% Partnerships </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class=" with-text">
                            <h5>TRANSACTION TAX	</h5>
                            <ul>
                                <li>Buy Tax = 10%</li>
                                <li>Buy Tax = 10%</li>
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="tokenomic-img">
                    <img src="{{BASEURL}}images/about3.png" alt="">
                </div>
            </div>
            
        </div>
    </div>
</section>



<!--============================= Footer =============================-->


@include("layout.footer")
