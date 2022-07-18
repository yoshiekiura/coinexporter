@include("layouts.header")

<!--  -->

<div class="container">
@section('title', 'Edit Profile')
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

        @include("layouts.menu")
    </div>
</div>


<div class="dashboard-body">
    <div class="container">
        <form action="{{ route('editprofileupdate') }}" method="POST" id="postId" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="flat-user">
                        <div class="avatar">
                            <?php
                            if ($userData->profileImage != null || $userData->profileImage != '') { ?>
                                <img src="{{BASEURL}}images/<?= $userData->profileImage ?>" alt="image" id="pImage">
                            <?php } else { ?>
                                <img src="{{BASEURL}}images/istockphoto.jpg" alt="image">
                            <?php } ?>
                            <input type="hidden" name="oldProfile" id="oldProfile" value="<?= $userData->profileImage ?>">
                            <input type="file" class="change_btn" name="profileImage" id="profileImage" value="" placeholder="Change Profile Photo" onchange="post('postId')">
                        </div>
                        <!-- <div class="change_photo"> -->
                        <!-- <a href="#" class="change_btn"><i class="far fa-camera"></i> Change Photo</a> -->
                        <!-- </div> -->
                        <h3 class="name">{{ Auth::user()->name }}</h3>
                        <div class="profile-usermenu">
                            <ul>
                                <li class="dropdown-item active"><a href="#"><i class="fas fa-male"></i>Edit Profile</a></li>
                                <li class="dropdown-item"><a href="#"><i class="fas fa-cogs"></i>Settings</a></li>
                                <li class="dropdown-item"><a href="{{ route('myaccount') }}"><i class="fas fa-envelope"></i>My Account </a></li>
                                <li class="dropdown-item"><a href="#" data-bs-toggle="modal" data-bs-target="#changeModal"><i class="fas fa-key"></i>Change Password</a></li>
                                <li class="dropdown-item"><a href="{{ route('logout') }}"><i class="fas fa-power-off"></i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                    <div class="flat-tabs style2" data-effect="fadeIn">

                        <div class="content-tab listing-user profile">
                            <div class="content-inner active" style="display: block;">
                                <div class="edit_profile">
                                    <div class="dashboard-form-area">

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Name</label><input type="text" name="name" class="form-control" placeholder="Your Name*" required="" aria-required="true" value="<?= $userData->name ?>">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" value="<?= $userData->email ?>" placeholder="Your  Mail*" required="" aria-required="true">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label>Country</label>
                                            <div class="col-md-12 form-group">
                                                <select class="form-select form-control" name="country" id="country" required>
                                                    <option value="">Select Country</option>
                                                    @php
                                                    $countries = App\Models\Country::all();
                                                    @endphp
                                                    @foreach ($countries as $country)

                                                    @if($country->id == $userData->country)
                                                    <option value="{{ $country->id }}" selected="selected">{{ $country->country_name }}</option>
                                                    @else
                                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">

                                                <button class="btn-style-one" type="submit" data-loading-text="Please wait...">Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Start Change old Passowrd -->
<div class="modal fade" id="changeModalPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 385px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('changepassword') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{BASEURL}}images/lock.png" style="max-width: 40%;">
                    <div id="errors-list"></div>
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">Old Password</label>
                        <input type="password" name="oldPassword" style="padding: 5px 7px;" required>
                        @error('oldPassword')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">New Password</label>
                        <input type="password" name="newPassword" style="padding: 5px 7px;" required>
                        @error('newPassword')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="pass-title" style="text-align: left;">
                        <label style="padding-bottom: 2px;">Confirm New Password</label>
                        <input type="password" name="ConfirmPassword" style="padding: 5px 7px;" required>
                        @error('ConfirmPassword')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="pass-title" style="margin-top: 30px; margin-bottom: 6px;">
                        <button class="btn-style-one" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Change old Passowrd -->


<!--============================= Scripts =============================-->


<a href="#" class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<script>
    $(document).ready(function() {

        $("#changeModalPassword").validate({
            rules: {
                
                oldPassword: "required",
                newPassword: "required",
                ConfirmPassword: "required",
                
            },
            messages: {
                oldPassword: "Old Password is required",
                newPassword: "New Password is required",
                ConfirmPassword: "Confirm Password is required",
                
            }

        });
    });
</script>
<script>
    $(function() {
        // handle submit event of form
        // $(document).on("submit", "#changeModalPassword", function() {
        //     var e = this;
        //     // change login button text before ajax
        //     $(this).find("[type='submit']").html("Submitting...");

        //     $.post($(this).attr('action'), $(this).serialize(), function(data) {

        //         $(e).find("[type='submit']").html("Submit");
        //         if (data.status) { // If success then redirect to login url
        //             window.location = data.redirect_location;
        //         }
        //     }).fail(function(response) {
        //         // handle error and show in html
        //         $(e).find("[type='submit']").html("Submit");
        //          $(".alerts").remove();
        //         var erroJson = JSON.parse(response.responseText);
        //         for (var err in erroJson) {
        //             for (var errstr of erroJson[err])
        //                 $("#errors-list").append("<div class='alerts alert-danger'>" + errstr + "</div>");
        //         }

        //     });
        //     return false;
        // });
    });
</script>
<script>
    var post = function(formId) {
        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ url('profileImageUpload')}}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
                location.reload();
            },
            error: function(result) {
                location.reload();
            }
        });
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