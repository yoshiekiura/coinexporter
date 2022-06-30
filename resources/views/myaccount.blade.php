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
                    <h3>Welcome to “My Account” page</h3>
                    <h4>where you can update your profile to become Direct Marketer (Promoter), see transaction history, and some settings. Please, take note that most of what you do here require approval by CoinExporter</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="my-account-sec ptb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="table_responsive_maas">                
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th width="20%">Links </th>
                            <th width="40%">Social Channel Name</th>
                            <th width="20%">Status</th>
                            <th width="20%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="left">Personal Facebook </td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Personal Twitter</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Personal Tik Tok</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Personal Instagram</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Youtube</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Telegram Group/Channe</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Facebook Group/Page</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Instagram Page</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Twitter Page</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Blogging Site</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                          <tr>
                            <td align="left">Crypto Discord group</td>
                            <td></td>
                            <td></td>
                            <td><a href="#">Edit</a></td>
                          </tr>
                        </tbody>
                    </table>
                 </div>
            </div>
            <div class="col-lg-4 col-md-12">
                 <div class="profile-sec">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="p-box d-flex align-items-center">
                                <div class="pro-img">
                                    <img src="images/prof-img.jpg">
                                </div>
                                <div class="pro-title">
                                    <p>{{  Auth::user()->name  }}</p>
                                    <p>Email : <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="mid-pro-box">
                                    <div class="box1">
                                        <p>Country</p>
                                    </div>
                                    <div class="loc-pro"><p>Nigeria</p> <input type="checkbox" name=""></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="mid-pro-box">
                                    <div class="box1">
                                        <p>IP Address</p>
                                    </div>
                                    <div class="loc-pro"><p>199.770.98.67</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="pass-box">
                            <div class="row ">
                                <div class="col-lg-12 col-md-6">
                                    <div class="pass-title">
                                        <label>PASTE YOUR BSC WALLET ADDRESS ONLY</label>
                                        <input type="text" name="" placeholder="Wallet Address">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="pass-title">
                                        <label>CHANGE PASSWORD</label>
                                        <button data-bs-toggle="modal" data-bs-target="#changeModal">Click here to change password</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="transaction-sec ptb-50">
    <div class="container tran-bg">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6">
                <div class="tra-img">
                    <img src="images/tran-img4.png">
                </div> 
            </div>
             <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tran-head">
                            <h4>Transsction History</h4>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="tran-title">
                            <label>Total Pending Balance</label>
                            <input type="text" name="" placeholder="$">
                        </div>
                        <div class="tran-title">
                            <label>Total Actual Balance</label>
                            <input type="text" name="" placeholder="$">
                        </div>
                        <div class="tran-title">
                            <label>Total Balances</label>
                            <input type="text" name="" placeholder="$">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="tran-title">
                            <label>Referral Bonus Balance</label>
                            <input type="text" name="" placeholder="$">
                        </div>
                        <div class="tran-title">
                            <label>Campaign Bonus Balance</label>
                            <input type="text" name="" placeholder="$">
                        </div>
                        <div class="tran-title">
                            <label>Total Withdrawn Amount</label>
                            <input type="text" name="" placeholder="$">
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


<!-- ========================== change password modal======================= -->
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 385px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" >
       <img src="images/lock.png" style="max-width: 40%;">
       <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">Old Password</label>
            <input type="text" name="" style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">New Password</label>
            <input type="text" name=""  style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">Confirm New Password</label>
            <input type="text" name="" style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="margin-top: 30px; margin-bottom: 6px;">
            <button>Submit</button>
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