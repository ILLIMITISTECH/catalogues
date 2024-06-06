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
                                               <form action="/search" method="get" style="margin-top:5px;">
                                                    <select name="search" style="width:730px;" required>
                                                        <option value="" disabled selected>Rechercher par Direction</option>
                                                        @foreach($directions as $direction)
                                                        <option value="{{$direction->nom_direction}}">{{$direction->nom_direction}}</option>
                                                        @endforeach
                                                    </select>
                                                        <button class="btn btn-success" style="color:green;" type="submit">Filtrer</button>
                                        
                                                    </form>     
                                               </div>
                                               <div class="widget-content-left fsize-1">
                                                   <div class="text-muted opacity-6"></div>
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
                                <h5> @if (session('messageResponsable'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('messageResponsable') }}
                                                </div>  
                                            @endif</h5>
                                    <div class="card-header">Les actions de ma direction
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                                <th>Responsable</th>
                                                <th>Back-up</th>  
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                               
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">MAJ :</th>
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($actions as $action)
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                <td class="text-center">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</td>
                                                <td class="text-center">{{substr($action->bakup, 0, 3)}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 70)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>                                                
                                                @endif   
                                                <td class="text-center">{{$action->note}}</td>
                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                               <td>
                                                <form action="{{ route('actions.destroy',$action->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('actions.edit',$action->id) }}">Modifier</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </td>
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
