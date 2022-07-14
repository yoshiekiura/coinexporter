@include("layouts.header")

<!--  -->

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

    
</div>

<!--  -->

<div class="welcome-dashboard">
    <div class="container">
    @section('title', 'My Account')
        @include("layouts.menu")
    </div>
</div>


<div class="finish-task">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="finish-title">
                    <h3>Welcome to “My Account” page</h3>
                    <h4>where you can update your profile to become Direct Marketer (Promoter), see transaction history, and some settings. Please, take note that most of what you do here require approval by CoinExporter</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="my-account-sec ptb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="table_responsive_maas">
                    <div id="successmsg"></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="20%">Links </th>
                                <th width="40%">Social Channel Name</th>
                                <th width="20%">Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="POST" enctype="multipart/form-data" id="serialize">
                                @csrf
                                <input type="hidden" id="userid" value="{{Auth::id()}}"> 
                                @if($SocialPlatform)
                                    @foreach ($SocialPlatform as $key=>$linkName)
                                    @php
                                        $social_user_link = App\Models\SocialLink::where('channel_link',$linkName->social_platform_name)->first();

                                    @endphp
                                    @if($social_user_link)
                                        <input class="channelData" type="hidden"  value="{{$social_user_link->id}}" name="channelId{{$key+1}}">
                                    @else
                                     <input class="channelData" type="hidden"  value="0" name="channelId{{$key+1}}">
                                    @endif
                                <tr>
                                    <td>
                                        {{$linkName->social_platform_name}}
                                         <input  class="channelLink" type="hidden" id="channelLink{{$key+1}}" value="{{$linkName->social_platform_name}}" name="channelLink{{$key+1}}">
                                    </td>
                                     <td class="box pass-title" name="box{{$key+1}}" >
                                          <input style="display:none;" class="channelData" type="text" id="channelName{{$key+1}}" value="{{$social_user_link ? $social_user_link->channel_name : ''}}" name="channelName{{$key+1}}" >
                                          <span id="channelTestName{{$key+1}}">{{$social_user_link ? $social_user_link->channel_name : ''}}<span>
                                     </td>
                                     <td>
                                        <span id="linkStatus{{$key+1}}">{{$social_user_link ? $social_user_link->status : ''}}</span>
                                    </td>
                                    <td class="buttonBox selct-bal" action="edit"  name="btn{{$key+1}}" onClick="editData('{{$key+1}}')"><button type="button" id="edit{{$key+1}}">Edit</button></td>
                                    
                                </tr>
                                    @endforeach
                                @endif

                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="profile-sec">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="p-box d-flex align-items-center">
                                <div class="pro-img">
                                    <!-- <img src="images/prof-img.jpg"> -->
                                    @if (Auth::user()->profileImage != null || Auth::user()->profileImage != '')
                                    <img src="{{BASEURL}}images/{{Auth::user()->profileImage}}" alt="image">
                                    @else
                                    <img src="{{BASEURL}}images/istockphoto.jpg" alt="image">
                                    @endif
                                </div>
                                <div class="pro-title">
                                    <p>{{ Auth::user()->name  }}</p>
                                    <p>Email : <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
                                    <p>Referral Code : {{ Auth::user()->referral_code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="mid-pro-box">
                                    <div class="box1">
                                        <p>Country</p>
                                    </div>
                                    <div class="loc-pro">
                                        <p>{{ $country->country_name  }}</p> <input type="checkbox" name="">
                                        <!-- <p>Nigeria</p> <input type="checkbox" name=""> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="mid-pro-box">
                                    <div class="box1">
                                        <p>IP Address</p>
                                    </div>
                                    <div class="loc-pro">
                                        <p>{{ $_SERVER['REMOTE_ADDR']  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="pass-box">
                            <div class="row ">
                                <div class="col-lg-12 col-md-6">
                                    <div class="pass-title">
                                        <label>PASTE YOUR BSC WALLET ADDRESS ONLY</label>
                                        <input type="text" name="" placeholder="Wallet Address">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="pass-title">
                                        <label>CHANGE PASSWORD</label>
                                        <button data-bs-toggle="modal" data-bs-target="#changeModal">Click here to change password</button>
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








<!-- ========================== change password modal======================= -->
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 385px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('changepassword') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{BASEURL}}images/lock.png" style="max-width: 40%;">
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">Old Password</label>
                        <input type="password" name="oldPassword" style="padding: 5px 7px;">
                    </div>
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">New Password</label>
                        <input type="password" name="newPassword" style="padding: 5px 7px;">
                    </div>
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">Confirm New Password</label>
                        <input type="password" name="ConfirmPassword" style="padding: 5px 7px;">
                    </div>
                    <div class="pass-title" style="margin-top: 30px; margin-bottom: 6px;">
                        <button class="btn-style-one" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--============================= Scripts =============================-->
<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

<script>

    function editData(key){

         var data = $("td[name=btn" + key + "]").attr('action');
          if (data == "edit") {
             $("#channelName" + key).show(); 
             $("#edit" + key).html('Update'); 
             $("td[name=btn" + key + "]").attr('action', 'update');
             $("#channelTestName" + key).html("");
          }
          else {

             var channelData = $("input[name=channelName" + key + "]").val();
             var channelLink = $("input[name=channelLink" + key + "]").val();
             var channelId =$("input[name=channelId" + key + "]").val();
             
             var userid = $("#userid").val();
             if(channelData){
                        $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: "{{ route('create')}}",
                        type: 'POST',
                        data: {
                            'status': 'Pending',
                            'linkName': channelLink,
                            'channelData': channelData,
                            'userId': userid,
                            'channelId': channelId
                        },
                        success: function(response) {
                            $("#channelName" + key).hide(); 
                            $("#channelTestName" + key).html(channelData); 
                            $("td[name=btn" + key + "]").attr('action', 'edit');
                            $("#edit" + key).html('Edit'); 
                             $("#linkStatus" + key).html('Pending'); 
                           $("#successmsg").html('<div class="alert success-alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Social Channel updated Successfully!</div>');
                           

                        },
                        error: function(response) {
                          $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Social Channel Not Saved!</strong></div>');
                        }
                    });
                }
                else {
                    $("#successmsg").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Please enter channel name!</strong></div>');
                }
          }
    }
   
</script>

@include("layouts.footer")