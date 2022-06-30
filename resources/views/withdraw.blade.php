<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CoinExporter</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="format-detection" content="telephone=no">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/fontawesome-all.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/animate.min.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/menu.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="assets/owl.carousel.css">
<script src="assets/owl.carousel.js"></script>


</head>
<body class="dashboard-pages">


@include("layouts.header")

<div class="welcome-dashboard">
	<div class="container">
    
  @include("layouts.menu")
    </div>
</div>

<div class="finish-task">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="finish-title">
                    <h3>Welcome to “Withdraw” page</h3>
                    <h4>where you can apply to withdraw funds into wallet address fixed to this account. Kindly make sure that the said wallet address is correctly fixed.</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="withdraw-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="with-img">
                    <img src="images/withdraw1.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="with-text">
                    <ul>
                        <li><span>You can only withdraw funds available in your <strong>“TOTAL ACTUAL BALANCE”</strong> </span></li>
                        <li><span>You can only withdraw minimum of <strong>$20</strong></span></li>
                        <li><span>Withdrawal request requires approval and it can happen between 1 min to 48 hours</span></li>
                        <li><span>Once you make withdraw, the exact funds will move from <strong>“TOTAL ACTUAL BALANCE ”</strong> to the <strong>“PENDIND WITHDRAWS BALANCE”</strong></span></li>
                        <li><span>Once you are paid, the exact funds will move from <strong>“PENDIND WITHDRAWS BALANCE” to “TOTAL WITHDRAWN AMOUNT”</strong></span></li>
                        <li><span>Your payment goes into the BSC Address attached to this account. </span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="balance-title">
                       <div class="row">
                           <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <label>Total Actual Balance</label>
                                    <input type="text" name="name" placeholder="$">
                                </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <label>Pending Withdraws Balance </label>
                                    <input type="text" name="name" placeholder="$" >
                                </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <label>Amount to withdraw </label>
                                    <input type="text" name="name" placeholder="$">
                                </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <button>Submit</button>
                                </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="with-complain-form">
                <div class="col-lg-10 col-md-10 mx-auto">
                   <div class="with-box2">
                        <div class="comlain-title">
                        <h5 style="text-align: center;">For any withdrawal complaint after 48 hrs of request, kindly send us your details as follows</h5>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-md-4">
                            <div class="selct-bal">
                                <label>Requested Amount </label>
                                <input type="text" name="name" placeholder="$">
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-4">
                            <div class="selct-bal">
                                <label>Date of Request</label>
                                <input type="text" name="name" placeholder="$" >
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-4">
                            <div class="selct-bal">
                                <label>Time of Request</label>
                                <input type="text" name="name" placeholder="$">
                            </div>
                       </div>
                       <div class="col-lg-6 col-md-6">
                            <div class="selct-bal">
                                <label>Write Us Any Additional Message</label>
                                <input type="text" name="name" placeholder="$">
                            </div>
                       </div>
                       <div class="col-lg-6 col-md-6">
                            <div class="selct-bal">
                                <button>Submit</button>
                            </div>
                       </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
       







<div class="dashboard-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                &copy; 2009 - 2022 Coin Exporter, All Rights Reserved 
            </div>
        </div>
    </div>
</div>


<!--============================= Sign In Modal =============================-->



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