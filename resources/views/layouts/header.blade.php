


<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            	<div class="head-bar">
                	<div class="logo"><a href="#"><img src="images/coin-exporter.png" alt=""/></a></div>
                    <div class="dashboard_table_sec_top_right">
                    
                    		<div class="search-input">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="fa fa-search"></span>
                                </div>
                    
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
											<a class="list_btn" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/prof-img.jpg" alt="" title=""></a>
											<div class="dropdown-menu new_drop_cont" aria-labelledby="dropdownMenuLink2">
											<div class="profile-header d-flex align-items-center">
                                                <div class="thumb-area">
                                                    <img src="images/prof-img.jpg" alt="profile">
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
												    <li class="dropdown-item"><a href="#changeModal" data-toggle="modal" data-target="#changeModal"><i class="fas fa-key"></i>Change Password</a></li>
												    <li class="dropdown-item"><a href="{{ route('logout') }}"><i class="fas fa-power-off"></i>Sign Out</a></li>
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
                         </div>
						</div>
              </div>
            </div>
        </div>
    </div>
</header>
<!-- ========================== change password modal======================= -->
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 385px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" >
       <img src="images/lock.png" style="max-width: 40%;">
       <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">Old Password</label>
            <input type="text" name="" style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">New Password</label>
            <input type="text" name=""  style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="text-align: left;">
            <label style="padding-bottom: 2px;">Confirm New Password</label>
            <input type="text" name="" style="padding: 5px 7px;">
        </div>
        <div class="pass-title" style="margin-top: 30px; margin-bottom: 6px;">
            <button>Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>