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
        @include('admin.header_admin')
        <!-- Mobile Menu header -->

        <div class="container-fluid">
            <div class="row-fluid">
            
            @include('admin.side_bar_admin')
                
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
	                                        <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li>
	                                        <a href="/agents">Les Agents</a> <span class="divider">/</span>	
	                                    </li>
	                                    <!-- <li class="active">Tools</li> -->
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                        
                       

                    <!-- wizard -->
                    <div id="content">
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Inscriptions</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <!-- <div class="navbar">
                                           <div class="navbar-inner">
                                            <div class="container">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab">Step 1</a></li>
                                                <li><a href="#tab2" data-toggle="tab">Step 2</a></li>
                                                <li><a href="#tab3" data-toggle="tab">Step 3</a></li>
                                            </ul> 
                                         </div>
                                          </div>
                                        </div> -->
                                       <!--  <div id="bar" class="progress progress-striped active">
                                          <div class="bar"></div>
                                        </div> -->
                                        <h4> 
                                                      @if (session('message'))
                                                          <div class="alert alert-success" role="alert">
                                                              {{ session('message') }}
                                                          </div>  
                                                      @endif
                                                    </h4>
                                        <div class="tab-content">
                                        <form action="{{route('agents.store')}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                            <div class="tab-pane" id="tab1">

                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Prénom</label>
                                                      <div class="controls">
                                                      <input name="prenom" type="text" class="form-control" style="width:500px;" placeholder="Prénom">
                                                      </div>                      
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Nom</label>
                                                      <div class="controls">
                                                      <input name="nom" type="text" class="form-control" style="width:500px;" placeholder="Nom">
                                                      </div>                      
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Email</label>
                                                      <div class="controls">
                                                      <input name="email" type="email" class="form-control" style="width:500px;" placeholder="Exemple@">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Numéro de Téléphone</label>
                                                      <div class="controls">
                                                      <input name="tel" type="number" class="form-control" style="width:500px;" placeholder="Numéro de Téléphone">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Numéro Whatshap</label>
                                                      <div class="controls">
                                                      <input name="whatshap" type="number" class="form-control" style="width:500px;" placeholder="Numéro Whatshap">
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Date de Naissance</label>
                                                      <div class="controls">
                                                      <input name="date_naiss" id="finish" type="date" class="form-control" style="width:500px;" placeholder="Date de Naissance">
                                                      </div>
                                                    </div>
                                                    <!--<div class="control-group">
                                                      <label class="control-label" for="focusedInput">Laissez tomber La photo de l'agent ou cliquez pour télécharger</label>
                                                      <div class="controls">
                                                      <h4 class="photo">Laissez tomber La photo de l'agent ou cliquez pour télécharger.</h4>
                                                                    <input name="photo" class="img" style="width:500px;" type="file">
                                                      </div>
                                                    </div> -->
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Niveau Hieracie</label>
                                                      <div class="controls">
                                                            <select name="niveau_hieracie" style="width:500px;" class="form-control">
                                                                      <option value="none" selected="" disabled="">Select Niveau Hieracie</option>
                                                                      <option value="Agent">Agent</option>
                                                                      <option value="Directeur">Directeur</option>
                                                                      <option value="Chef de Service">Chef de Service</option>
                                                            </select>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Id Superieur</label>
                                                      <div class="controls">                        
                                                                    <select name="superieur_id" style="width:500px;" class="form-control">
                                                                      <option value="00" selected="" disabled="">Select Id Superieur</option>
                                                                      @foreach($agents as $agent)
                                                                      <option value="{{$agent->id}}">{{$agent->prenom}} {{$agent->nom}}</option>
                                                                      @endforeach                                                                
                                                                    </select>                                                               
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Service</label>
                                                      <div class="controls">
                                                                <select name="service_id" style="width:500px;" class="form-control">
                                                                      <option value="none" selected="" disabled="">Select Service</option>
                                                                      @foreach($services as $service)
                                                                      <option value="{{$service->id}}">{{$service->nom_service}}</option>
                                                                      @endforeach                                    
                                                                </select>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Direction</label>
                                                      <div class="controls">
                                                                    <select name="direction_id" style="width:500px;" class="form-control">
                                                                      <option value="none" selected="" disabled="">Select Direction</option>
                                                                      @foreach($directions as $direction)
                                                                      <option value="{{$direction->id}}">{{$direction->nom_direction}}</option>
                                                                      @endforeach                                    
                                                                    </select>
                                                      </div>
                                                    </div>

                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Role</label>
                                                      <div class="controls">
                                                                    <select name="nom_role" style="width:500px;" class="form-control">
                                                                      <option value="none" selected="" disabled="">Select Role</option>
                                                                      @foreach($roles as $role)
                                                                      <option value="{{$role->nom_role}}">{{$role->nom_role}}</option>
                                                                      @endforeach                                    
                                                                    </select>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Mot de passe</label>
                                                      <div class="controls">
                                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="width:500px;" required autocomplete="new-password">
                                                                  @error('password')
                                                                      <span class="invalid-feedback" role="alert">
                                                                          <strong>{{ $message }}</strong>
                                                                      </span>
                                                                  @enderror   
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Confirmer le mot de passe</label>
                                                      <div class="controls">
                                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width:500px;" required autocomplete="new-password">
                                                      </div>
                                                    </div>

                                                  </fieldset>
                                                
                                            </div>
                                            <!-- <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                                                <li class="previous"><a href="javascript:void(0);">Précédent</a></li>
                                                 <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li> 
                                                <li class="next"><a href="javascript:void(0);">Suivant</a></li>
                                                <li class="next finish" style="display:none;"><a href="javascript:;">Enregistrer</a></li>
                                            </ul> -->
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    
	            <!-- /wizard -->
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
        <link href="{{asset('assetsss/vendors/datepicker.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('assetsss/vendors/uniform.default.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('assetsss/vendors/chosen.min.css')}}" rel="stylesheet" media="screen">

        <link href="{{asset('assetsss/vendors/wysiwyg/bootstrap-wysihtml5.css')}}" rel="stylesheet" media="screen">
        <script src="{{asset('assetsss/vendors/jquery.uniform.min.js')}}"></script>
        <script src="{{asset('assetsss/vendors/chosen.jquery.min.js')}}"></script>
        <script src="{{asset('assetsss/vendors/bootstrap-datepicker.js')}}"></script>

        <script src="{{asset('assetsss/vendors/wysiwyg/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('assetsss/vendors/wysiwyg/bootstrap-wysihtml5.js')}}"></script>

        <script src="{{asset('assetsss/vendors/wizard/jquery.bootstrap.wizard.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('assetsss/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assetsss/assets/form-validation.js')}}"></script>
            
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>

    </body>

</html>