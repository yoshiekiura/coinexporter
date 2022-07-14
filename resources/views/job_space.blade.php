<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>

@include("layout.menu")

<div class="dashboard-body">
    <div class="container">


        <div class="dashboard-advertisment">
            <div class="row">
                <div class="col-lg-6 col-md-6 text-end">
                    <img src="{{BASEURL}}images/banner1.jpg" alt="" />
                </div>
                <div class="col-lg-6 col-md-6 text-start">
                    <img src="{{BASEURL}}images/banner2.jpg" alt="" />
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="table_responsive_maas">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <form action="{{url('/search')}}" method="POST" role="search"> --}}
                                {{csrf_field()}}
                                <th width="55%" style="text-align:left;"><input type="text" class="form-control" placeholder="Job Name">
                                    <!-- <button type="submit" class="btn btn-info"><i class="fas fa-search fa-sm"></i></button> -->
                                </th>
                                <!-- </form> -->
                                <th width="15%">
                                    <select class="selectbox-design ">
                                        <option>Payment</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                    </select>
                                </th>
                                <th width="15%">Status</th>
                                <th width="15%">Done</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $job_spaces = App\Models\JobSpace::select("job_spaces.*","job_spaces.status as sts")
                            ->orderby("job_spaces.colors","desc")
                            ->get();

                            @endphp
                            @foreach ($job_spaces as $job_space)
                            @php
                            $data = App\Models\JobDone::select("proof_of_work as pof")->where("campaign_id",$job_space->id)->count();
                            @endphp
                        @if($data == $job_space->promoters_needed)

                        @else
                           @if($job_space->colors == 'LG')
                            <tr>
                                <td align="left" style="background-color:#C4EE98;"><a href="{{ route('jobdetail', ['id' => $job_space->id]) }}">{{$job_space->campaign_name}}</a></td>
                                <td style="background-color:#C4EE98;">${{$job_space->campaign_earning}}</td>
                                <?php if ($job_space->sts == 'active') { ?>
                                    <td style="background-color:#C4EE98;"><span class="rectangual-box"></span></td>
                                <?php } else { ?>
                                    <td style="background-color:#C4EE98;"><span class="rectangual-box" style="background-color:red;"></span></td>
                                <?php } ?>
                                <td style="background-color:#C4EE98;">{{$data}}/<sup>{{$job_space->promoters_needed}}</sup></td>
                            </tr>
                            @elseif($job_space->colors == 'L')
                            <tr >
                                <td align="left" style="background-color:#F9734B;"><a href="{{ route('jobdetail', ['id' => $job_space->id]) }}">{{$job_space->campaign_name}}</a></td>
                                <td style="background-color:#F9734B;">${{$job_space->campaign_earning}}</td>
                                <?php if ($job_space->sts == 'active') { ?>
                                    <td style="background-color:#F9734B;"><span class="rectangual-box"></span></td>
                                <?php } else { ?>
                                    <td style="background-color:#F9734B;"><span class="rectangual-box" style="background-color:red;"></span></td>
                                <?php } ?>
                                <td style="background-color:#F9734B;">{{$data}}/<sup>{{$job_space->promoters_needed}}</sup></td>
                            </tr>
                            @elseif($job_space->colors == 'Y')
                            <tr >
                                <td align="left" style="background-color:#ECF70E;"><a href="{{ route('jobdetail', ['id' => $job_space->id]) }}">{{$job_space->campaign_name}}</a></td>
                                <td style="background-color:#ECF70E;">${{$job_space->campaign_earning}}</td>
                                <?php if ($job_space->sts == 'active') { ?>
                                    <td style="background-color:#ECF70E;"><span class="rectangual-box"></span></td>
                                <?php } else { ?>
                                    <td style="background-color:#ECF70E;"><span class="rectangual-box" style="background-color:red;"></span></td>
                                <?php } ?>
                                <td style="background-color:#ECF70E;">{{$data}}/<sup>{{$job_space->promoters_needed}}</sup></td>
                            </tr>
                            @else
                            <tr>
                                <td align="left" ><a href="{{ route('jobdetail', ['id' => $job_space->id]) }}">{{$job_space->campaign_name}}</a></td>
                                <td>${{$job_space->campaign_earning}}</td>
                                <?php if ($job_space->sts == 'active') { ?>
                                    <td><span class="rectangual-box"></span></td>
                                <?php } else { ?>
                                    <td><span class="rectangual-box" style="background-color:red;"></span></td>
                                <?php } ?>
                                <td>{{$data}}/<sup>{{$job_space->promoters_needed}}</sup></td>
                            </tr>
                            @endif
                            @endif 
                            @endforeach
                        </tbody>
                    </table>
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


@include("layout.footer")