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
    @include('admin.side_bar_directeur')
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
                                            <li><a href="/admin/dashboard/directeur">Tbaleau de Bord</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="/admin/dashboard/directeur">Tous les Actions</a><span class="bread-blod"></span>
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
                                <li class="active"><a href="#description">Historique</a></li>
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
                                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                              <!--  <th>Id</th> -->
                                                               <th>Date et L'heure</th>
                                                               <!-- <th>Risque</th> -->
                                                               <th>Pourcentage</th>                 
                                                               <th>Note</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                     

                                                           @foreach($actions as $action)

                                                             <tr>
                                                            
                                                                  
                                                                   <!-- <td>{{$action->id}}</td> -->
                                                                   <td>{{$action->created_at}}</td>
                                                                   <!-- <td>{{$action->risque}}</td> -->
                                                                  
                                                                   
                                                                   <td>
                                                                <span class="text-success">{{$action->pourcentage}}%</span>
                                                                    @if($action->pourcentage == "100")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "90")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "80")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "70")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "60")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "50")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "40")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "30")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "20")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "10")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "00")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                                        </div>
                                                                    @endif  
                                                                    </td>
                                                                   <td>{{$action->note}}</td>

                                                                  
                                                                   
                                                             </tr>
                                                           @endforeach
                                                         
                                                       </tbody>
                                                        
                                                   </table>
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