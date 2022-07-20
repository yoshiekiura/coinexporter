


@include("layouts.header")

<div class="welcome-dashboard">
	<div class="container">
  @section('title', 'Finish Task')
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
<!--------alert message start------->
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
<!--------alert message end------->
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
									@foreach ($job_dones as $job_done)
                  <tr>
                    <td align="left">{{$job_done->campaign_id}} </td>
                    <td>{{$job_done->campaign_name}}</td>
										@if ($job_done->pof == "")
                    <td><input id="upload" type="file" style="display: none;">
									  <a href="#" role="button" class="click" data-bs-toggle="modal" data-bs-target="#uploadModal{{$job_done->jobdoneId}}">Click Here to Upload</a>
                <!-- ========================== Click Here======================= -->
                <div class="modal fade" id="uploadModal{{$job_done->jobdoneId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 514px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Upload Proof</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form method="POST" action="{{ route('finishtask.update', ['id' => $job_done->jobdoneId]) }}">
                  {{csrf_field()}}
                  <div class="email-box-area">
                  <input type="hidden" name="campainUserId" value="{{$job_done->user_id}}">
                        <input type="hidden" name="campainId" value="{{$job_done->campaign_id}}">
                       
                    <input type="hidden" name="finishtask_id" value="{{$job_done->jobdoneId}}" >
                      <p>PROOF BOX - Enter the proof in the box below</p>
                      <h4 class="text-danger">* If a printscreen is asked, use theses free sites: <a href="https://snipboard.io/"> Snipboard</a> or <a href="https://prnt.sc/"> PRNT </a></h4>
                      <textarea rows="5" onresize="0" name="proofInstructionbox" id="uploadtext"></textarea>
                      <button type="submit" id="submit" onclick="uploadfn()">Upload</button>

                  </div>

                </form>
                  </div>
                </div>
                </div>
                </div>
                  </td>
										@else
										<td><a href="#" role="button" class="click" data-bs-toggle="modal" data-bs-target="#proofModal{{$job_done->jobdoneId}}">Click to view(Uploaded)</a>
                      <!-- ========================== Click Here======================= -->
              <div class="modal fade" id="proofModal{{$job_done->jobdoneId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 514px;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Uploaded Proof</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="campainId" value="{{$job_done->campaign_id}}">
                    <input type="hidden" name="id" value="{{$job_done->jobdoneId}}">
                    <textarea rows="5" style="width: 100%;border-radius: 6px;border: 2px dashed #d5d5d5;padding: 10px 10px;" placeholder="Uploaded Proof">{{$job_done->pof}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
                  </td>
										@endif
										<td>${{$job_done->campaign_earning}}</td>
                    @if ($job_done->tvl_status == "Pending")
                    <td style="color: #ff7600;font-weight: 500;">Pending</td>
										@elseif ($job_done->tvl_status == "Published")
										<td style="color: #1dbb00;font-weight: 500;">Published </td>
										@elseif ($job_done->tvl_status == "Rejected")
										<td style="color: #e11010;font-weight: 500;">Rejected</td>
										@else
										<td></td>
											@endif
                    <td>{{date("d-M-Y", strtotime($job_done->created))}}</td>
                    <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#clickexampleModal">Click Here</a></td>
                 
                  </tr>
                   
									  @endforeach
                           <!--   <tr>
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
                              </tr>-->
                            </tbody>
                        </table>
                     </div>
                </div>

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
        <img src="{{BASEURL}}images/modal-bg.png" alt="">
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
        <h5 class="modal-title heading" id="exampleModalLabel">Why do you appeal this task to the admin? <br />Clearly state your reason?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea rows="5" style="width: 100%;border-radius: 6px;border: 2px dashed #d5d5d5;padding: 10px 10px;" placeholder="write your reason here and submit to the admin. " class="txt"></textarea>
      </div>
      <div class="modal-footer">
      
      <button class="btn btn-primary" type="submit">Submit</button>
  
    </div>
    </div>
  </div>
</div>

<!--============================= Scripts =============================-->
<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

<script>

// $("#submit").click(function()
// {
//   var message = $('#uploadtext').val();
//   alert(message);

// });
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
<!-- <script>
function uploadfn() {
  alert("I am an alert box!");
}
</script> -->

@include("layouts.footer")