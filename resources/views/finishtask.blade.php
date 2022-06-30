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
                    <h3>Welcome to Finished Tasks page </h3>
                    <h4>Where you can see your completed tasks, their details and upload the proof of work done</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="finish-table ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="finish-head">
                    <div class="table_responsive_maas">                
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th width="10%">ID</th>
                                <th width="15%"> CAMPAIGN TYPE</th>
                                <th width="35%">UPLOAD PROOF(CLICK HERE TO UPLOAD)</th>
                                <th width="10%">PAYMENT</th>
                                <th width="10%">STATUS </th>
                                <th width="10%">DATE</th>
                                <th width="10%">APPEAL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td align="left">Fsgdh3987dhsd </td>
                                <td>Write reviews and post</td>
                                <td>Uploaded</td>
                                <td>$50 </td>
                                <td><a href="#"  style="color: #1dbb00;font-weight: 500;">Confirmed </a></td>
                                <td>10 June,2022</td>
                                <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#clickexampleModal">Click Here</a></td>
                              </tr>
                              <tr>
                                <td align="left">Hgvdsbjd84736bv</td>
                                <td>Write reviews and post</td>
                                <td>Click here to upload</td>
                                <td>$62 </td>
                                <td><a href="#"  style="color: #ff7600;font-weight: 500;">Pending </a></td>
                                <td>14 June,2022</td>
                                <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#clickexampleModal">Click Here</a></td>
                              </tr>
                              <tr>
                                <td align="left">Kjhsdg897hgd </td>
                                <td>Write reviews and post</td>
                                <td>Uploaded</td>
                                <td>$28 </td>
                                <td><a href="#" style="color: #ff2300;font-weight: 500;" data-bs-toggle="modal" data-bs-target="#cancelledexampleModal">Cancelled <span class="small-content">(Click to view reason)</span></a></td>
                                <td>16 June,2022</td>
                                <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#clickexampleModal">Click Here</a></td>
                              </tr>
                            </tbody>
                        </table>
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


<!--============================= cancelled =============================-->

<div class="modal fade" id="cancelledexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body can-modal">
        <img src="images/modal-bg.png" alt="">
        <h5 class="modal-title" id="exampleModalLabel">Reson</h5>
        <p>Your cryptocurrency telegram group is full of bots and inactive</p>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<!-- ========================== Click Here======================= -->
<div class="modal fade" id="clickexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 514px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Why do you appeal this task to the admin? <br />Clearly state your reason?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea rows="5" style="width: 100%;border-radius: 6px;border: 2px dashed #d5d5d5;padding: 10px 10px;" placeholder="write your reason here and submit to the admin. "></textarea>
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