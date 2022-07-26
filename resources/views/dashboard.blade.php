@include("layouts.header")
<div class="welcome-dashboard">
    <div class="container">
    @section('title', 'Job Space')
        @include("layouts.menu")
        <style>
   
   .ajax-loading{
     text-align: center;
   }
</style>
    </div>
</div>

<div class="dashboard-body">
    <div class="container">
                <!-- Alert Meassage -->

            <div class="container">
                @include("layouts.alert")

                @if (Session::has('success'))

            <div class="alert success-alert  alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>  
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('error') }}
            </div>
            @endif
            </div>

            <!-- Alert Meassage -->

  <div class="adv-banner">
	<div class="container">
    	<div class="row">
            <div class="col-lg-6 col-md-6 text-end">
				<div class="owl-carousel" id="adv-slider1">
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></a></div>
       	    		<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></a></div>
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></a></div>
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></a></div>
				</div>
			
            </div>
            <div class="col-lg-6 col-md-6 text-start">
       	    	<div class="owl-carousel" id="adv-slider2">
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></a></div>
       	    		<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></a></div>
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner2.jpg" alt=""/></a></div>
					<div class="item"><a href="#"><img src="<?php echo BASEURL; ?>images/banner1.jpg" alt=""/></a></div>
				</div>
			
            </div>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-lg-12">
                <div class="table_responsive_maas">
                <div class="scrolling-pagination">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                              
                                <th width="55%" style="text-align:left;"><input type="text" id="jobname" class="form-control" placeholder="Job Name">
                                    <!-- <button type="submit" class="btn btn-info"><i class="fas fa-search fa-sm"></i></button> -->
                                </th>
                                <!-- </form> -->
                                <th width="15%">
                                    <select class="selectbox-design " id="selpayment">
                                        <option value=" ">Payment</option>
                                        @foreach ($payments as $payment)
                                        <option name="campaign_earning" id="payment" data-payment="{{$payment->campaign_earning}}" value="{{$payment->campaign_earning}}">${{$payment->campaign_earning}}</option>
                                        @endforeach
                                       
                                    </select>
                                </th>
                                <th width="15%">Status</th>
                                <th width="15%">Done</th>
                            </tr>
                        </thead>
                        <tbody id="results"> 
                          
                        </tbody>
                    </table>
                    <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" width="50px;" height="50px;"/></div>
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
   
    $('#selpayment').on('change', function() {
        //load_more(page);
        var jobname = $('#jobname').val();
        var selpayment =  $('#selpayment').val();
       $.ajax({
            url: "{{ route('dashboard')}}",
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                'jobname': jobname,
                'selpayment': selpayment,
            },
            success: function(response) {
                $("#results").html('');
                $("#results").append(response);

            },
            error: function(response) {
                $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Social Channel Not Saved!</strong></div>');
            }
     });
    });
    $('#jobname').keyup(function(){
       // load_more(page);
        var jobname = $('#jobname').val();
        var selpayment =  $('#selpayment').val();
       $.ajax({
            url: "{{ route('dashboard')}}",
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                'jobname': jobname,
                'selpayment': selpayment,
            },
            success: function(response) {
                $("#results").html('');
                $("#results").append(response);
            },
            error: function(response) {
                $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Social Channel Not Saved!</strong></div>');
            }
     });
    });
   var SITEURL = "{{ url('/') }}";
   var page = 1; //track user scroll as page number, right now page number is 1
   load_more(page); //initial content load
   $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
       page++; //page number increment
       load_more(page); //load content   
      }
    });     
    function load_more(page){
        $.ajax({
           url: SITEURL+ "/jobspace?page=" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
            
              $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
           
            if(data.length == 0){
            console.log(data.length);
            //notify user if nothing to load
            $('.ajax-loading').html("No more records!");
            return;
          }
          $('.ajax-loading').hide(); //hide loading animation once data is received
          $("#results").append(data); //append data into #results element          
           console.log('data.length');
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }
//});
</script>
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
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    });
</script>
<script>
	$('#adv-slider1').owlCarousel({
   lazyLoad: true,
        loop: true,
        margin:0,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        nav: false,
		dots: false,
        navText : ["<i class='far fa-chevron-left sp'></i>","<i class='far fa-chevron-right sp'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})	
	
</script>
<script>
	$('#adv-slider2').owlCarousel({
   lazyLoad: true,
        loop: true,
        margin:0,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        nav: false,
		dots: false,
        navText : ["<i class='far fa-chevron-left sp'></i>","<i class='far fa-chevron-right sp'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})	
	
</script>

@include("layouts.footer")