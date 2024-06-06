<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Collaboratris</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/illimitis/logo.svg')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    @include('admin.side_bar')
    <!-- End Left menu area -->
    <!-- Start Welcome area -->

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" src="{{asset('admin/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
           
        <!-- Mobile Menu header -->
         @include('admin.header')
        <!-- Mobile Menu header -->

    </div>          
    
        <!-- Mobile Menu start -->
        @include('admin.side')
        <!-- Mobile Menu end -->

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                           <!--  <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="/admin/dashboard">Tbaleau de Bord</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="/agents">Tous les Agents</a><span class="bread-blod"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Information</a></li>
                                <!-- <li><a href="#reviews"> Account Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li> -->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <h6> 
                                                      @if (session('message'))
                                                          <div class="alert alert-success" role="alert">
                                                              {{ session('message') }}
                                                          </div>  
                                                      @endif
                                                    </h6>
                                                    <form action="{{route('agents.update', $agent->id)}}" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                     @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="prenom" type="text" value="{{$agent->prenom}}" class="form-control" placeholder="Prénom">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="nom" type="text" value="{{$agent->nom}}" class="form-control" placeholder="Nom">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email" type="email" value="{{$agent->email}}" class="form-control" placeholder="Address Email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="tel" type="number" value="{{$agent->tel}}" class="form-control" placeholder="Numéro de Téléphone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="whatshap" type="number" value="{{$agent->whatshap}}" class="form-control" placeholder="Numéro Whatshap">
                                                                </div>
                                                                
                                                               <!-- <div class="form-group">
                                                                    <input name="fonction" id="postcode" type="text" value="{{$agent->fonction}}" class="form-control" placeholder="Fonction">
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label>Date de naissance</label>
                                                                    <input name="date_naiss" id="finish" type="date" value="{{$agent->date_naiss}}" class="form-control" placeholder="Date de Naissance">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="user_id" id="finish" type="hidden" value="{{$agent->user_id}}" class="form-control" placeholder="Date de Naissance">
                                                                </div>
                                                                 <!--<div class="form-group">
                                                                     <h2 class="photo">Drop La photo du l'agent or click to upload.</h2>
                                                                    <input name="photo" class="img" value="{{$agent->photo}}" type="file">
                                                                </div>-->
                                                                <!--<div class="form-group alert-up-pd">
                                                                  <div class="dz-message needsclick download-custom">
                                                                    <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                    <h2 class="edudropnone">Drop La photo du l'agent or click to upload.</h2>
                                                                    <input name="photo" class="hd-pro-img" value="{{$agent->photo}}" type="file">
                                                                    <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                    </p>
                                                                  </div>
                                                                </div> -->
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               
                                                      
                                                                <div class="form-group">
                                                                   
                                                                    <div class="form-group">
                                                                    <select name="niveau_hieracie" class="form-control">
                                                                      <optionvalue="{{$agent->niveau_hieracie}}"selected="" disabled="">Select Niveau Hieracie</option>
                                                                      <option value="Agent">Agent</option>
                                                                      <option value="Directeur">Directeur</option>
                                                                      <option value="Chef de Servive">Chef de Servive</option>
                                                                    </select>
                                                                </div>
                                                                </div>

                                                                <div class="form-group">
            
                                                                    <select name="superieur_id" class="form-control">
                                                                      <option value="{{$agent->superieur_id}}" selected="" disabled="">Select Id Superieur</option>
                                                                      @foreach($agents as $agent)
                                                                      <option value="{{$agent->id}}">{{$agent->prenom}} {{$agent->nom}}</option>
                                                                      @endforeach
                                                                      <!--<option value="02">02</option>
                                                                      <option value="03">03</option>
                                                                      <option value="03">04</option>
                                                                      <option value="05">05</option>
                                                                      <option value="05">06</option> -->
                                                                    </select>
                                                                </div>   
                                                                <div class="form-group">
                                                                    <select name="service_id" class="form-control">
                                                                      <option value="{{$agent->service_id}}" selected="" disabled="">Select Service</option>
                                                                      @foreach($services as $service)
                                                                      <option value="{{$service->id}}">{{$service->nom_service}}</option>
                                                                      @endforeach
                                    
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <select name="direction_id" class="form-control">
                                                                      <option value="{{$agent->direction_id}}" selected="" disabled="">Select Direction</option>
                                                                      @foreach($directions as $direction)
                                                                      <option value="{{$direction->id}}">{{$direction->nom_direction}}</option>
                                                                      @endforeach
                                    
                                                                    </select>
                                                                </div>

                                                               <!--  <div class="form-group">
                                                                    <select name="nom_role" class="form-control">
                                                                      <option value="{{$agent->nom_role}}" selected="" disabled="">Select Role</option>
                                                                      @foreach($roles as $role)
                                                                      <option value="{{$role->nom_role}}">{{$role->nom_role}}</option>
                                                                      @endforeach
                                    
                                                                    </select>
                                                                </div> -->
                                                                <!-- <div class="form-group">
                                                                <label>Password</label>
                                                                  <input id="password" type="password" value="{{$agent->password}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                                  @error('password')
                                                                      <span class="invalid-feedback" role="alert">
                                                                          <strong>{{ $message }}</strong>
                                                                      </span>
                                                                  @enderror                                                                
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Repeat Password</label>
                                                                   <input id="password-confirm" type="password" value="{{$agent->password_confirmation}}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                </div> -->
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Conçu avec passion par Illimités</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('admin/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('admin/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('admin/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('admin/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('admin/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('admin/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('admin/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('admin/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('admin/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('admin/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('admin/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('admin/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('admin/js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('admin/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('admin/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('admin/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('admin/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('admin/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{asset('admin/js/tawk-chat.js')}}"></script>

</body>

</html>