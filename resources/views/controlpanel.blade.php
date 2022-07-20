@include("layouts.header")
<div class="welcome-dashboard">
    <div class="container">
    @section('title', 'Dashboard')
        @include("layouts.menu")
    </div>
</div>

<div class="finish-task">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="finish-title">
                    <h3>Welcome to Dashboard page </h3>
                    <!-- <h4>Where you can see your completed tasks, their details and upload the proof of work done</h4> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-primary border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalPendingBalance}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-secondary border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Referral Bonus Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-success border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Actual Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalActualBalance}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-info border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Campaign Bonus Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-info border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Withdrawn Amount</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{$withdrawalBalance}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card-dash border-start border-primary border-3 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Balances</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalBalances}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fad fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

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
                              <th width="10%">Date</th>
                              <th width="30%"> Description</th>
                              <th width="20%">Amount</th>
                              <th width="20%">Balance</th>
                              <th width="10%">Type</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="left">Fsgdh3987dhsd </td>
                              <td>Write reviews and post</td>
                              <td>Uploaded</td>
                              <td>$50 </td>
                              <td>Confirmed </td>
                              <td>10 June,2022</td>
                              
                            </tr>
                            <tr>
                              <td align="left">Hgvdsbjd84736bv</td>
                              <td>Write reviews and post</td>
                              <td>Click here to upload</td>
                              <td>$62 </td>
                              <td>Pending </td>
                              <td>14 June,2022</td>
                              
                            </tr>
                            <tr>
                              <td align="left">Kjhsdg897hgd </td>
                              <td>Write reviews and post</td>
                              <td>Uploaded</td>
                              <td>$28 </td>
                              <td>(Click to view reason)</td>
                              <td>16 June,2022</td>
                              
                            </tr>
                          </tbody>
                      </table>
                   </div>
              </div>

          </div>
      </div>
  </div>
</div>


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
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    });
</script>


@include("layouts.footer")