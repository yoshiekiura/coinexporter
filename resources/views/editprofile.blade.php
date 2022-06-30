
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

<div class="dashboard-body">
	<div class="container">
    

        <div class="row">
        	<div class="col-lg-3 col-md-3">
				<div class="flat-user">
					<div class="avatar">
						<img src="images/user_pic.jpg" alt="image">
						<div class="change_photo">
							<a href="#" class="change_btn"><i class="far fa-camera"></i> Change Photo</a>
						</div>
					</div>
					<h3 class="name">{{ Auth::user()->name }}</h3>
					<div class="profile-usermenu">
						<ul>
							<li class="dropdown-item active"><a href="#"><i class="fas fa-male"></i>Edit Profile</a></li>
							<li class="dropdown-item"><a href="#"><i class="fas fa-cogs"></i>Settings</a></li>
							<li class="dropdown-item"><a href="{{ route('myaccount') }}"><i class="fas fa-envelope"></i>My Account </a></li>
							<li class="dropdown-item"><a href="#"><i class="fas fa-key"></i>Change Password</a></li>
							<li class="dropdown-item"><a href="{{ route('logout') }}"><i class="fas fa-power-off"></i>Sign Out</a></li>
						</ul>
					</div>
				</div>
            </div>
			<div class="col-lg-9 col-md-9">
            	
				<div class="flat-tabs style2" data-effect="fadeIn">
                    
                    <div class="content-tab listing-user profile">
                        	<div class="content-inner active" style="display: block;">
                            	<div class="edit_profile">
                                	<div class="dashboard-form-area">
                	
                        
                            <div class="row">
                                <div class="col-md-6 form-group">
                                	<label>Name</label><input type="text" name="form_name" class="form-control" value="" placeholder="Your Name*" required="" aria-required="true">
                                </div>
                                <div class="col-md-6 ">
                                 <label>Email</label>
                                    <input type="text" name="form_name" class="form-control" value="" placeholder="Your  Mail*" required="" aria-required="true">
                                </div>
                            </div>
                        
                        
                            <div class="row">
                                <div class="col-md-6 form-group"><label>Phone</label>
                               	 <input type="text" name="form_name" value="" class="form-control" placeholder="your phone*" required="" aria-required="true"></div>
                                <div class="col-md-6 form-group">
                                 <label>Password</label>
                                    <input type="Password" name="form_name" class="form-control" value="" placeholder="your phone*" required="" aria-required="true">
                                </div>
                            </div>
										
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input id="Option2" type="checkbox">
                                    <label class="checkbox" for="Option2"> YES</label>
                                    <input id="Option3" type="checkbox" checked="">
                                    <label class="checkbox" for="Option3">NO</label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="radio radio-primary">
                                        <input type="radio" name="radio1" id="radio1" value="option1">
                                        <label for="radio1">Small</label>
                                    </span>
                                    <span class="radio radio-primary">
                                        <input type="radio" name="radio1" id="radio2" value="option2" checked="">
                                        <label for="radio2">Small</label>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <textarea name="form_message" class="form-control" placeholder="Your Message.." required="" aria-required="true"></textarea>
                                </div>
                            </div>
                        

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="btn-style-one" type="submit" data-loading-text="Please wait...">Submit</button>
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