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
        @include('admin.header_responsable')
        <!-- Mobile Menu header -->

        <div class="container-fluid">
            <div class="row-fluid">
            
            @include('admin.side_bar_responsable')
                
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
	                                        <a href="/admin/dashboard/responsable">Accueil</a> <span class="divider">/</span>	
	                                    </li>
	                                    <!-- <li>
	                                        <a href="/actions/create">Ajouter action</a> <span class="divider">/</span>	
	                                    </li> -->
	                                    <!-- <li class="active">Tools</li> -->
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                      <div class="row-fluid">
                       
                      <div class="block">
                            <!-- <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div> -->
                            <div class="block-content collapse in">
                                <div class="span12">
                                <div class="chart" data-percent="{{intval($sum_actions/count($actions))}}">{{intval($sum_actions/count($actions))}}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Performance de ma direction</span>

                                    </div>
                                </div>
                                <!-- <div class="span3">
                                    <div class="chart" data-percent="53">53%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                                    </div>
                                </div>
                                <div class="span3">
                                   
                                </div> -->
                               <!-- <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                                    </div>
                                </div>  -->
                            </div>
                        </div>
                        
                    </div>
                      @if (session('message'))
                          <div class="alert alert-success" role="alert">
                              {{ session('message') }}
                          </div>  
                      @endif
    <div class="row-fluid">   
        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Actions de ma direction</div>
                                    <div class="pull-right"><span class="badge badge-info">{{count($actions)}}</span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                    <thead>
                                                <tr>
                                                <th>Libelle</th>
                                                <th>Responsable</th>
                                                <th>Back-up</th>
                                                <th>Priorité</th>
                                                <th>Échéance</th>
                                                <th>Durée écoulée</th>                              
                                                <th>Pourcentage</th>
                                                
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($actions as $action_direction)
                                      <tr>
                                          
                                          <td style="text-align:left;">{{$action_direction->libelle}}</td>
                                          <td>
                                              <!--<div class="student-img">
                                                <img src="{{url('images',$action_direction->photo)}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                              </div> -->
                                              <div class="student-dtl">
                                                    <p class="dp" style="margin-left:-20px;">{{substr($action_direction->prenom, 0, 1)}} {{substr($action_direction->nom, 0, 1)}}</p>
                                                </div>
                                                
                                                
                                            </td>
                                             <td>{{substr($action_direction->bakup,0,3)}}</td>
                                             @if($action_direction->risque == 'Elevé(E)')
                                                                       <td> 
                                                                            <div class="student-img">
                                                                                <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                            </div>
                                                                        </td>
                                                                       @elseif($action_direction->risque == 'Moins(M)')
                                                                       <td> 
                                                                            <div class="student-img">
                                                                                <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                            </div>
                                                                        </td>
                                                                       @else($action_direction->risque == 'Faible(F)')
                                                                      <td> 
                                                                            <div class="student-img">
                                                                                <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                            </div>
                                                                        </td>
                                                                       @endif
                                                                       <td>{{strftime("%d/%m/%Y", strtotime($action_direction->deadline))}}</td>
                                          <td>{{ intval(abs(strtotime($date1) - strtotime($action_direction->created_at))/ 86400)}} J</td>
                                         
                                         
                                          <td>
                                          <span class="text-success"><div class="chart" style="width:50px;" data-percent="{{$action_direction->pourcentage}}">{{$action_direction->pourcentage}}%</div></span>
                                           
                                            </td>
                                            
                                           
                                            
                                          
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