<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Collaboratis</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="short icon" href="{{asset('collov2/assets/images/icon.png')}}">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/animate.css')}}">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/magnific-popup.css')}}">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/slick.css')}}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/LineIcons.css')}}">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/font-awesome.min.css')}}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/bootstrap.min.css')}}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/default.css')}}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('collov2/assets/css/style.css')}}">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->    
   
   
    <!--====== PRELOADER PART START ======-->

    <!--<div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <button class="main-btn pull-right" style="margin-top:10px;"><a href="/connexion">{{ __('connexion') }}</a></button>

                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover" style="background-image: url({{asset('collov2/assets/images/banner-bg.svg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6" style=" margin-top: 70px; ">
                        <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="row">
                                <div class="col-lg-12"   style="text-align: center;">
                                    <div class="subscribe-content mt-45">
                                        <h2 class="subscribe-title">Bienvenue sur :</h2>
                                        <img src="https://collaboratis.optievent.com/v2/assets/images/logocollaboratis.png" alt="" style="width:280px; margin-top:10px;">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="text-align: center;">
                                <div class="card-header">{{ __('Réinitialiser le mot de passe') }}</div>

                                <h6> @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif</h6>
                                    <div class=" mt-20">   
                                    <form method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                           <span class="subscribe-form" style="padding-bottom: 10px;">
                                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="exemple@*****" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror                                      
                                                </span> <br>
                                                <span class="subscribe-form" style="padding-bottom: 10px;">

                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="*********" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </span> <br>
                                                    <span class="subscribe-form" style="padding-bottom: 10px;">
 
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="*********" required autocomplete="new-password">
                                                    </span> <br> 

                                            <button class="main-btn">{{ __('Réinitialiser le mot de passe') }}</button>
                                        </form>
                                       
                                    </div>
                                </div>
                             </div> <!-- row -->
                        </div> <!-- subscribe area -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                           <p>&nbsp;</p>
                           <p>&nbsp;</p>
                           <p>&nbsp;</p>

                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
    

    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->   
    
    <!--====== PART START ======-->
    
<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->
    
    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="{{asset('collov2/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('collov2/assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{asset('collov2/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('collov2/assets/js/bootstrap.min.js')}}"></script>
    
    <!--====== Plugins js ======-->
    <script src="{{asset('collov2/assets/js/plugins.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('collov2/assets/js/slick.min.js')}}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('collov2/assets/js/ajax-contact.js')}}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('collov2/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('collov2/assets/js/jquery.counterup.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('collov2/assets/js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('collov2/assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('collov2/assets/js/scrolling-nav.js')}}"></script>
    
    <!--====== wow js ======-->
    <script src="{{asset('collov2/assets/js/wow.min.js')}}"></script>
    
    <!--====== Particles js ======-->
    <script src="{{asset('collov2/assets/js/particles.min.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('collov2/assets/js/main.js')}}"></script>
    
</body>

</html>
