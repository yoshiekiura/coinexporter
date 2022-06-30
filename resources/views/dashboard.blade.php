
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
    
    
    <div class="dashboard-advertisment">
    	<div class="row">
            <div class="col-lg-6 col-md-6 text-end">
       	    	<img src="images/banner1.jpg" alt=""/>
            </div>
            <div class="col-lg-6 col-md-6 text-start">
       	    	<img src="images/banner2.jpg" alt=""/>
            </div>
        </div>
     </div>   
        
        
        <div class="row">
        	<div class="col-lg-12">
            	<div class="table_responsive_maas">                
                        <table class="table table-hover">
                        <thead>
                          <tr>
                         {{--   <form action="{{url('/search')}}" method="POST" role="search"> --}}
          {{csrf_field()}}
                            <th width="55%"  style="text-align:left;"><input type="text" class="form-control" placeholder="Job Name">
                            <!-- <button type="submit" class="btn btn-info"><i class="fas fa-search fa-sm"></i></button> -->
                            </th>
                        <!-- </form> -->
                            <th width="15%">
                            	<select class="selectbox-design ">
                                    <option>Payment</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </th>
                            <th width="15%">Status</th>
                            <th width="15%">Done</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                        $job_spaces = App\Models\JobSpace::all();
                        @endphp
                        @foreach ($job_spaces as $job_space)
                        <tr>
                            <td align="left">{{$job_space->campaign_name}}</td>
                            <td>${{$job_space->campaign_earning}}</td>
                           <?php if($job_space->status == 'active'){ ?>
                            <td><span class="rectangual-box"></span></td>
                            <?php }else{ ?>
                            <td><span class="rectangual-box" style="background-color:red;"></span></td>
                            <?php } ?>
                            <td>0/<sup>{{$job_space->promoters_needed}}</sup></td>
                          </tr>
                        @endforeach
                         
                        </tbody>
                      </table>
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