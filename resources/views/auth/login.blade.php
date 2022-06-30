<!DOCTYPE html>
<html lang="en">
@include("layout.header")
<body>

<section class="error-page text-center ptb-50">
    <div class="container">
        <div class="error-content">
            <img src="images/404.png" alt="404 Error">
            <h2>Oops! You are not logged in. Please Go to home .</h2>
            <p>This page is 401 Unauthorized. <br>
<br>
Thank you.</p>
                   
                        <a href="<?php echo BASEURL;?>" class="theme-btn mt-10"><i class="fas fa-home"></i>Go to  Home</a>
                       
        </div>
    </div>
</section>

</body>
</html>