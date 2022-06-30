<style>
    .error {
         color: #dc3545;
         font-size: 14px;
    }
</style>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<div class="head-bar">
                	<div class="logo"><a href="#"><img src="images/coin-exporter.png" alt=""/></a></div>
                    <div class="menu">
                    	<nav id="cssmenu" class="head_btm_menu">
	                   
                       
                        <ul>
                        <?php if($_SERVER['REQUEST_URI']=='/'){ ?>
	                    	<li class="active"><a href="{{route('index')}}">Home</a></li>
                        <?php }else{ ?>
                            <li><a href="{{route('index')}}">Home</a></li>
                        <?php } if($_SERVER['REQUEST_URI']=='/about'){ ?>
	                    	<li class="active"><a href="{{route('about')}}">About</a></li>
                        <?php }else{ ?>
                            <li><a href="{{route('about')}}">About</a></li>
                        <?php } ?>
                        <li><a href="#">Utilities</a>
                       
								<ul>	@if(Auth::check())
									<li><a href="{{route('dashboard')}}">Campaign and Promotion</a>
									
									</li>
                                    @else
                                    @endif   
									<li><a href="{{route('404')}}">Staking</a></li>
									<li><a href="{{route('404')}}">Affiliate Marketing</a></li>
									<li><a href="{{route('404')}}">ER Services</a></li>
									<li><a href="{{route('404')}}">Investment Call Support</a></li>
									<li><a href="{{route('404')}}">Coins Fora</a></li>
									<li><a href="{{route('404')}}">NFTs and NFTs Marketplace</a></li>
									<li><a href="{{route('404')}}">P2P Marketing Service</a></li>
								</ul>
							</li>
							<li><a href="#">CoinExporter Token</a>
								<ul>	
									<li><a href="#">About CoinExporter Token</a></li>
									<li><a href="#">Tokenomics</a></li>
									<li><a href="#">Affiliate Marketing</a></li>
									<li><a href="#">Investors</a></li>
									<li><a href="#">Roadmap</a></li>
									<li><a href="#">Whitepaper</a></li>
									<li><a href="#">Team</a></li>
								</ul>
							</li>
                            <?php if($_SERVER['REQUEST_URI']=='/faq'){ ?>
                            <li class="active"><a href="{{route('faq')}}">FAQ</a></li>	
                        <?php }else{ ?>
                            <li><a href="{{route('faq')}}">FAQ</a></li>	
                        <?php }if($_SERVER['REQUEST_URI']=='/contact'){ ?>
                            <li class="active"><a href="{{route('contact')}}">Contact</a></li>
                        <?php }else{ ?>
	                    	<li><a href="{{route('contact')}}">Contact</a></li>
                        <?php } ?>
                           
                          
                            
	                </nav>
                    </div>
                   
                    @if(Auth::check())
                    <div class="head-btn">
                    <a href="{{ route('logout') }}" class="login"><i class="fal fa-user"></i> Log Out</a>
                        </div>
                    @else
                    <div class="head-btn">
                    	<a href="#" class="login" data-bs-toggle="modal" data-bs-target="#signin-modal"><i class="fal fa-user"></i> Login</a>
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#register-modal"><i class="far fa-lock"></i> Register</a>
                    </div>
                    @endif   
              </div>
            </div>
        </div>
    </div>
</header>


<!--============================= Sign In Modal =============================-->


<div id="signin-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog loginpanle-modal">
        <div class="modal-content">
            <div class="modal-header">
            	<img src="images/coin-exporter.png" alt=""/>
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
          <form id="loginForm" method="POST" action="{{ route('login') }}" onsubmit="return loginsubmitForm();">
            @csrf
          <div class="modal-body">
            <h4>
                Login in your account
                <span>Use your credentials to access your account</span>
              </h4>
              <ul>
               	  <li>
                  	  <i class="far fa-user"></i>
                   	  <input type="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Email">
                       @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </li>
                  <li>
                  	  <i class="far fa-lock"></i>
                   	  <input class="form-control" type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="Password">
                                @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </li>

                  <li>
                    <div class="row">
                        <div class="col-6 chkboxmain">
                            <input id="Option5" type="checkbox">
                            <label class="checkbox" for="Option5" name="remember"> Remember Me</label>
                        </div>
                        <div class="col-6 text-end"> @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">Forgot Password?</a> @endif</div>
                    </div>
                </li>
                  <li class="pb-2">{!! NoCaptcha::display() !!}
                    {{ csrf_field() }}
                    <div id="g-recaptcha-error"></div>
                  </li>
                  <li>
                   	  <button type="submit" class="btn">Sign In</button>
                  </li>
           	    <li class="text-center dont-account">Don't have an account? <a href="#">Sign Up</a></li>
                  
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



<!-- ====================================Register Modal======================= -->

<div id="register-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog loginpanle-modal">
        <div class="modal-content">
            <div class="modal-header">
              <img src="images/coin-exporter.png" alt=""/>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

          <form id="regForm" method="POST" action="{{ route('register') }}" >
            @csrf
          <div class="modal-body">
            <h4>
                Create Your account
                <span>Setup a new account in a minute.</span>
              </h4>
              <ul>
                  <li>
                      <i class="far fa-user"></i>
                      <input type="text" class="form-control err" name="name" :value="old('name')" required autofocus placeholder="Enter Your Name">
                      @error('name')
                        <div class="alert alert-danger mt-1 mb-1" style="color:red">{{ $message }}</div>
                        @enderror
                  </li>
                  <li>
                      <i class="fas fa-envelope"></i>
                      <input type="text" class="form-control err" name="email" :value="old('email')" required placeholder="Enter Your Mail">
                      @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </li>
                   <li>
                      <i class="far fa-lock"></i>
                      <input class="form-control err" type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="Password">
                                @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </li>
                   <li>
                      <i class="fas fa-flag"></i>
                      <select class="form-select form-control" aria-label="Default select example" name="country" id="country"
                                required >
                      <option value="">Country</option>
                      @php
                    $countries = App\Models\Country::all();
                    @endphp
                    @foreach ($countries as $country)
                        <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                    @endforeach
                      </select>
                      
                  </li>
                  @error('country')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  <!-- <li class="pb-2"><img src="images/captcha.jpg" class="w-75" alt=""/></li> -->
                  <li class="pb-2 ">{!! NoCaptcha::display() !!}
                    {{ csrf_field() }}
                 
                  </li>
                  <li>
                    <div class="row">
                        <div class="col-12 chkboxmain err">
                            <input id="Option6" name="terms" type="checkbox" checked>
                            <label class="checkbox" for="Option6"> I read and agreed to the CoinExporter privacy and terms and conditions.</label>
                            @error('terms')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </li>
                  
                  <li>
                      <button type="submit" class="btn">Register Now</button>
                  </li>
                <li class="text-center dont-account">Already have an account? <a href="#">Sign In</a></li>
                  
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
                    name: "required",
                    email: {required:true,email:true},
                    password: "required",
                    country: "required",
                    captcha: "required",
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
                    captcha: "Captcha is required",
                    terms: "Terms & Conditions is required",
                }
                
            });
        });
    </script>
    <script>
function loginsubmitForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }
    return true;
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
                  email: {required:true,email:true},
                    password: "required",
                    captcha: "required",
                },
                messages: {
                  email: {
                        required: "Email is Required",
                        email: "Enter Valid Email",
                    },
                    password: "Password is required",
                    captcha: "Captcha is required",
                }
                
            });
        });
    </script>
  