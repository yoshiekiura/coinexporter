

  @include("layouts.header")

  <div class="welcome-dashboard">
    <div class="container">
    @section('title', 'My Campaign')
      @include("layouts.menu")
    </div>
  </div>

  <div class="campaign-sec">
    <div class="container">
      <div class="tab-box">
        <div class="container">
          @include("layouts.alert")

          @if (Session::has('success'))
          <div class="alert success-alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
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
                              @if (old('campaign_type') == $campaign_categoryy->id)
                              <option value="{{ $campaign_categoryy->id }}" selected>{{ $campaign_categoryy->campaign_category_name }}</option>
                              @else
                              <option value="{{ $campaign_categoryy->id }}">{{ $campaign_categoryy->campaign_category_name }}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                          @error('campaign_type')
                          <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-lg-6">
                          <div class="selct-box">
                            <label class="form-label">Select Social platform for campaign</label>
                            <select class="form-select" name="social_platform">
                              @php
                              $social_platform = App\Models\SocialPlatform::all();
                              @endphp
                              @foreach ($social_platform as $social_platforms)
                              @if (old('social_platform') == $social_platforms->id)
                              <option value="{{ $social_platforms->id }}" selected>{{ $social_platforms->social_platform_name }}</option>
                              @else
                              <option value="{{ $social_platforms->id }}">{{ $social_platforms->social_platform_name }}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                          @error('social_platform')
                          <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="selct-box">
                            <label class="form-label">Select Target countries of whom to promote campaign</label>
                            <select id="multipleselect" multiple name="country[]" placeholder="Choose Country" data-search="true" data silent-initial-value-set="true" id="country">
                              @php
                              $countries = App\Models\Country::all();
                              @endphp
                              @foreach ($countries as $country)
                           
                              <option value="{{ $country->id }}" {{ (is_array(old('country')) and in_array("$country->id ", old('country'))) ? ' selected' : '' }}>{{ $country->country_name }}</option>
                              @endforeach
                            </select>
                          </div>

                          @error('country')
                          <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-lg-6">
                          <div class="selct-box">
                            <label class="form-label">Referral Code (If Any)</label>
                            <input type="text" class="form-control" name="referral_code" value="{{old('referral_code')}}" placeholder="Enter your Referral Code">
                          </div>

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
                            <td scope="row">Instagram PR </td>
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
                        <textarea class="form-control" rows="6" id="comment" name="campaign_desc" placeholder="Clearly state what you want and how you want the promoters to promote your campaign " >{{old('campaign_desc')}}</textarea>

                      </div>
                      @error('campaign_desc')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="txt-area">
                        <label for="comment">What do you need as evidence of work done? </label>
                        <textarea class="form-control" rows="6" id="comment" name="campaign_proof_desc" placeholder="Clearly state what you want as the proof of work done. e.g: links, screenshots upload and so on.  " >{{old('campaign_proof_desc')}}</textarea>
                      </div>
                      @error('campaign_proof_desc')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
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
                      <option value="" data-show=".citrus" selected disabled>Select</option>
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
                            <input type="file" class="drop-zone__input" name="file_name">
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
                      <input type="text" class="promoterNeed form-control" id="proNeeded" name="promoters_needed" placeholder="Type numbers" value="{{old('promoters_needed')}}">
                      @error('promoters_needed')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">

                    <div class="cost-input">
                      <label>Promoter to Earn</label>
                      <input type="text" class="campCalculation form-control" id="proEarn" name="promoters_earn" placeholder="Type amount each" value="{{old('promoters_earn')}}">
                      @error('promoters_earn')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="cost-input">
                      <label>Campaign Cost</label>
                      <input type="text" id="camp_cost" class="form-control" onchange="costFunction()" name="campaign_cost" placeholder="Campaign Cost" value="{{old('campaign_cost')}}" readonly>
                      @error('campaign_cost')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
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
                            <input type="radio" name="colors" id="highlight_color" value="LG" @if (old('colors') == 'LG') checked @endif data-price="0.3">&nbsp;<label>LG</label>
                            <input type="radio" name="colors" id="highlight_color" value="Y" @if (old('colors') == 'Y') checked @endif data-price="0.3">&nbsp;<label>Y</label>
                            <input type="radio" name="colors" id="highlight_color" value="L" @if (old('colors') == 'L') checked @endif data-price="0.3">&nbsp;<label>L</label>
                          </div>
                          
                        </div>
                        <div class="col-lg-12">
                          <div class="color-check2">
                           <p> Highlight My Campaign ($0.3)(OPTIONAL)</p>
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
                      <!-- style="display:block; !important" -->
                        <input type="checkbox" name="featured_campaign" id="featured_campaign" value="1" @if (old('featured_campaign') == '1') checked @endif data-price="0.7" style="display:inline-block;">&nbsp;
                        <label>Featured My Campaign ($0.7)(OPTIONAL)</label>
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
                      <img src="<?php echo BASEURL; ?>images/withdraw2.png" alt="">
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
                    <table class="table table-hover" id="example"> 
                      <thead>
                        <tr>
                          <th width="20%">CAMPAIGN ADMINS</th>
                          <th width="20%">WALLET ADDRESS</th>
                          <th width="10%">PAID?</th>
                          <th width="40%">TRANSACTION HARSH</th>
                          <!-- <th width="10%">SEND?</th> -->
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($tvl_admins as $tvl_admin)
                        <tr>
                          <td align="left"><div class="selct-box">
                            <select class="form-select" name="designation">

                              @php
                              $designations = App\Models\Designation::all();
                              @endphp
                              @foreach ($designations as $designation)
                              @if (old('designation') == $designation->id)
                              <option value="{{ $designation->id }}" selected>{{ $designation->designation_name }}</option>
                              @else
                              <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                           </td>
                          <td>{{$tvl_admin->wallet_address}}</td>
                          <td>
                            <div class="controls"><a >Paid</a></div>
                          </td>
                          <td>
                            <input type="text" id="trans_amt" name="transaction_amt" class="form-control" style="width: 235px;position: relative;margin-left: 100px;" value="{{old('transaction_amt')}}">
                            @error('transaction_amt')
                      <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror</td>
                          <!-- <td><button type="button" id="submit">Send</td> -->
                        </tr>
                        <!-- <script>
                          function costFunction() {
                            var x = document.getElementById("camp_cost").value;
                            document.getElementById("trans_amt").value = x;
                          }
                          // function myFunction() {
                          //   document.getElementById("trans_amt").value = "Johnny Bravo";
                          // }
                        </script> -->
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
                <table class="table table-hover" style="height:20px; overflow-y:scroll">
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

                    @foreach ($tvl_campaigns as $tvl_campaign)
                    <tr>
                      <td align="left">{{$tvl_campaign->campaign_id}} </td>
                      <td>{{$tvl_campaign->campaign_category_name}}</td>
                      @if ($tvl_campaign->tvl_status == 1)
                      <td style="color: #ff7600;font-weight: 500;">Pending</td>
                      @elseif ($tvl_campaign->tvl_status == 2)
                      <td style="color: #1dbb00;font-weight: 500;">Published </td>
                      @elseif ($tvl_campaign->tvl_status == 3)
                      <td style="color: #e11010;font-weight: 500;">Rejected</td>
                      @else
                      <td></td>
                      @endif 
                      <td><a href="{{route('history', ['id' => $tvl_campaign->campaign_id])}}" class="click">Click </a></td>
                     @if($tvl_campaign->file_type == 'video')
                      <td>Video</td>
                      @elseif($tvl_campaign->file_type == 'banner')
                      <td>Banner</td>
                      @elseif($tvl_campaign->file_type == 'text_content')
                      <td>Text Content</td>
                      @else
                      <td>N/A</td>
                      @endif
                      <td>{{date("d-M-Y", strtotime($tvl_campaign->created))}}</td>
                      <td>Facebook</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
            <img src="<?php echo BASEURL; ?>images/reject-taskbg.png">
          </div>
          <div class="reject-txt">
            <h5>State reason for rejecting the task</h5>
            <textarea placeholder="write your reason here and submit to admin to review your complaints" rows="5">
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
<!---=====//Campain Calculation//====--->
  <script>
$(document).ready(function() {
  $('input:radio[name="colors"]').change(function(){
    if ($(this).is(':checked')) {
      var feature_cost = parseFloat(0);
      var proNeeded = $("#proNeeded").val();
      var proEarn = $("#proEarn").val();
      proNeeded = (proNeeded == "") ? 0 : parseFloat(proNeeded.replace(/,/g, ''));
      proEarn = (proEarn == "") ? 0 : parseFloat(proEarn.replace(/,/g, ''));
      if ($("#featured_campaign").is(':checked')) {
        feature_cost = $("#featured_campaign").attr('data-price');
      }
      var highlight_cost = $("#highlight_color").attr('data-price');

      var TotalCost = (parseFloat(proNeeded) * parseFloat(proEarn)) + parseFloat(highlight_cost) + parseFloat(feature_cost);

      var percentage = TotalCost / 100;
      var CampainCost = TotalCost + (9.5 * percentage);
      $("#camp_cost").val(CampainCost);
      //alert(proNeeded);
    }
  });

  $('input:checkbox[name="featured_campaign"]').change(function(){
    if ($(this).is(':checked')) {
      var highlight_cost = parseFloat(0);
      var proNeeded = $("#proNeeded").val();
      var proEarn = $("#proEarn").val();
      proNeeded = (proNeeded == "") ? 0 : parseFloat(proNeeded.replace(/,/g, ''));
      proEarn = (proEarn == "") ? 0 : parseFloat(proEarn.replace(/,/g, ''));
      if ($("#highlight_color").is(':checked')) {
        highlight_cost = $("#highlight_color").attr('data-price');
      }
      var feature_cost = $("#featured_campaign").attr('data-price');

      var TotalCost = (parseFloat(proNeeded) * parseFloat(proEarn)) + parseFloat(highlight_cost) + parseFloat(feature_cost);

      var percentage = TotalCost / 100;
      var CampainCost = TotalCost + (9.5 * percentage);
      $("#camp_cost").val(CampainCost);
      //alert(proNeeded);
    }
  });

  $('.promoterNeed').on('focusout', function() {
    var feature_cost = parseFloat(0);
    var highlight_cost = parseFloat(0);
    var proNeeded = $("#proNeeded").val();
      var proEarn = $("#proEarn").val();
      proNeeded = (proNeeded == "") ? 0 : parseFloat(proNeeded.replace(/,/g, ''));
      proEarn = (proEarn == "") ? 0 : parseFloat(proEarn.replace(/,/g, ''));
      if ($("#highlight_color").is(':checked')) {
        highlight_cost = $("#highlight_color").attr('data-price');
      }
      if ($("#featured_campaign").is(':checked')) {
        feature_cost = $("#featured_campaign").attr('data-price');
      }
      var TotalCost = (parseFloat(proNeeded) * parseFloat(proEarn)) + parseFloat(highlight_cost) + parseFloat(feature_cost);
      var percentage = TotalCost / 100;
      var CampainCost = TotalCost + (9.5 * percentage);
      $("#camp_cost").val(CampainCost);
      //alert(proNeeded);
});
});
    
  

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
    $(document).on('change', '.div-toggle', function() {
      var target = $(this).data('target');
      var show = $("option:selected", this).data('show');
      $(target).children().addClass('hide');
      $(show).removeClass('hide');
    });
    $(document).ready(function() {
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
<script>
    VirtualSelect.init({ 
      ele: '#multipleselect' 
    });
</script>
<script>
$(document).ready(function() {
    var disabled = false;
    $('#submit').click(function() {
        if (disabled) {
            $("#trans_amt").prop('disabled', false);       // if disabled, enable
        }
        else {
            $("#trans_amt").prop('disabled', true);        // if enabled, disable
        }
        disabled = !disabled;
       
    })
    
});
  </script>
@include("layouts.footer")
