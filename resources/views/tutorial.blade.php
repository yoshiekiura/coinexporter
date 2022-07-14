<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>
@section('title','Tutorials')
@include("layout.menu")

<div class="con-social-sec ptb-50">
  <div class="container">
    <div class="row">
      <div class="col-6 col-lg-3">
        <div class="con-social-box">
          <a href="#" class="box-color1"><i class="fab fa-facebook-f"></i></a>
          <p>Facebook</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="con-social-box">
          <a href="#" ><i class="fab fa-telegram-plane"></i></a>
          <p>Telegram</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="con-social-box">
          <a href="#" class="box-color3"><i class="fab fa-twitter"></i></a>
          <p>Twitter</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="con-social-box">
          <a href="#" class="box-color4"><i class="fab fa-instagram"></i></a>
          <p>Instagram</p>
        </div>
      </div>
    </div>
  </div>
</div>



<section class="section-tutorial has-white-half ptb-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <div class="text-center title-blog"> 
          <div class="wow_sellers_right">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/_uQrJ0TkZlc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
         
          <h2 class="section-title mt-50 mb-25">How to start a campaign!</h2>
          <p class="mb-40">This is a video guide you can watch to know how to start a campaign and managing all forms of campaign applications and so. Firstly, you need to create an account. You don't neccesarily need to be a Direct Marketer (Promoter) before you can start campaign. Follow the following steps: Sign-up > Sign-in > Go to "My Campaign" > Read and carefully follow the steps.  </p>
          <a href="#" class="theme-btn">Learn More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="tutor-im-box ptb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="blog-standard-item wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
          <div class="image video-blog">
            <img src="{{BASEURL}}images/blog-standard-2.jpg" alt="Blog Standard">
          </div>
          
         <div class="title-blog">
            <h3>How to promote a campaign</h3>
            <p>Promoting any campaign will require you to create account and update your account by putting and having, at least, one of the required social links of yours. You can only see campaigns that matches your registered and verified country and any of your social links with verified status. Watch the video for straightforward guides.</p>
           
         </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="blog-standard-item wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
          <div class="image video-blog">
            <img src="{{BASEURL}}images/blog-standard-3.jpg" alt="Blog Standard">
          </div>
          
         <div class="title-blog">
            <h3>How to make withdraw</h3>
            <p>Making withdrawal is easy, simple and seamless. Sign-in, go to "Withdraw" page and follow the instructions. It is important you note that you can only withdraw a minimum of $20 and only funds/amount in "Total Actual Balance" is withdrawable. </p>
            
         </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="blog-standard-item wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
          <div class="image video-blog">
            <img src="{{BASEURL}}images/blog-standard-1.jpg" alt="Blog Standard">
          </div>
          
         <div class="title-blog">
            <h3>How to manage complain</h3>
            <p>There is a provision for employers and promoters (Direct Marketers) to complain to the admin where it is necessary.  Kindly watch the video and follow the steps".</p>
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
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});
</script> 


<script>
  $('.testimonial').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})
</script>

<script>
  // Get the HTML element you need.
const imageOverlay = document.getElementById('image-overlay')
const playButton = document.getElementById('play')

// Add the event listener for the play button.
playButton.addEventListener('click', play)

// The function that is called when the button is clicked.
function play(e) {
  e.preventDefault();

  // Hide the overlay and button and start playing the video.
  playButton.style.display = 'none';
  imageOverlay.style.display = 'none';

  const tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  const firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  let player;
  window.onYouTubePlayerAPIReady = function () {
    player = new YT.Player('ytplayer', {
      height: '315',
      width: '560',
      videoId: 'D0UnqGm_miA',
      events: {
        'onReady': onPlayerReady,
      },
      playerVars: {
        // 'controls': 0, // If you would like to hide the controls, uncomment this line.
      },
    });
  }

  function onPlayerReady() {
    player.playVideo();
  }
}
</script>
@include("layouts.footer")