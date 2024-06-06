<!doctype html>
<html class="no-js" lang="zxx">

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
    @include('admin.side_bar_user')
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
          
          
        </div>
        <h6> 
                                                      @if (session('message'))
                                                          <div class="alert alert-success" role="alert">
                                                              {{ session('message') }}
                                                          </div>  
                                                      @endif
                                                    </h6>
                                                    
          <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Performances</b></span>
                                        </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:50px;"> 
                                               
                                               <p><b>Mes Performances</b>: <b style="color:green;">{{intval($sum_actions/count($actions))}}%</b></p>
                                                @if(intval($sum_actions/count($actions)) >= "100")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif(intval($sum_actions/count($actions)) >= "90")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="90" style="width:90%;"> <span class="sr-only">90% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "80")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="80" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "70")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="70" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_actions/count($actions)) >= "60")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="60" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_actions/count($actions)) >= "50")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "40")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="40" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "30")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="30" style="width:30%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "20")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="20" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "10")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="10" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "5")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="5" style="width:5%;"> <span class="sr-only">5% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "00")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="00" style="width:00%;"> <span class="sr-only">00% Complete</span> </div>
                                                </div>
                                                @endif


                                           </table>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                           <!--  <div id="extra-area-chart" style="height: 356px;"></div> -->
                        </div>
                    </div>             
                    
         <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                        <h5> @if (session('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('message') }}
                                            </div>  
                                        @endif</h5>
                                            <span class="caption-subject"><b>Les actions pour lesquelles je suis responsable</b></span>
                                        </div>
                                        <div style="margin-top:50px;"> 
                                               
                                            <div class="row">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Libelle</th>
                                                               <th>Backup</th>
                                                              <th>Priorité</th>
                                                            <th>Durée</th>                              
                                                            <th>Pourcentage</th>
                                                            <th>Échéance</th>                
                                                               <th>Note</th>
                                                               <th>Options</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_respons as $action)
                                                                 
                                                           
                                                             <tr>
                                                                   <form action="/save_action" method="post" id="target">
                                                                   <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                                                                   
                                                                   <td>{{$action->libelle}}</td>
                                                                    <td>{{$action->bakup}}</td>
                                                                   @if($action->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action->risque == 'Moins(M)')
                                                                   <<td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:45px; width:45px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                                                   <td>{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>
                                                                  
                                                                   
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
                                                                    <td>{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                                   <td>{{$action->note}}</td>

                                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                                   

                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <!--<a href="{{route('action_user_r.editer', $action->id)}}"><button type="submit" id="action" class="button">Save Ant Maj</button></a>-->
                                                                          <button><a href="{{route('action_user_r.editer', $action->id)}}">Maj</a></button>
                                                                          <button><a href="{{route('action_user_rap.editer', $action->id)}}" class="button">Esclader</a></button>
                                                                          <!--<button><a href="{{route('history_r.voir', $action->id)}}" class="button">History</a></button>-->

                                                                       </div>
                                                                       
                                                                   </td>
                                                                  </form>
                                                                   
                                                             </tr>
                                                            
                                                           @endforeach
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                   </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b></b></span>
                                        </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:95px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Escalader</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_users as $action)
                                                             <tr>
                                                                  
                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <button><a href="{{route('action_user_a.editer', $action->id)}}" class="button">Escalader</a></button>
                                                                   
                                                                       </div>
                                                                   </td>
                                                                   
                                                             </tr>
                                                           @endforeach
                                                          
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                  
                                    </div> -->
                                    
                                </div>
                            </div>
                            
                           <!--  <div id="extra-area-chart" style="height: 356px;"></div> -->
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Page Views</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div> 
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Bounce Rate</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                                </li>
                            </ul>
                        </div> 
                    </div> -->

                </div>
            </div>
        </div>
        
        
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                        <h5> @if (session('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('message') }}
                                            </div>  
                                        @endif</h5>
                                            <span class="caption-subject"><b>Les actions pour lesquelles je suis Backup</b></span>
                                        </div>
                                        <div style="margin-top:50px;"> 
                                               
                                            <div class="row">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Libelle</th>
                                                               <th>Backup</th>
                                                               <th>Priorité</th>
                                                                <th>Durée</th>                              
                                                                <th>Pourcentage</th>
                                                                <th>Échéance</th>         
                                                               <th>Note</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_bakups as $action)
                                                                 
                                                            
                                                             <tr>
                                                                   <form action="/save_action" method="post" id="target">
                                                                   <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                                                                   
                                                                   <td>{{$action->libelle}}</td>
                                                    @if($action->niveau_hieracie =='Directeur')
                                                   <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                    <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                    <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                    <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @endif
                                                                  @if($action->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action->risque == 'Moins(M)')
                                                                   <<td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:45px; width:45px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                                                   <td>{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>
                                                                  
                                                                   
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
                                                                    <td>{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                                   <td>{{$action->note}}</td>

                                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                                   

                                                                   
                                                                  </form>
                                                                   
                                                             </tr>
                                                            
                                                           @endforeach
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                   </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b></b></span>
                                        </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:95px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Escalader</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_users as $action)
                                                             <tr>
                                                                  
                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <button><a href="{{route('action_user_a.editer', $action->id)}}" class="button">Escalader</a></button>
                                                                   
                                                                       </div>
                                                                   </td>
                                                                   
                                                             </tr>
                                                           @endforeach
                                                          
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                  
                                    </div> -->
                                    
                                </div>
                            </div>
                            
                           <!--  <div id="extra-area-chart" style="height: 356px;"></div> -->
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Page Views</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div> 
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Bounce Rate</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                                </li>
                            </ul>
                        </div> 
                    </div> -->

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