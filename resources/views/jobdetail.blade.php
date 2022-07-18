@include("layouts.header")

<!-- Alert Meassage -->

<div class="container">
    @include("layouts.alert")

    @if (Session::has('success'))
    <div class="alert success-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('success') }}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class=" alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>

<!-- Alert Meassage -->

<div class="welcome-dashboard">
    <div class="container">
    @section('title', 'Job Details')
        @include("layouts.menu")
    </div>
</div>
@php 
$userId = Auth::user()->id;
 $data = App\Models\JobDone::select("proof_of_work as pof")->where("campaign_id",$jobSpaceData->id)->where("user_id",$userId)->count();
 
@endphp
<div class="email-zip ptb-50">
    <div class="container">
    <form method="POST" action="{{ route('jobdetail.update') }}" enctype="multipart/form-data">
            @csrf
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="email-zip-title with-text">
                    <h3 class="heading">Email/Zip Submit Sign Up</h3>
                    <ul>
                    <li><span> <strong>Work done: </strong> </span>{{$data}}/ <sup> {{ $jobSpaceData->promoters_needed }}</sup></li>
                        <li><span> <strong>You will earn: </strong></span> $ {{ $jobSpaceData->campaign_earning }}</li>
                        <li><span> <strong>Campaign ID : </strong> </span>{{ $jobSpaceData->id }}</li>
                        <li><span> <strong>Campaign Name : </strong> </span>{{ $jobSpaceData->campaign_name }}</li>
                        <li><span> <strong>Required social platform for campaign: </strong></span> {{ $jobSpaceData->social_platform_name }}</li>
                        @php
                         $job_space_Country = $jobSpaceData->country ;
                         $exploded_country = explode(",",$job_space_Country);
                         if($exploded_country){
                            $tmp = '';
                            foreach($exploded_country as $val) {
                                $country_name = App\Models\Country::where('id',$val)->first()->country_name;
                                $tmp .= $country_name . ','; 
                            }
                            $tmp = trim($tmp, ',');  
                         }
                         @endphp

                        <li><span><strong> Eligible Country(ies):</strong></span>{{$tmp}}</li>
                        <li><span><strong> What is expected from campaign promoters: </strong></span>{{ $jobSpaceData->campaign_req }}</li>
                        <li><span><strong> Required evidence as proof of workdone: </strong> </span>{{ $jobSpaceData->campaign_proof }}</li>
                        <li><span><strong>Are you interested to promote this campaign?</strong></span></li>
                    </ul>
                    <div class="check-input-option form-group">
                        <input id="Option2" type="radio" name="intrest_to_promote" value="yes" checked>
                        <label> YES</label>
                        <input id="Option3" type="radio" name="intrest_to_promote" value="no">
                        <label>NO</label>
                    </div> 
                    <div id="dvPassport" style="display: none">
                        <label for=""> Why No:</label>
                        <textarea name="reason" cols="30" rows="4" id="txtPassportNumber"></textarea>
                        <!-- <button>Submit</button> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="email-zip-img">
                    <img src="<?php echo BASEURL; ?>images/email-zip.png" alt="">
                </div>
            </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <center>
                        <div class="email-box-area">
                        
                            <input type="hidden" name="campainEarning" value="{{$jobSpaceData->campaign_earning}}">
                            <input type="hidden" name="campainId" value="{{$jobSpaceData->id}}">
                            <button>SUBMIT: I agreed that I have duly completed this task as instructed</button>
                        </div>
                     </center>
    </form>
            </div>
            
        </div> 
      
    </div>
</div>

<div class="ptb-50 box-download">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="title text-center">
                    <h4 class="heading">Uploaded Content For Campaign Promotion Purposes</h4>
                    <p class="text">(You can download videos, banners or copy the text. You can also share directly to your desired social platform)</p>
                    <?php $ext = pathinfo($jobSpaceData->file_name, PATHINFO_EXTENSION);?>
                         @if(($ext == 'mp4') || ($ext == 'mp3') || ($ext == 'pdf') || ($ext == 'gif'))
                         <form  action="{{route('downloadfile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <iframe src="<?php echo BASEURL; ?>uploads/{{$jobSpaceData->file_name}}" width="300" height="250"></iframe><br>
                        <input type="hidden" name="campaign_id" value="{{ $jobSpaceData->id }}">
                        <button class="btn1" type="submit">Download</button>
                        </form>
                        @elseif(($ext == 'png') || ($ext == 'PNG') || ($ext == 'jpg') || ($ext == 'JPG') || ($ext == 'jpeg') || ($ext == 'JPEG'))
                        <form action="{{route('downloadfile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <img src="<?php echo BASEURL; ?>uploads/{{$jobSpaceData->file_name}}" width="300" height="300"><br>
                        <input type="hidden" name="campaign_id" value="{{ $jobSpaceData->id }}">
                        <button class="btn1" type="submit">Download</button>
                        </form>
                        @else
                        @if(empty($jobSpaceData->file_name))
                        <textarea name="" cols="30" rows="7" id="txtPassportNumber" class="copy_text">N/A</textarea><br>
                        <br>
                        <button class="btn1">Download</button>
                        <button class="btn1 copy">Copy Text</button>
                        @else
                        <textarea name="" cols="30" rows="7" id="txtPassportNumber" class="copy_text">{{$jobSpaceData->file_name}}</textarea><br>
                        <button class="btn1 copy">Copy Text</button>
                        @endif
                        @endif
                  
                    <div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top:40px;">
            <!----Share This Buttons Start -->
            <div class="sharethis-inline-share-buttons"></div>
            <!----Share This Buttons End -->
        </div>
    </div>
</div>


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
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
<script>
    $(function () {
        $("#Option3").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
               
            } 
        });
        $("#Option2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").hide();
               
            }
        });
    });
</script>
<script>
    const $ = (data) => document.querySelector(data)

    let btn = $('.copy')
    let copyText = $('.copy_text')
    btn.addEventListener('click',(e)=>{
    e.preventDefault()
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    /* Copy the text inside the text field */
    document.execCommand("copy");
    /* Alert the copied text */
   // alert("Coupon is : " + copyText.value);
    })
</script>
<!--============================= Scripts =============================-->


<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>