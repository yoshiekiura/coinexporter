

@include("layouts.header")

<div class="welcome-dashboard">
	<div class="container">
  @section('title', 'History')
  @include("layouts.menu")
    </div>
</div>


<div class="finish-table ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
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
                    <th width="10%">Reason</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($JobPaymentChecks as $key=>$JobPaymentCheck)
                  <tr>
                  <td align="left">{{$JobPaymentCheck->campaign_id}} </td>
                      <td>{{$JobPaymentCheck->campaign_category_name}}</td>
                      @if ($JobPaymentCheck->tvl_status == 1)
                      <td style="color: #ff7600;font-weight: 500;">Pending</td>
                      @elseif ($JobPaymentCheck->tvl_status == 2)
                      <td style="color: #1dbb00;font-weight: 500;">Confirmed </td>
                      @elseif ($JobPaymentCheck->tvl_status == 3)
                      <td style="color: #e11010;font-weight: 500;">Rejected</td>
                      @else
                      <td></td>
                      @endif 
                    <td><a href="#">Fb.harana.com</a></td>
                    <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#proofModal{{$key+1}}">Click to view</a></td>
                    <td>12:23 UTC</td>
                    <td>12 June, 2022</td>
                    <td><a href="#" class="click" data-bs-toggle="modal" data-bs-target="#rejectModal">Click</a></td>
                    <td><!-- Example split danger button -->
<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Aprrove</a></li>
    <li><a class="dropdown-item" href="#">Reject</a></li>
  </ul>
</div></td>                  
                  </tr>
                  
                <!-- ========================== Click Here======================= -->
                <div class="modal fade" id="proofModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="max-width: 514px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Submitted Proof</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <?php $ext = pathinfo($JobPaymentCheck->file_name, PATHINFO_EXTENSION);?>
                      @if(($ext == 'mp4') || ($ext == 'mp3') || ($ext == 'pdf') || ($ext == 'gif'))
                        <iframe src="<?php echo BASEURL; ?>uploads/{{$JobPaymentCheck->file_name}}"></iframe>
                        @elseif(($ext == 'png') || ($ext == 'PNG') || ($ext == 'jpg') || ($ext == 'JPG') || ($ext == 'jpeg') || ($ext == 'JPEG'))
                        <img src="<?php echo BASEURL; ?>uploads/{{$JobPaymentCheck->file_name}}">
                        @else
                        @if(empty($JobPaymentCheck->file_name))
                        <p>N/A</p>
                        @else
                        <p>{{$JobPaymentCheck->file_name}}</p>
                        @endif
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                  @endforeach
                   
                </tbody>
            </table>
         </div>

            </div>
        </div>
    </div>
</div>


<!--============================= cancelled =============================-->

<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body can-modal">
        <img src="{{BASEURL}}images/modal-bg.png" alt="">
        <h5 class="modal-title" id="exampleModalLabel">Reason</h5>
        <p>Your cryptocurrency telegram group is full of bots and inactive</p>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<!-- <div class="modal fade" id="proofModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->

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


@include("layouts.footer")