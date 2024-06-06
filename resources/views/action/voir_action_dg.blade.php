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
	                                    <li>
	                                        <a href="/ajout_action_dg">Ajouter une action</a> <span class="divider">/</span>	
	                                    </li>
	                                    <!-- <li class="active">Tools</li> -->
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                     

                     <div class="row-fluid">
                        
                        <div class="block">
                               
                                <div class="block-content collapse in">
                                <div class="navbar navbar-inner block-header">
                                    
                                    <div class="muted pull-left"><span class="caption-subject"><b>Rechercher par Direction</b></span></div>
                                </div>
                                
                                <div class="span12 block-content collapse in">
                                <form action="/search_action" method="get" style="margin-top:5px;">
                                                    <select name="search_action" style="width:730px;" required>
                                                        <option value="" disabled selected>Rechercher par Direction</option>
                                                        @foreach($directions as $direction)
                                                        <option value="{{$direction->nom_direction}}">{{$direction->nom_direction}}</option>
                                                        @endforeach
                                                    </select>
                                                        <button class="btn btn-success" style="color:green;" type="submit">Filtrer</button>
                                        
                                                    </form>     
                                    </div>
                                   
                                   
                                </div>
                            </div>
                           
                            
                        </div>
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
                                    <div class="muted pull-left">Toutes les actions</div>
                                    <div class="pull-right"><span class="badge badge-info">{{count($actions)}}</span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Libelle</th>
                                                <th>Responsable</th>
                                                <th>Backup</th>
                                                <th>Priorité</th>
                                                <th>Échéance</th>
                                                
                                                
                                                
                                                <!-- <th>Options</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($actions as $action)
                                            <tr>
                                                <td>{{$action->libelle}}</td>
                                                <td>{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</td>
                                                <td>{{substr($action->bakup,0,3)}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action->risque == 'Moins(M)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:30px; width:30px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                                <td>{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                
                                                
                                               
                                               <!--  <td>
                                                <form action="{{ route('actions.destroy',$action->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('actions.edit',$action->id) }}">Modifier</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </td> -->
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