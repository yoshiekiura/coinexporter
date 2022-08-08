@include("layouts.header")

<div class="welcome-dashboard">
    <div class="container">
        @include("layouts.alert")
        @section('title', 'Withdraw')
        @include("layouts.menu")
    </div>
</div>

<div class="finish-task">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="finish-title">
                    <h3>Welcome to “Withdraw” page</h3>
                    <h4>where you can apply to withdraw funds into wallet address fixed to this account. Kindly make sure that the said wallet address is correctly fixed.</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="withdraw-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="with-img">
                    <img src="{{BASEURL}}images/withdraw1.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="with-text">
                    <ul>
                        <li><span>You can only withdraw funds available in your <strong>“TOTAL ACTUAL BALANCE”</strong> </span></li>
                        <li><span>You can only withdraw minimum of <strong>$20</strong></span></li>
                        <li><span>Withdrawal request requires approval and it can happen between 1 min to 48 hours</span></li>
                        <li><span>Once you make withdraw, the exact funds will move from <strong>“TOTAL ACTUAL BALANCE ”</strong> to the <strong>“PENDIND WITHDRAWS BALANCE”</strong></span></li>
                        <li><span>Once you are paid, the exact funds will move from <strong>“PENDIND WITHDRAWS BALANCE” to “TOTAL WITHDRAWN AMOUNT”</strong></span></li>
                        <li><span>Your payment goes into the BSC Address attached to this account. </span></li>
                    </ul>
                </div>
            </div>
        </div>

        
        <div id="successmsg"></div>
        <div class="row">
            <div class="container">
                <div class="col-lg-12 col-md-12 mx-auto">
                    <div class="balance-title">
                        <form id="withdrawForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="selct-bal">
                                        <label>Total Actual Balance</label>
                                        <input type="text" id="aBalance" name="aBalance" class="form-control amountCalc" placeholder="$" onkeypress="return isNumberKey(event)" value="{{$totalActualBalance}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="selct-bal">
                                        <label>Pending Withdrawal Balance </label>
                                        <input type="text" id="pendingWithdrwBalance" name="wBalance" class="form-control" placeholder="$" onkeypress="return isNumberKey(event)" readonly value="${{$withdrawalBalance}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="selct-bal">
                                        <label>Amount to withdraw </label>
                                        <input type="text" id="amtToWithdraw" name="aWithdraw" class="form-control amountCalc" placeholder="$" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="selct-bal">
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="balance-title">
                    <div class="table_responsive_maas">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="20%">Transaction ID</th>
                                    <th width="20%">Withdrawal Amount</th>
                                    <th width="20%">Approved Amount</th>
                                    <th width="20%">Description</th>
                                    <th width="20%">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($userTransaction)
                                  @foreach($userTransaction as $val)
                                    <tr>
                                        <td align="left">{{$val->id}} </td>
                                        <td>
                                           @if($val->status == 'Pending') 
                                            ${{$val->transaction_amount}}
                                           @else
                                           {{'$0'}} 
                                           @endif
                                        </td>
                                        <td>
                                           @if($val->status == 'Approved') 
                                            ${{$val->transaction_amount}}
                                           @else
                                            {{'$0'}} 
                                           @endif
                                        </td>
                                        <td>{{$val->transaction_detail}}</td>
                                        <td style="color: #ff7600;font-weight: 500;">{{$val->status}}</td>
                                    </tr>
                                  @endforeach
                                @else
                                  <tr>No Data Found</tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="with-complain-form">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="with-box2">
                        <div class="comlain-title">
                            <h5 style="text-align: center;">For any withdrawal complaint after 48 hrs of request, kindly send us your details as follows</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="selct-bal">
                                    <label>Requested Amount </label>
                                    <input type="text" name="name" placeholder="$" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="selct-bal">
                                    <label>Date of Request</label>
                                    <input type="text" name="name" placeholder="$" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="selct-bal">
                                    <label>Time of Request</label>
                                    <input type="text" name="name" placeholder="$" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <label>Write Us Any Additional Message</label>
                                    <input type="text" name="name" placeholder="$" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="selct-bal">
                                    <button>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











<!--============================= Sign In Modal =============================-->



<!--============================= Scripts =============================-->
<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>


<script>

    //code by sweta

    $("#amtToWithdraw").keyup(function(){
        $("#pendingWithdrwBalance").val($(this).val());
    });

    $('#withdrawForm').on('submit',function(e){
    e.preventDefault();
    var actual_blnce = $('#aBalance').val();
    var amt_to_withdraw = $('#amtToWithdraw').val();
    var pending_Withdraw_blance = $('#pendingWithdrwBalance').val();
    
    if(parseInt(actual_blnce) < 20){
        $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>You can only withdraw minimum of $20</strong></div>');
        return false; 
    }
    if(amt_to_withdraw == ''){
        $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Amount to withdraw can not be empty</strong></div>');
        return false; 
    }
    if(parseInt(amt_to_withdraw) > parseInt(actual_blnce)) {
        $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Amount to withdraw should not greater than Total Actual Balance</strong></div>');
        return false;
    }
    
    
    $.ajax({
      url: "{{ route('transactionAmount') }}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        actual_blnce:actual_blnce,
        amt_to_withdraw:amt_to_withdraw,
        pending_Withdraw_blance:pending_Withdraw_blance,
       
      },
      success:function(response){
        console.log(response.status);
        if (response.status === true) {
          $("#successmsg").html('<div class="alert success-alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+response.msg+'</div>');
                           
          $("#withdrawForm")[0].reset(); 
        }
        else {
            
            $("#successmsg").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+response.msg+'</div>');
            
        }
      },
      error: function(response) {
        $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Something went wrong!</strong></div>');
         
       }
     });
    });

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


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

@include("layouts.footer")