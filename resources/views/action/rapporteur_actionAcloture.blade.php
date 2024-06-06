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
	                                        <a href="/actions/create">Ajouter action</a> <span class="divider">/</span>	
	                                    </li> -->
	                                    <!-- <li class="active">Tools</li> -->
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                        @if($actions == " ")
                        No action
                        @else
                        @if($sum_actions == " ")
                        No action
                        @else
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
                                    <div class="chart-bottom-heading"><span class="label label-info">Performance de ma Direction</span>

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
                    <h4> 
                                                      @if (session('message'))
                                                          <div class="alert alert-success" role="alert">
                                                              {{ session('message') }}
                                                          </div>  
                                                      @endif
                                                    </h4>
                                                    @if(Session::has("success"))
                                                    <div class="alert alert-success">
                                                    <b>Action clôturée avec succès.</b> 
                                                    </div>
                                                    @endif
    <div class="row-fluid">   
        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Les taches clôturées de ma Direction</div>
                                    <div class="pull-right"><span class="badge badge-info"></span>

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
                                                <!--<th>Pourcentage</th>-->
                                                
                                                <th  width="250px;" style="text-align:center">Etat</th>

                                                <th width="250px;">Clôture</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </thead>
                                            <form action="{{route('contact.store')}}" method="post" id="target">
                                                                       <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                @foreach($actions as $action_direction)
                                                @if($action_direction->visibilite == 1)
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
                                                                    
                                                                    
                                                                    <!--<td>
                                                                    <span class="text-success"><div class="chart" style="width:50px;" data-percent="{{$action_direction->pourcentage}}">{{$action_direction->pourcentage}}%</div></span>
                                                                    
                                                                        </td>-->
                                                                        
                                                                        
                                                                       
                                                                        <td>
                                                                     
                                                                    
                                                                         <div id="walabok">

                                                                                 
@if($action_direction->pourcentage == 100)
   <!-- Central Modal Small -->
   <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" >

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-sm" role="document">


        <div class="modal-content" >
                                        <center> <div class="flip-box-front">
                                            <img src="{{asset('images/illimitis/collobo.jpeg')}}" alt="Paris" style="width:150px;" disabled>
                                            </div> </center>
        <div class="modal-header" style="margin-top:20px;">
                   
            <h4 class="modal-title w-100" id="myModalLabel"><b style="font-size:12px;">Êtes-vous vraiment sûre de vouloire clôturer l'action?</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
      
                            <div id="selectDiv{{$action_direction->id}}">
                                <input type="hidden" id="suiviID{{$action_direction->id}}" value="{{$action_direction->id}}">
                                <div class="check">       

                                
                                 <center>   <input id="loginVisibilite{{$action_direction->id}}" type="radio" name="visibilite" value="2"><b style="font-size:15px; margin-left:10px; color:green;">Valider</b>
                                    <input id="loginnVisibilite{{$action_direction->id}}" type="radio" name="visibilite" value="0"><b style="font-size:15px; margin-left:10px; color:red">Refuser</b>
                                   </center>
                                </div>
                            </div>
                  
                   


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Valider</button>
        </div>
        </div>
    </div>
    </div>
<!-- Central Modal Small -->
                    <button type="submit" class="button">
            
                          <div id="myBtn" class="button" style="color:green;"><div class="flip-box">
                                        <div class="flip-box-inner">
                                            <div class="flip-box-front">
                                            <img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                            </div>
                                                <div class="flip-box-back">
                                                <p style="margin-left:-12px; font-size:11px;".>Executer</p>
                                                </div>
                                        </div>
                                    </div>
                    </button>
                          @else
                          <button type="submit" class="button" disabled>
                                        <div class="flip-box-inner" disabled>
                                            <div class="flip-box-front" disabled>
                                            <img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;" disabled>
                                            </div>
                                                <div class="flip-box-back" disabled>
                                                <p style="margin-left:-12px; font-size:11px;". disabled>Executer</p>
                                                </div>
                                        </div>
                                    </div>
                            </button>
                          @endif 
       
       </div>
        
                            
                        </div>
                                                              </td> 

                                           
                                          
                                      </tr>
                                      @endif
                                    @endforeach
                                                                       <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Prénom & Nom</label>
                                                                            <input type="text" style="border: solid 1px gray;" name="name" value="{{Auth::user()->prenom}} {{Auth::user()->nom}}" class="form-control" id="name" placeholder="Votre Prénom & Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                             
                                                                            <div class="form-group" hidden>    
                                                                            @foreach($superieur1s as $superieu1r)
                                                                             @foreach($superieurs as $superieur)
                                                                             @if($superieu1r->superieur_id == $superieur->id)
                                                                                <label style="color:black;">Votre Email</label>
                                                                            <input type="email" style="border: solid 1px gray;" class="form-control" value="{{$superieur->email}}" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                                                                            <div class="validation"></div>
                                                                            @endif
                                                                            @endforeach
                                                                            @endforeach
                                                                            </div>
                                                                          
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Subject</label>
                                                                            <input type="text" style="border: solid 1px gray;" class="form-control" name="subject" value="Action Clôturée" id="subject" placeholder="Votre Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Message</label>
                                                                            <input class="form-control" style="border: solid 1px gray;" name="message" rows="5" value="{{Auth::user()->prenom}} {{Auth::user()->nom}} vient de clôturer une action" data-rule="required" data-msg="Please write something for us" placeholder="Votre Message">
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                      </form>
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
            @endif
            @endif
            <hr>
            <footer>
                <p>&copy; Collaboratis</p>
            </footer>
        </div>
         <style>

                                            .flip-box {
                                            background-color: transparent;
                                            width: 25px;
                                            height: 25px;
                                            border: 1px solid #f1f1f1;
                                            perspective: 1000px;
                                            }

                                            .flip-box-inner {
                                            position: relative;
                                            width: 100%;
                                            height: 100%;
                                            text-align: center;
                                            transition: transform 0.8s;
                                            transform-style: preserve-3d;
                                            }

                                            .flip-box:hover .flip-box-inner {
                                            transform: rotateY(180deg);
                                            }

                                            .flip-box-front, .flip-box-back {
                                            position: absolute;
                                            width: 100%;
                                            height: 100%;
                                            -webkit-backface-visibility: hidden;
                                            backface-visibility: hidden;
                                            }

                                            .flip-box-front {
                                            
                                            color: black;
                                            }

                                            .flip-box-back {
                                            background-color: white;
                                            color: green;
                                            text-align: center;
                                            transform: rotateY(180deg);
                                            }
                                        </style> 
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){

@foreach($actions as $suivi)

$("#loginVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);  
}
});
}

});

$("#loginnVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginnVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',  
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);
}
});
}

});
@endforeach
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
$(document).ready(function(){

@foreach($actions as $suivi)

$("#loginVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);  
}
});
}

});

$("#loginnVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginnVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',  
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);
}
});
}

});
@endforeach
});
</script>

<script>
//document.getElementById("yes1").checked = true;
$(".yes1").prop("checked", true);
</script>
    </body>

</html>