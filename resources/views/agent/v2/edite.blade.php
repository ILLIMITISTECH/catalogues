<!doctype html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="short icon" href="{{asset('collov2/assets/images/icon.png')}}">
    <title>COLLABORATIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="{{asset('v2/main.css')}}" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <!--header -->
            @include('v2.header_admin')
            <!-- end header -->

        <div class="app-main">
                <!-- side bar -->
                @include('v2.side_bar_admin')
      
                <!-- end side bar -->
                
                       <!-- perfo -->

                       <!-- end perfo --> 
                     
                        
                        <!-- perfo de mes direc -->
                       

                         <!-- end perfo de mes direct -->
                        
                        <!-- section -->

                <div class="app-main__outer">  
                    <div class="app-main__inner">
                                  <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Mise à jours</h5>
                                <form action="{{route('agents.update', $agent->id)}}" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                     @csrf
                                            <div class="tab-pane" id="tab1">

                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Prénom</label>
                                                      <div class="controls">
                                                      <input name="prenom" type="text" class="form-control" value="{{$agent->prenom}}" style="width:500px;" placeholder="Prénom">
                                                      </div>                      
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Nom</label>
                                                      <div class="controls">
                                                      <input name="nom" type="text" class="form-control" value="{{$agent->nom}}" style="width:500px;" placeholder="Nom">
                                                      </div>                      
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Email</label>
                                                      <div class="controls">
                                                      <input name="email" type="email" class="form-control" value="{{$agent->email}}" style="width:500px;" placeholder="Exemple@">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Numéro de Téléphone</label>
                                                      <div class="controls">
                                                      <input name="tel" type="number" class="form-control" value="{{$agent->tel}}" style="width:500px;" placeholder="Numéro de Téléphone">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Numéro Whatshap</label>
                                                      <div class="controls">
                                                      <input name="whatshap" type="number" class="form-control" value="{{$agent->whatshap}}" style="width:500px;" placeholder="Numéro Whatshap">
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Date de Naissance</label>
                                                      <div class="controls">
                                                      <input name="date_naiss" id="finish" type="date" class="form-control" value="{{$agent->date_naiss}}" style="width:500px;" placeholder="Date de Naissance">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                      <input name="user_id" id="finish" type="hidden" value="{{$agent->user_id}}" class="form-control" placeholder="Date de Naissance">
                                                      </div>
                                                    </div>

                                                    <!--<div class="control-group">
                                                      <label class="control-label" for="focusedInput">Laissez tomber La photo de l'agent ou cliquez pour télécharger</label>
                                                      <div class="controls">
                                                      <h4 class="photo">Laissez tomber La photo de l'agent ou cliquez pour télécharger.</h4>
                                                                    <input name="photo" class="img" style="width:500px;" value="{{$agent->photo}}" type="file">
                                                      </div>
                                                    </div>-->
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Niveau Hieracie</label>
                                                      <div class="controls">
                                                            <select name="niveau_hieracie" style="width:500px;" class="form-control">
                                                                      <option value="{{$agent->niveau_hieracie}}" selected="" disabled="">Select Niveau Hieracie</option>
                                                                      <option value="Agent">Agent</option>
                                                                      <option value="Directeur">Directeur</option>
                                                                      <option value="Chef de Servive">Chef de Servive</option>
                                                            </select>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Select Id Superieur</label>
                                                      <div class="controls">                        
                                                                    <select name="superieur_id" style="width:500px;" class="form-control">
                                                                      <option value="{{$agent->superieur_id}}" selected="" disabled="">Select Id Superieur</option>
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
                                                                      <option value="{{$agent->service_id}}" selected="" disabled="">Select Service</option>
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
                                                                      <option value="{{$agent->direction_id}}" selected="" disabled="">Select Direction</option>
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
                                                                      <option value="{{$agent->nom_role}}" selected="" disabled="">Select Role</option>
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
                                                <div class="form-actions pull-right" style="margin-top:20px;">
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </div>
                                            </form>
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </div>
                        </div>

                                                
                    </div>
                        

                        
                    </div>
                    
                        <!-- end section -->

                            <div class="app-wrapper-footer">
                                <div class="app-footer">
                                    <div class="app-footer__inner">
                                        <div class="app-footer-left">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>    
                    
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>

<script src="{{asset('v2/main.js')}}"></script>
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
