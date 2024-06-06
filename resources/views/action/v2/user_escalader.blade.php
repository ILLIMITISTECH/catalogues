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
            @include('v2.header_user')
            <!-- end header -->

        <div class="app-main">
                <!-- side bar -->
                @include('v2.side_bar_user')
      
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
                                <h5 class="card-title">Escalation</h5>
                                <form action="{{route('action_user_a.update', $action->id)}}" method="post"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
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
                                                      <div class="controls">
                                                      <input name="action_respon" id="postcode" type="hidden" value="{{Auth::user()->prenom}} {{Auth::user()->nom}}" class="form-control" placeholder="notes">
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
                                                      <label class="control-label" for="focusedInput">Raison de l'escalation<b style="color:red;">*</b></label>
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
                                                                                @if($agent->id == Auth::user()->id)
                                                                                @foreach($agens as $agen)
                                                                                @if($agen->superieur_id == $action->superieur_id)
                                                                                <label style="color:black;">Votre Email</label>
                                                                                  <input type="email" style="border: solid 1px gray;" class="form-control" value="{{$agen->email}}" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                                                                                <div class="validation"></div>
                                                                             @endif
                                                                            @endforeach  
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
                                                <div class="form-actions pull-right" style="margin-top:10px;">
                                                    <button type="submit" class="btn btn-primary" onclick="myFunction()">Valider</button>
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
