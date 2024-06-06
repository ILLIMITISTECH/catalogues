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
            @include('v2.header_responsable')
            <!-- end header -->

        <div class="app-main">
                <!-- side bar -->
                @include('v2.side_bar_responsable')
    
                <!-- end side bar -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                       <!-- perfo -->
                       <div class="app-page-title">
                           
                           <div class="row">
                               <div class="col-md-6 col-lg-12">
                                   <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                                       <div class="widget-content">
                                           <div class="widget-content-outer">
                                               <div class="widget-content-wrapper">
                                                   @if($agents == " ")
                                                    No action
                                                    @else
                                                    @if($sum_suivi_actions == " ")
                                                    No action
                                                    @else
                                                  @if(intval($sum_suivi_actions/count($agents)) > 70)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-success">{{intval($sum_suivi_actions/count($agents))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($agents))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($sum_suivi_actions/count($agents))}}%;"></div>
                                                       </div>
                                                   </div>
                                                   @elseif(intval($sum_suivi_actions/count($agents)) >= 50 && intval($sum_suivi_actions/count($agents)) <= 70)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-warning">{{intval($sum_suivi_actions/count($agents))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($agents))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($sum_suivi_actions/count($agents))}}%;"></div>
                                                       </div>
                                                   </div>
                                                    @elseif(intval($sum_suivi_actions/count($agents)) < 50)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-danger">{{intval($sum_suivi_actions/count($agents))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($agents))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($sum_suivi_actions/count($agents))}}%;"></div>
                                                       </div>
                                                   </div>
                                                   @endif
                                                   @endif
                                                   @endif
                                               </div>
                                               <div class="widget-content-left fsize-1">
                                                   <div class="text-muted opacity-6">{{$agent->prenom}} {{$agent->nom}}</div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                            </div>
                           
                        </div>             

                                

                       <!-- end perfo --> 
                        
                        
                        <!-- perfo de mes direc -->
                       

                         <!-- end perfo de mes direct -->
                        
                        <!-- section -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Les actions pour lesquelles {{$agent->prenom}} {{$agent->nom}} est responsable
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>  
                                            <tr>
                                                <th class="">Libellé</th>
                                                <th>Backup</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">MAJ :</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_respons as $action)  
                                            @if($action->raison == "")
                                            <tr>
                                            <form action="/save_action" method="post" id="target">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                <td class="">{{$action->libelle}}</td>
                                                @foreach($my_agents as $age)
                                                @foreach($my_agentes as $agen)
                                                @if($action->bakup == $age->full_name && $agen->id == $age->id)
                                                
                                                @if($action->niveau_hieracie =='Directeur')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                                
                                                
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>

                                                <!-- Pourcentage des actions -->
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 4px 4px 10px #49a797;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :{{$action->note}}"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 3px 3px 8px #f49731;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50 && $action->pourcentage >= 20)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td> 
                                                 @elseif($action->pourcentage < 20 && $action->pourcentage >= 10 )
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;color:white;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td>                                                
                                                @elseif($action->pourcentage < 10)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-default" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;color:black; font-weight:bold; box-shadow: 4px 3px 6px #f7f7f7;background:white;">{{$action->pourcentage}}%</div></td>
                                                @endif
                                                
                                                <!-- Derniere MAJ -->
                                                @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 0)
                                                  @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) > 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/3600)}} heures</td>
                                                  @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) == 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/60)}} minutes</td>
                                                  @endif
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 1)
                                                <td class="text-center">Hier à {{strftime("%H:%M", strtotime($action->updated_at))}}</td>
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) >= 2 && intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) <= 27)
                                                <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400)}} jours </td>
                                                @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) > 27)
                                                <td class="text-center">Le {{strftime("%d/%m/%Y", strtotime($action->updated_at))}}</td>
                                                @endif
                                            </form>
                                            </tr>
                                           @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>


                        

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Les actions pour lesquelles {{$agent->prenom}} {{$agent->nom}} est Backup
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libellé</th>
                                                <th class="text-center">Responsable</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">MAJ :</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_bakups as $action)
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                @if($action->niveau_hieracie =='Directeur')
                                                   <td class="text-center" data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                    <td class="text-center" data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                    <td class="text-center" data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                    <td class="text-center" data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @endif
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                
                                               <!-- Pourcentage des actions -->
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 4px 4px 10px #49a797;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :{{$action->note}}"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 3px 3px 8px #f49731;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50 && $action->pourcentage >= 20)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td> 
                                                 @elseif($action->pourcentage < 20 && $action->pourcentage >= 10 )
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;color:white;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td>                                                
                                                @elseif($action->pourcentage < 10)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-default" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;color:black; font-weight:bold; box-shadow: 4px 3px 6px #f7f7f7;background:white;">{{$action->pourcentage}}%</div></td>
                                                @endif
                                                
                                                <!-- Derniere MAJ -->
                                                @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 0)
                                                  @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) > 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/3600)}} heures</td>
                                                  @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) == 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/60)}} minutes</td>
                                                  @endif
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 1)
                                                <td class="text-center">Hier à {{strftime("%H:%M", strtotime($action->updated_at))}}</td>
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) >= 2 && intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) <= 27)
                                                <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400)}} jours </td>
                                                @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) > 27)
                                                <td class="text-center">Le {{strftime("%d/%m/%Y", strtotime($action->updated_at))}}</td>
                                                @endif
                                            
                                            </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
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

<style>

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
margin-left: 90px;
margin-top: 150px;
width: 250px; /* Full width */
height: 80px; /* Full height */


}

/* Modal Content */
.modal-content {
background-color: #fefefe;
margin: auto;
padding: 20px;
border: 1px solid #888;
width: 100%;
height: 100%;
}

/* The Close Button */
.close {
color: #aaaaaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: #000;
text-decoration: none;
cursor: pointer;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){

@foreach($action_respons as $suivi)

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

@foreach($action_bakups as $suivi)

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
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>
 
                        <!-- end section -->

                            <div class="app-wrapper-footer">
                                <div class="app-footer">
                                    <div class="app-footer__inner">
                                        <div class="app-footer-left">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        © Collaboratis 2020
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

</body>
</html>
