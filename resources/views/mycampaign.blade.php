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

<style>
    .hide {
  display: none;
}

.control-label .text-info { display:inline-block; }
</style>
</head>
<body class="dashboard-pages">

@include("layouts.header")

<div class="welcome-dashboard">
	<div class="container">
    
  @include("layouts.menu")
    </div>
</div>

<div class="campaign-sec">
    <div class="container">
        <div class="tab-box">
            <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{ $message }}</strong>
              </div>
              @endif
              @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{ $message }}</strong>
              </div>
              @endif
                <div class="row">
                    <form action="{{route('mycampaignstore')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="col-lg-12 col-md-10 mx-auto">
                        <div class="tab-text">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation" style="width: 100%;">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">For new mass promotion campaign placement application, kindly click</button>
                              </li>
                              <li class="nav-item" role="presentation" style="width: 100%;">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">For new banner placement application on CoinExporter, AMA and other form of promotion services on CoinExporter Telegram, Youtube, Facebook, Twitter and so on, kindly click</button>
                              </li>
                            </ul>
                            <!-- tab content -->
                      
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <!-- <form> -->
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="selct-box">
                                                    <label class="form-label">Campaign Type</label>
                                                    <select class="form-select" name="campaign_type">
                                                    
                                                    @php 
                                                    $campaign_category = App\Models\CampaignCategory::all();
                                                    @endphp
                                                    @foreach ($campaign_category as $campaign_categoryy)
                                                        <option value="{{ $campaign_categoryy->id }}">{{ $campaign_categoryy->campaign_category_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('campaign_type')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="selct-box">
                                                    <label  class="form-label">Select Social platform for campaign</label>
                                                    <select class="form-select" name="social_platform">
                                                    @php
                                                    $social_platform = App\Models\CampaignSubCategory::all();
                                                    @endphp
                                                    @foreach ($social_platform as $social_platforms)
                                                        <option value="{{ $social_platforms->id }}">{{ $social_platforms->campaign_subcategory_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('social_platform')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                          
                                            <div class="col-lg-6">
                                                <div class="selct-box">
                                                    <label class="form-label">Select Target countries of whom to promote campaign</label>
                                                    <span>All</span>
                                                    <select class="form-select contry" style="padding-left: 45px;" name="country[]" multiple>
                                                    @php
                                                    $countries = App\Models\Country::all();
                                                    @endphp
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                    @endforeach
                                                      </select>
                                                </div>
                                                <p>Press CTRL and click above button to select multiple options at once.</p>
                                                @error('country')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                              <td scope="row">Facebook PR</td>
                                              <td><a href="#">Click here to reach agent</a></td>
                                            </tr>
                                            <tr>
                                              <td scope="row">Twitter PR </td>
                                              <td><a href="#">Click here to reach agent</a></td>
                                            </tr>
                                            <tr>
                                              <td scope="row">Telegram PR </td>
                                              <td><a href="#">Click here to reach agent</a></td>
                                            </tr>
                                            <tr>
                                              <td scope="row">Instagram PR  </td>
                                              <td><a href="#">Click here to reach agent</a></td>
                                            </tr>
                                            <tr>
                                              <td scope="row">Youtube PR </td>
                                              <td><a href="#">Click here to reach agent</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto">
                        <div class="text-box">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="txt-area">
                                        <label for="comment">Describe your campaign </label>
                                        <textarea class="form-control" rows="6" id="comment" name="campaign_desc" placeholder="Clearly state what you want and how you want the promoters to promote your campaign "></textarea>
                                       
                                    </div>
                                    @error('campaign_desc')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="txt-area">
                                        <label for="comment">What do you need as evidence of work done? </label>
                                        <textarea class="form-control" rows="6" id="comment" name="campaign_proof_desc" placeholder="Clearly state what you want as the proof of work done. e.g: links, screenshots upload and so on.  "></textarea>
                                    </div>
                                    @error('campaign_proof_desc')
                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto">
                        <div class="video-sec ptb-50">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">What do you want to upload ?</label>
                                    <select class="form-select div-toggle" data-target=".my-info-1" name="file_type">
                                        <option value="video" data-show=".citrus">Video</option>
                                        <option value="banner" data-show=".citrus">Banner</option>
                                        <option value="text_content" data-show=".pome">Text Content</option>
                                    </select>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                      <div class="my-info-1">
                                          <div class="citrus hide"> 
                                              <div class="drop-zone">
                                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                                <input type="file"  class="drop-zone__input" name="file_name">
                                              </div>
                                              <div class="button-box">
                                                  <button type="button">Upload</button>
                                                  <button type="button" class="pre">Preview</button>
                                                  <button type="button" class="del">Delete</button>
                                              </div>
                                          </div>
                                          <div class="hide"> 
                                              <div class="drop-zone">
                                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                                <input type="file" name="file_name1" class="drop-zone__input">
                                              </div>
                                              <div class="button-box">
                                                  <button type="button">Upload</button>
                                                  <button type="button" class="pre">Preview</button>
                                                  <button type="button" class="del">Delete</button>
                                              </div>
                                          </div>
                                          <div class="pome hide">
                                              <div class="drop-text">
                                                <textarea rows="8" name="text_content"></textarea>
                                              </div>
                                              <div class="button-box">
                                                  <button type="button">Submit</button>
                                                  <button type="button" class="pre">Edit</button>
                                                  <button type="button" class="del">Delete</button>
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="row align-items-center cost-box ">
                            <div class="col-lg-6 col-md-6">
                                <div class="title">
                                    <p>To get the campaign cost, tell us number of PROMOTERS (DIRECT MARKETERS) you need for this campaign and how much you can pay each of them.</p>
                                </div>
                                <div class="cost-input">
                                    <label>Promoters Needed (Minimum of 1)</label>
                                    <input type="text" name="promoters_needed" placeholder="Type numbers">
                                    @error('promoters_needed')
                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6">
                                
                                <div class="cost-input">
                                    <label>Promoter to Earn</label>
                                    <input type="text" name="promoters_earn" placeholder="Type amount each">
                                    @error('promoters_earn')
                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="cost-input">
                                    <label>Campaign Cost</label>
                                    <input type="text" id="camp_cost" onchange="costFunction()" name="campaign_cost" placeholder="Total cost">
                                    @error('campaign_cost')
                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="row color-sec">
                            <div class="col-lg-6 col-md-6">
                                <div class="coo-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="color-check">
                                                <p>Select Color</p>
                                                <input type="checkbox" name="colors[]" value="LG">LG
                                                <input type="checkbox" name="colors[]" value="Y">Y
                                                <input type="checkbox" name="colors[]" value="L">L
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="color-check2">
                                                <p><input type="checkbox" name="">Highlight My Campaign ($0.3)(OPTIONAL)</p>
                                                <p><strong>BENEFITS:</strong></p>
                                                <ul>
                                                    <li>Appear with background highlighted effect</li>
                                                    <li>Easily gets the attention of promoters</li>
                                                    <li>Looks aesthetic </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6">
                                <div class="coo-box">
                                    <div class="color-check2">
                                        <p><input type="checkbox" name="">Highlight My Campaign ($0.3)(OPTIONAL)</p>
                                        <p><strong>BENEFITS:</strong></p>
                                        <ul>
                                            <li>Always randomly appear ontop</li>
                                            <li>Easily gets the attention of promoters</li>
                                             </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="with-img">
                                    <img src="images/withdraw2.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="with-text">
                                    <ul>
                                        <li>Select campaign admin</li>
                                        <li>Copy wallet address and make UDST or BUSD payment in BEP 20 only</li>
                                        <li>Click Paid botton</li>
                                        <li>Paste and send your payment transaction harsh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="campaign-admin">
                            <div class="table_responsive_maas">                
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th width="20%">CAMPAIGN ADMINS</th>
                                        <th width="20%">WALLET ADDRESS</th>
                                        <th width="10%">PAID?</th>
                                        <th width="40%">TRANSACTION HARSH</th>
                                        <th width="10%">SEND?</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $tvl_admins = DB::select('select * from tvl_admins where user_type="Campaign Admin"');//
                                    @endphp
                                    @foreach ($tvl_admins as $tvl_admin)
                                      <tr>
                                        <td align="left">{{$tvl_admin->designation}}</td>
                                        <td>{{$tvl_admin->wallet_address}}</td>
                                        <td><div class="controls"><a onclick="myFunction()">Paid</a></div></td>
                                         <td><input type="text" id="trans_amt" name="transaction_amt" class="form-control" style="width: 235px;position: relative;margin-left: 100px;"></td>
                                        <td>Send</td>
                                      </tr>
                                      <script>
                                        function costFunction() {
                                          var x = document.getElementById("camp_cost").value;
                                          document.getElementById("trans_amt").value = x;
                                        }
                                    // function myFunction() {
                                    //   document.getElementById("trans_amt").value = "Johnny Bravo";
                                    // }
                                    </script>
                                      @endforeach
                                      
                                    </tbody>
                                </table>
                             </div>
                             <div class="admin-button">
                                 <button type="submit">Click here to submit campaign</button>
                             </div>
                        </div>
                    </div>
                 </form> 
                    <div class="col-lg-12 mx-auto finish-head">
                         <div class="table_responsive_maas">                
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th width="5%">ID </th>
                                        <th width="10%">Campaign Type</th>
                                        <th width="5%">Status</th>
                                        <th width="20%">History Page</th>
                                        <th width="10%">Campaign Upload</th>
                                        <th width="10%">Date </th>
                                        <th width="40%">Social To Promote campaign</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td align="left">Ksjhgfd76dgh </td>
                                        <td>Write reviews and post</td>
                                        <td style="color: #e11010;font-weight: 500;">Rejected</td>
                                        <td><a href="{{route('history')}}" class="click">Click </a></td>
                                        <td>Text </td>
                                        <td>11 June,2022</td>
                                        <td>Facebook</td>
                                      </tr>
                                       <tr>
                                        <td align="left">Hjgsc86ewbvcn </td>
                                        <td>Write reviews and post</td>
                                        <td style="color: #ff7600;font-weight: 500;">Pending </td>
                                        <td><a href="{{route('history')}}" class="click">Click </a></td>
                                        <td>Banner</td>
                                        <td>12 June,2022</td>
                                        <td>Twitter</td>
                                      </tr>
                                       <tr>
                                        <td align="left">Jshgdc6789hc </td>
                                        <td>Write reviews and post</td>
                                        <td style="color: #1dbb00;font-weight: 500;">Published </td>
                                        <td><a href="{{route('history')}}" class="click">Click </a></td>
                                        <td>Video</td>
                                        <td>11 June,2022</td>
                                        <td>Facebook</td>
                                      </tr>
                                      
                                    </tbody>
                                </table>
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


<!--============================= campaign Modal =============================-->

<div class="modal fade" id="campaignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 963px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body can-modal finish-head">
       <div class="table_responsive_maas">                
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="10%">Promoter’s ID</th>
                    <th width="10%">Campaign Type</th>
                    <th width="10%">Status</th>
                    <th width="10%">Social link </th>
                    <th width="20%">Submitted Proof</th>
                    <th width="10%">Time </th>
                    <th width="10%">Date </th>
                    <th width="10%">Confirm</th>
                    <th width="10%">Reject</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="left">Sghv87cb</td>
                    <td>Write reviewsand post</td>
                    <td style="color: #1dbb00;font-weight: 500;">Confirmed </td>
                    <td><a href="#">Fb.harana.com</a></td>
                    <td><a href="#">Click to view</a></td>
                    <td>12:23 UTC</td>
                    <td>12 June, 2022</td>
                    <td><a href="#" class="click">Click</a></td>
                    <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#rejectModal">Click</a></td>
                  </tr>
                   <tr>
                    <td align="left">Hgd67sgh </td>
                    <td>Write reviews and post</td>
                    <td style="color: #ff7600;font-weight: 500;">Pending </td>
                    <td><a href="#">Fb.yusuf.com</a></td>
                      <td><a href="#">Click to view</a></td>
                    <td>12:43UTC</td>
                    <td>12 June, 2022</td>
                    <td><a href="#" class="click">Click</a></td>
                    <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#rejectModal">Click</a></td>
                  </tr>
                  
                </tbody>
            </table>
         </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 472px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body rej-modal">
        <div class="rejcet-img">
            <img src="images/reject-taskbg.png">
        </div>
        <div class="reject-txt">
            <h5>State reason for rejecting the task</h5>
            <textarea  placeholder="write your reason here and submit to admin to review your complaints" rows="5" >    
            </textarea>

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

<script>
    $(document).on('change', '.div-toggle', function() {
      var target = $(this).data('target');
      var show = $("option:selected", this).data('show');
      $(target).children().addClass('hide');
      $(show).removeClass('hide');
    });
    $(document).ready(function(){
        $('.div-toggle').trigger('change');
    });
</script>


<script>
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

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