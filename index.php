<?php include('include/config.inc'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>CHDD &mdash; Organise and Manage your Data at one place!</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/fonts/law-icons/font/flaticon.css">

  <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">


  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/slick-theme.css">

  <link rel="stylesheet" href="assets/css/helpers.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/landing-2.css">
</head>
<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">

  <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo SITE_NAME; ?></a>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="ion-navicon"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="probootstrap-navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-features">Features</a></li>
          <!--li class="nav-item"><a class="nav-link" href="#section-reviews">Reviews</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-pricing">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-faq">FAQ</a></li-->
          <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="#"><span class="pb_rounded-4 px-4">Login</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->




  <section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6">
          <h2 class="heading mb-3"><?php echo SITE_NAME; ?> makes you faster</h2>
          <div class="sub-heading">
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum erat orci, egestas interdum velit dictum ut. Curabitur euismod ligula sit amet justo cursus convallis. Praesent iaculis rutrum est, sed elementum odio iaculis nec. Praesent volutpat lorem sit amet suscipit gravida.</p>
            <!--p class="mb-5"><a class="btn btn-success btn-lg pb_btn-pill smoothscroll" href="#section-pricing"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">See Pricing</span></a></p-->
          </div>
        </div> 
        <div class="col-md-1">
        </div>
        <div class="col-md-5 relative align-self-center">

          <form action="" class="bg-white rounded pb_form_v1" method="POST" id="signupform">
            <h2 class="mb-4 mt-0 text-center">Sign Up for Free</h2>
            <div class="form-group">
              <input type="text" class="form-control pb_height-50 reverse" placeholder="Full name" name="name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control pb_height-50 reverse" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control pb_height-50 reverse" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <div class="pb_select-wrap">
                <select class="form-control pb_height-50 reverse" name="type">
                  <option value="" selected>Type</option>
                  <option value="Basic">Basic</option>
                  <option value="Business">Business</option>
                  <option value="Free">Free</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Register" name="submit1">
            </div>
          </form>

        </div> 
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="pb_section bg-light pb_slant-white pb_pb-250" id="section-features">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center mb-5">
          <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Features</strong></h5>
          <h2>Features</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-bookmarks-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Minimal Design</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-speedometer-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Fast Loading</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-infinite-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Unlimited Possibilities</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-color-filter-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Component</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-wineglass-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Clean Code</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md- col-sm-6">
          <div class="media d-block pb_feature-v1 text-left">
            <div class="pb_icon"><i class="ion-ios-paperplane-outline pb_icon-gradient"></i></div>
            <div class="media-body">
              <h5 class="mt-0 mb-3 heading">Lightweight</h5>
              <p class="text-sans-serif">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->
\

 <!--section class="pb_section bg-light pb_slant-white" id="section-pricing">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center mb-5">
          <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Pricing</strong></h5>
          <h2>Choose Your Plans</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="pb_pricing_v1 p-5 border text-center bg-white">
            <h3>Basic</h3>
            <span class="price"><sup>$</sup>19<span>month</span></span>
            <p class="pb_font-15">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
            <p class="mb-0"><a href="#" role="button" class="btn btn-secondary">Get started</a></p>
          </div>
        </div>
        <div class="col-md">
          <div class="pb_pricing_v1 p-5 border border-primary text-center bg-white">
            <h3>Business</h3>
            <span class="price"><sup>$</sup>39<span>month</span></span>
            <p class="pb_font-15">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
            <p class="mb-0"><a href="#" role="button" class="btn btn-primary btn-shadow-blue">Get started</a></p>
          </div>
        </div>
        <div class="col-md">
          <div class="pb_pricing_v1 p-5 border text-center bg-white">
            <h3>Free</h3>
            <span class="price"><sup>$</sup>99<span>month</span></span>
            <p class="pb_font-15">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
            <p class="mb-0"><a href="#" role="button" class="btn btn-secondary">Get started</a></p>
          </div>
        </div>
      </div>
    </div>
  </section-->
  <!-- ENDs ection -->

  <!--section class="pb_section pb_slant-white" id="section-faq">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center mb-5">
          <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>FAQ</strong></h5>
          <h2>Frequently Ask Questions</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div id="pb_faq" class="pb_accordion" data-children=".item">
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq1" aria-expanded="true" aria-controls="pb_faq1" class="pb_font-22 py-4">What is Instant?</a>
              <div id="pb_faq1" class="collapse show" role="tabpanel">
                <div class="py-3">
                  <p>Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq2" aria-expanded="false" aria-controls="pb_faq2" class="pb_font-22 py-4">Is this available to my country?</a>
              <div id="pb_faq2" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq3" aria-expanded="false" aria-controls="pb_faq3" class="pb_font-22 py-4">How do I use the features of Instant App?</a>
              <div id="pb_faq3" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq4" aria-expanded="false" aria-controls="pb_faq4" class="pb_font-22 py-4">How much do the Instant App cost?</a>
              <div id="pb_faq4" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
              </div>
            </div>

            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq5" aria-expanded="false" aria-controls="pb_faq5" class="pb_font-22 py-4">I have technical problem, who do I email?</a>
              <div id="pb_faq5" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section-->
<footer class="pb_footer bg-light" role="contentinfo">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <p class="pb_font-14">&copy; 2019 All Rights Reserved. <br> Designed &amp; Developed by <a href="#">Shrey Jakhmola</a> </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#1d82ff"/></svg></div>



<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.mb.YTPlayer.min.js"></script>

<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>

<script src="assets/js/main.js"></script>

</body>
</html>