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
        @include('admin.header_rap')
        <!-- Mobile Menu header -->

        <div class="container-fluid">
            <div class="row-fluid">
            
            @include('admin.side_bar_rap')
                
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
	                                        <a href="/admin/dashboard/rapporteur">Accueil</a> <span class="divider">/</span>	
	                                    </li>
	                                    <!-- <li>
	                                        <a href="/suivi_actions">Les Suivi actions</a> <span class="divider">/</span>	
	                                    </li> -->
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
                                <div class="muted pull-left">Information</div>
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
                                        <center><form action="{{route('action_user_rap.update', $action->id)}}" method="post"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                     @csrf
                                            <div class="tab-pane" id="tab1">

                                             <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput"></label>
                                                      <div class="controls">
                                                     
                                                      <input name="libelle" type="hidden" class="form-control" value="{{$action->libelle}}" placeholder="l'action">
                                                      </div>                      
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput"></label>
                                                      <div class="controls">
                                                      
                                                      <input name="deadline" type="hidden" class="form-control" value="{{$action->deadline}}" placeholder="date de l action">
                                                        </div>                    
                                                    </div>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                      <input name="visibilite" type="hidden" class="form-control" value="{{$action->visibilite}}" placeholder="visibilite">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                      <input name="delais" type="hidden" class="form-control" value="{{$action->delais}}" placeholder="Durée">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                      <input name="responsable" id="postcode" type="hidden" value="{{$action->responsable}}" class="form-control" placeholder="notes">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                    <label class="control-label" for="focusedInput">Responsable</label>
                                                      <div class="controls">
                                                      <select name="agent_id" class="form-control">
                                                                     <!--  <option value="{{$action->agent_id}}"  selected="" disabled="">Résponsable</option> -->
                                                                      @foreach($agents as $agent)
                                                                      @if($agent->prenom == $action->responsable)
                                                                      <option value="{{$agent->id}}">{{$agent->prenom}} {{$agent->nom}}</option>
                                                                      @endif
                                                                      @endforeach                                    
                                                                    </select>  
                                                      </div>
                                                    </div>
                                                    <div class="control-group" hidden>
                                                    <label class="control-label" for="focusedInput">Pourcentage(ne pas mettre(%))</label>
                                                      <div class="controls">
                                                      <input name="pourcentage" type="number" class="form-control" value="{{$action->pourcentage}}" placeholder="pourcentage" id="pourcent" min="0" max="100" step="2">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                      <input name="risque" id="postcode" type="hidden" value="{{$action->risque}}" class="form-control" placeholder="Risque">
                                                      </div>
                                                    </div>
                                                    <div class="control-group" hidden>
                                                      <label class="control-label" for="focusedInput">Commentaire</label>
                                                      <div class="controls">
                                                      <input name="note" id="postcode" type="text" value="{{$action->note}}" class="form-control" placeholder="notes">
                                                      </div>
                                                    </div>
                                                     
                                                     <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Raison de l'escalation</label>
                                                      <div class="controls">
                                                      <textarea name="raison" id="postcode" type="text" value="{{$action->raison}}" class="form-control" placeholder="Raison de l'escalation"></textarea>
                                                      </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="control-group" hidden>
                                                      <div class="controls">
                                                      <select name="reunion_id" class="form-control">
                                                                      <option value="{{$action->reunion_id}}"  selected="" disabled="">Select date de réunion</option>
                                                                      @foreach($reunions as $reunion)
                                                                      <option value="{{$reunion->id}}">{{$reunion->date}}</option>
                                                                      @endforeach
                                    
                                                                    </select>
                                                      </div>
                                                    </div>
                                                    <div class="control-group" hidden>
                                                      <div class="controls">
                                                      <select name="bakup" class="form-control">
                                                                      <option value="none" selected="" disabled="">Select le Backup</option>
                                                                      @foreach($agents as $agent)
                                                                      <option value="{{$agent->prenom}} {{$agent->nom}}">{{$agent->prenom}} {{$agent->nom}}</option>
                                                                      @endforeach                                    
                                                                    </select>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                
                                            </div>

                                              <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Prénom & Nom</label>
                                                                            <input type="text" style="border: solid 1px gray;" name="name" value="{{Auth::user()->prenom}} {{Auth::user()->nom}}" class="form-control" id="name" placeholder="Votre Prénom & Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                             
                                                                            <div class="form-group" hidden>    
                                                                             @foreach($agents as $agent)
                                                                                @if($agent->prenom == $action->responsable)
                                                                                <label style="color:black;">Votre Email</label>
                                                                            <input type="email" style="border: solid 1px gray;" class="form-control" value="{{$agent->email}}" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                                                                            <div class="validation"></div>
                                                                                @endif
                                                                            @endforeach  
                                                                            </div>
                                                                          
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Subject</label>
                                                                            <input type="text" style="border: solid 1px gray;" class="form-control" name="subject" value="Action Clôturée" id="subject" placeholder="Votre Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Message</label>
                                                                            <input class="form-control" style="border: solid 1px gray;" name="message" rows="5" value="{{Auth::user()->prenom}} {{Auth::user()->nom}} vient d'escalader une action." data-rule="required" data-msg="Please write something for us" placeholder="Votre Message">
                                                                            <div class="validation"></div>
                                                                            </div>
                                            <!-- <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                                                <li class="previous"><a href="javascript:void(0);">Précédent</a></li>
                                                 <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li> 
                                                <li class="next"><a href="javascript:void(0);">Suivant</a></li>
                                                <li class="next finish" style="display:none;"><a href="javascript:;">Enregistrer</a></li>
                                            </ul> -->
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" onclick="myFunction()">Valider</button>
                                                </div>
                                            </form></center>
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        
        $(function () {
       $( "#pourcent" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              alert('Ne peut pas dépasser 100');
              //$(this).val(max);
          }
          else if ($(this).val() < min)
          {
            alert('Ne peut pas avoir une valeur negative');
              //$(this).val(min);
          }       
        }); 
    });
        </script>

    </body>

</html>