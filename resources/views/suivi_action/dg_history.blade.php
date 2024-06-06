<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Collaboratis</title>
        <!-- Bootstrap -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/illimitis/collobo.jpeg')}}">
        <link href="{{asset('assetsss/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('assetsss/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('assetsss/vendors/easypiechart/jquery.easy-pie-chart.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('assetsss/assets/styles.css')}}" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="{{asset('assetsss/vendors/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    </head>
    
    <body>
         <!-- Mobile Menu header -->
         @include('admin.header_dg')
        <!-- Mobile Menu header -->
        <div class="container-fluid">
            <div class="row-fluid">
            
            @include('admin.side_bar_dg')
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                           <!-- <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4> 
                            
                        	The operation completed successfully 
                            </div> -->
                            <h5> @if (session('admin'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('admin') }}
                                            </div>  
                                        @endif</h5>
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="/admin/dashboard/directeur">Accueil</a> <span class="divider">/</span>	
	                                    </li>
	                                    <!-- <li>
	                                        <a href="/actions/create">Ajouter Suivi Action</a> <span class="divider">/</span>	
	                                    </li> -->
	                                    <!-- <li class="active">Tools</li> -->
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                       <!--<div class="row-fluid">
                       
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="73">73%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="53">53%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                                    </div>
                                </div>
                                <div class="span3">
                                   

                                    </div>
                                </div>
                               <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                    </div>-->
                    <h4> 
                                                      @if (session('message'))
                                                          <div class="alert alert-success" role="alert">
                                                              {{ session('message') }}
                                                          </div>  
                                                      @endif
                                                    </h4>
    <div class="row-fluid">   
        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Historique</div>
                                    <div class="pull-right"><span class="badge badge-info">{{count($actions)}}</span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                    <thead>
                                                           <tr>
                                                              <!--  <th>Id</th> -->
                                                               <th>Date el l'Heure</th>
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
                                                                   <span class="text-success"><div class="chart" style="width:50px;" data-percent="{{$action->pourcentage}}">{{$action->pourcentage}}%</div></span>
                                                                    
                                                                    </td>
                                                                    
                                                                   <td>{{$action->note}}</td>

                                                                  
                                                                   
                                                             </tr>
                                                           @endforeach
                                                         
                                                       </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>

                </div>
            </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Collaboratis</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="{{asset('assetsss/vendors/jquery-1.9.1.min.js')}}"></script>
        <script src="{{asset('assetsss/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assetsss/vendors/easypiechart/jquery.easy-pie-chart.js')}}"></script>
        <script src="{{asset('assetsss/assets/scripts.js')}}"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>