<div class="dashboard-pagetitle">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Welcome to Dashboard</h6>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>
                </div>
            </div>
    	</div>

        <div class="dashboard-nav">
        	<div class="row">
            <div class="col-lg-12">
                <nav id="cssmenu">
                    <ul>
                      <li><a href="{{ route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Job Space</a></li>
                      <li><a href="{{ route('finishtask') }}"><i class="fal fa-clipboard-list-check"></i> Finished Tasks</a></li>
                      <li><a href="{{ route('mycampaign') }}"><i class="far fa-bullhorn"></i> My Campaigns</a></li>
                      <li><a href="{{ route('myaccount') }}"><i class="fal fa-file-user"></i> My Account</a></li>
                      <li><a href="{{route('withdraw') }}"><i class="far fa-wallet"></i> Withdraw</a></li>
                      <li><a href="{{ route('tutorial') }}"><i class="far fa-book-reader"></i> Tutorials</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        </div>