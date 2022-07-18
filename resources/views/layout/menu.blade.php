<style>
    .error {
        color: #dc3545;
        font-size: 14px;
    }
    #register-modal {
  display: none;
}
#sigin-modal {
  display: none;
}
#forgot-modal {
  display: none;
}
input[type="checkbox"][readonly] {
  pointer-events: none;
}
</style>
<header class="header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="head-bar">
                    <div class="logo">
                        <a href="<?php echo BASEURL; ?>"><img src="<?php echo BASEURL; ?>images/coin-exporter.png" alt="" /></a>
                        <a href="<?php echo BASEURL; ?>"><img src="<?php echo BASEURL; ?>images/coin-exporterwh.png" alt="" /></a>
                    </div>
                    <div class="menu">
                        <nav id="cssmenu" class="head_btm_menu">


                            <ul>
                               
                                    <li class="{{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{route('index')}}">Home</a></li>
                              
                               
                                    <li class="{{ Request::routeIs('about') ? 'active' : '' }}"><a href="{{route('about')}}">About</a></li>
                               
                                <li><a href="#">Utilities</a>

                                    <ul> @if(Auth::check())
                                        <li><a href="{{route('dashboard')}}">Campaign and Promotion</a>
                                        <li><a href="{{route('404')}}">Staking</a></li>
                                        <li><a href="{{route('404')}}">Affiliate Marketing</a></li>
                                        <li><a href="{{route('404')}}">ER Services</a></li>
                                        <li><a href="{{route('404')}}">Investment Call Support</a></li>
                                        <li><a href="{{route('404')}}">Coins Fora</a></li>
                                        <li><a href="{{route('404')}}">NFTs and NFTs Marketplace</a></li>
                                        <li><a href="{{route('404')}}">P2P Marketing Service</a></li>
                                        </li>
                                        @else
                                        <li><a href="{{route('job_space')}}">Job Space</a>
                                        <li><a href="{{route('404')}}">Staking</a></li>
                                        <li><a href="{{route('404')}}">Affiliate Marketing</a></li>
                                        <li><a href="{{route('404')}}">ER Services</a></li>
                                        <li><a href="{{route('404')}}">Investment Call Support</a></li>
                                        <li><a href="{{route('404')}}">Coins Fora</a></li>
                                        <li><a href="{{route('404')}}">NFTs and NFTs Marketplace</a></li>
                                        <li><a href="{{route('404')}}">P2P Marketing Service</a></li>
                                        @endif
                                        
                                        
                                    </ul>
                                </li>
                                <li><a href="#">CoinExporter Token</a>
                                    <ul>
                                        <li><a href="{{route('coinexporter_token')}}">About CoinExporter Token</a></li>
                                        <li><a href="{{route('tokenomic')}}">Tokenomics</a></li>
                                        <li><a href="{{route('investor')}}">Investors</a></li>
                                        <li><a href="{{route('roadmap')}}">Roadmap</a></li>
                                        <li><a  href="../pdf/Coinexporter_Whitepaper.pdf" target="_blank">Whitepaper</a></li>
                                        <li><a href="{{route('team')}}">Team</a></li>
                                    </ul>
                                </li>
                             
                                    <li class="{{ Request::routeIs('faq') ? 'active' : '' }}"><a href="{{route('faq')}}">FAQ</a></li>
                              
                                    <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                               
                        </nav>
                    </div>

                    @if(Auth::check())
                    {{-- <div class="head-btn">
                    <a href="{{ route('logout') }}" class="login"><i class="fal fa-user"></i> Log Out</a>
                </div> --}}
                <div class="dashboard_table_sec_top_right">
                    <div class="afterlogin-head">
                        <ul>
                            <li class="list">
                                <div class="drop_sec">
                                    <div class="dropdown">
                                        <a class="list_btn" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i><span class="bg-dot"></span></a>
                                        <div class="dropdown-menu new_drop_cont" aria-labelledby="dropdownMenuLink">
                                            <ul>
                                                <li class="dropdown-item"><a href="#">Lorem Ipsum is simply dummy text ..</a></li>
                                                <li class="dropdown-item"><a href="#">Lorem Ipsum is simply dummy text ..</a></li>
                                                <li class="dropdown-item"><a href="#">Lorem Ipsum is simply dummy text ..</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="prof_img">
                                <div class="drop_sec">
                                    <div class="dropdown">
                                        <a class="list_btn" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!-- <img src="images/istockphoto.jpg" alt="" title=""> -->
                                            @if (Auth::user()->profileImage != null || Auth::user()->profileImage != '')
                                            <img src="<?php echo BASEURL; ?>images/{{Auth::user()->profileImage}}" alt="profile">
                                            @else
                                            <img src="<?php echo BASEURL; ?>images/istockphoto.jpg" alt="profile">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu new_drop_cont" aria-labelledby="dropdownMenuLink2">
                                            <div class="profile-header d-flex align-items-center">
                                                <div class="thumb-area">
                                                    <!-- <img src="images/istockphoto.jpg" alt="profile"> -->
                                                    @if (Auth::user()->profileImage != null || Auth::user()->profileImage != '')
                                                    <img src="<?php echo BASEURL; ?>images/{{Auth::user()->profileImage}}" alt="profile">
                                                    @else
                                                    <img src="<?php echo BASEURL; ?>images/istockphoto.jpg" alt="profile">
                                                    @endif
                                                </div>
                                                <div class="content-text">
                                                    <h6>{{ Auth::check() ? Auth::user()->name : Auth::user()->email }}</h6>
                                                    <p class="mb-0">Corportate Agent</p>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="dropdown-item"><a href="{{ route('editprofile') }}"><i class="fas fa-male"></i>Edit Profile</a></li>
                                                <li class="dropdown-item"><a href="#"><i class="fas fa-cogs"></i>Settings</a></li>
                                                <li class="dropdown-item"><a href="{{ route('myaccount') }}"><i class="fas fa-envelope"></i>My Account </a></li>
                                                <li class="dropdown-item"><a href="{{ route('editprofile') }}"><i class="fas fa-key"></i>Change Password</a></li>
                                                <li class="dropdown-item"><a href="{{ route('logout') }}"><i class="fas fa-power-off"></i>Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                        <button class="dark-btn" href="#" onclick="myFunction()">
                        	<i class="far fa-moon"></i>
                        	<i class="fal fa-sun"></i>
                        </button>
                    </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="head-btn">
                    <a href="#" class="login" data-bs-toggle="modal" data-bs-target="#signin-modal"><i class="fal fa-user"></i> Login</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#register-modal"><i class="far fa-lock"></i> Register</a>
                    <button class="dark-btn" href="#" onclick="myFunction()">
                        	<i class="far fa-moon"></i>
                        	<i class="fal fa-sun"></i>
                        </button>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</header>
@if (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/job_space'))
@else
<div class="innerpage_banner">
	<div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <h2>@yield('title')</h2>
	        <div class="breadcrumb">
	          <ul class="clearfix">
	            <li class="ib bg">
	              <a href="<?php echo BASEURL;?>">Home</a>
	            </li>
	            <li class="ib current-page">@yield('title')</li>
	          </ul>
	        </div>
	      </div>
	    </div>
	</div>
</div>
@endif
<!--============================= Sign In Modal =============================-->


<div id="signin-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog loginpanle-modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo BASEURL; ?>images/coin-exporter.png" alt="" />
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->
            {!! NoCaptcha::renderJs() !!}

            <!-- @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif -->
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-body">
                    <h4>
                        Login in your account
                        <span>Use your credentials to access your account</span>
                    </h4>
                    <div id="errors-list"></div>
                    <ul>
                        <li>
                            <i class="far fa-envelope"></i>
                            <input type="email" class="form-control" name="email"  required autofocus value="karthik@gmail.com" placeholder="Email">
                            @error('email')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>
                        <li>
                            <i class="far fa-lock"></i>
                            <input class="form-control" type="password" name="password" value="karthik123" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>

                        <li>
                            <div class="row">
                                <div class="col-6 chkboxmain">
                                    <input id="Option5" type="checkbox">
                                    <label class="checkbox" for="Option5" name="remember"> Remember Me</label>
                                </div>
                                <div class="col-6 text-end"> @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#" data-bs-toggle="modal" data-bs-target="#forgot-modal" onclick="forgotModal()">Forgot Password?</a> @endif
                                </div>
                            </div>
                        </li>
                        {{-- <li class="pb-2">{!! NoCaptcha::display() !!}
                    {{ csrf_field() }}
                        <div id="g-recaptcha-error"></div>
                        </li>--}}
                        <li>
                            <button type="submit" class="btn">Sign In</button>
                        </li>
                        <li class="text-center dont-account">Don't have an account? <a href="#" onclick="registerModal()">Sign Up</a></li>

                    </ul>
                </div>
            </form>
            <!-- @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif -->
        </div>
    </div>
</div>

<!--============================= Forgot Password Modal =============================-->


<div id="forgot-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog loginpanle-modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo BASEURL; ?>images/coin-exporter.png" alt="" />
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->
            {!! NoCaptcha::renderJs() !!}

            <!-- @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif -->
        <form id="forgotpassword" method="POST" action="{{ route('password.email') }}">
            @csrf
                <div class="modal-body">
                    <h4>
                    Forgot your password? 
                        <span>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</span>
                    </h4>
                    <ul>
                        <li>
                            <i class="far fa-envelope"></i>
                            <input type="email" class="form-control"  name="email" :value="old('email')" required autofocus  placeholder="Email">
                            @error('email')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>
                       
                        <li>
                            <button type="submit" class="btn" >Email Password Reset Link</button>
                        </li>
                       

                    </ul>
                </div>
            </form>
          
        </div>
    </div>
</div>


<!-- ====================================Register Modal======================= -->

<div id="register-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog loginpanle-modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo BASEURL; ?>images/coin-exporter.png" alt="" />
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Validation Errors -->
            <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

            <form id="regForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="modal-body">
                    <h4>
                        Create Your account
                        <span>Setup a new account in a minute.</span>
                    </h4>
                    <div id="reg-errors-list"></div>                   
                    <ul>
                        <li>
                            <i class="far fa-user"></i>
                            <input type="text" class="form-control err" name="name" :value="old('name')" required autofocus placeholder="Enter Your Name">
                            @error('name')
                            <div class="alerts alert-danger mt-1 mb-1" style="color:red">{{ $message }}</div>
                            @enderror
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <input type="text" class="form-control err" name="email" :value="old('email')" required placeholder="Enter Your Mail">
                            @error('email')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>
                        <li>
                            <i class="far fa-lock"></i>
                            <input class="form-control err" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>
                        <li>
                            <i class="far fa-lock"></i>
                            <input class="form-control err" type="password" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </li>
                        <li>
                            <i class="fas fa-flag"></i>
                            <select class="form-select form-control" aria-label="Default select example" name="country" id="country" required>
                                <option value="">Country</option>
                                @php
                                $countries = App\Models\Country::all();
                                @endphp
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>

                        </li>
                        @error('country')
                        <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                        <li>
                            <i class="fa fa-retweet"></i>
                            <input type="text" class="form-control" name="referral_code"  placeholder="Referral Code(If Any)">
                            
                        </li>
                        <!-- <li class="pb-2"><img src="images/captcha.jpg" class="w-75" alt=""/></li> -->
                        {{-- <li class="pb-2 ">{!! NoCaptcha::display() !!}
                            {{ csrf_field() }}

                        </li>--}}
                        <li>
                            <div class="row">
                                <div class="col-12 chkboxmain err">
                                    <input id="Option6" name="terms" type="checkbox" checked onclick="return false">
                                    <label class="checkbox" for="Option6"> I read and agreed to the CoinExporter privacy and <a href="{{route('terms')}}" target="_blank">terms and conditions.</a> </label>
                                    @error('terms')
                                    <div class="alerts alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </li>

                        <li>
                            <button type="submit" class="btn">Register Now</button>
                        </li>
                        <li class="text-center dont-account">Already have an account? <a href="#" onclick="signinModal()">Sign In</a></li>

                    </ul>
                </div>
                <!-- @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                </div>
            </div>
        @endif -->
        </div>

        </form>

    </div>
</div>
<script>
    $(document).ready(function() {
        $("#regForm").validate({
            // if(grecaptcha.getResponse() == "") {
            //   e.preventDefault();
            //   alert("You can't proceed!");
            // }
            rules: {
                //console.log 123;
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                password: "required",
                country: "required",
                //  captcha: "required",
                terms: "required",
            },
            messages: {
                name: "Name is required",
                email: {
                    required: "Email is Required",
                    email: "Enter Valid Email",
                    // remote: "This Email Already Exists",
                },
                password: "Password is required",
                country: "Please select the country",
                //  captcha: "Captcha is required",
                terms: "Terms & Conditions is required",
            }

        });
    });
</script>
<script>
    function loginsubmitForm() {
        // var response = grecaptcha.getResponse();
        // if(response.length == 0) {
        //     document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        //     return false;
        // }
        // return true;
    }

    // function verifyCaptcha() {
    //     document.getElementById('g-recaptcha-error').innerHTML = '';
    // }
</script>
<script>
    $(document).ready(function() {

        $("#loginForm").validate({
            // if(grecaptcha.getResponse() == "") {
            //   e.preventDefault();
            //   alert("You can't proceed!");
            // }
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: "required",
                //  captcha: "required",
            },
            messages: {
                email: {
                    required: "Email is Required",
                    email: "Enter Valid Email",
                },
                password: "Password is required",
                //  captcha: "Captcha is required",
            }

        });
    });
</script>
<!--========SignIn Through Ajax Call====-->

<script>
    $(function() {
        // handle submit event of form
        $(document).on("submit", "#loginForm", function() {
            var e = this;
            // change login button text before ajax
            $(this).find("[type='submit']").html("Signing In...");

            $.post($(this).attr('action'), $(this).serialize(), function(data) {

                $(e).find("[type='submit']").html("Sign In");
                if (data.status) { // If success then redirect to login url
                    window.location = data.redirect_location;
                }
            }).fail(function(response) {
                // handle error and show in html
                $(e).find("[type='submit']").html("Sign In");
                 $(".alerts").remove();
                var erroJson = JSON.parse(response.responseText);
                for (var err in erroJson) {
                    for (var errstr of erroJson[err])
                        $("#errors-list").append("<div class='alerts alert-danger'>" + errstr + "</div>");
                }

            });
            return false;
        });

        $(document).on("submit", "#regForm", function() {
            var e = this;
            // change Signup button text before ajax
            $(this).find("[type='submit']").html("Registering...");

            $.post($(this).attr('action'), $(this).serialize(), function(data) {

                $(e).find("[type='submit']").html("Register Now");
                if (data.status) { // If success then redirect to Signup url
                    window.location = data.redirect_location;
                }
            }).fail(function(response) {
                // handle error and show in html
                $(e).find("[type='submit']").html("Register Now");
                $(".alerts").remove();
                var erroJson = JSON.parse(response.responseText);
               
                for (var err in erroJson) {
                    for (var errstr of erroJson[err])
                        $("#reg-errors-list").append("<div class='alerts alert-danger'>" + errstr + "</div>");
                }

            });
            return false;
        });
    });
</script>



 <script type="text/javascript">

function signinModal(){
$('#signin-modal').modal('show');
$('#register-modal').modal('hide');
}       

function forgotModal(){
$('#forgot-modal').modal('show');
$('#signin-modal').modal('hide');

} 

function registerModal(){
$('#signin-modal').modal('hide');
$('#register-modal').modal('show');
}       
</script>


