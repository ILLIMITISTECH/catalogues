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
            @include('v2.header_dg')
            <!-- end header -->

        <div class="app-main">
                <!-- side bar -->
                @include('v2.side_bar_dg')
    
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
                                                   <h5><a href="/ajout_annonce" class="btn btn-light btn-lg" style="text-decoration:none;padding: 10px 20px; background:white; border:none; border-radius:5px; box-shadow: 3px 3px 8px #e1a5a7; font-size: 1.0em; color: black;">Publier une annonce <i class="fa fa-newspaper"></i></a></h5>
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
                        
                           @if(session('message'))
                            @if(session('message') == "D")
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong> L'annonce a été supprimé .</strong>
                            </div>  
                            @elseif(session('message') != "D")
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ session('message')}}</strong>
                            </div> 
                            @endif
                            @endif
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header"style="font-size:17px;"><marquee>Les annonces en cours ...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</marquee></div>
                                <div class="main-card mb-3 card">
                               
                                   
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>  
                                            <th>Publiée le</th>
                                            <th class="text-left">Annonce</th>
                                            <th class="text-left">Options</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($annonces as $annonce)
                                            <tr>
                                                
                                                <td class="text-left">{{strftime("%d/%m/%Y", strtotime($annonce->created_at))}}</td>
                                                <td class="text-left" width="75%">{{$annonce->titre}} </td>
                                                <td>
                                                      <form action="{{ route('dg_annonce.destroy',$annonce->id) }}" method="POST">
                                                          @if(count($annonces) == 1)
                                                            <a title="Modifier" class="btn btn-success" href="{{ route('dg_annonce.editer',$annonce->id) }}" style="padding: 5px 20px; background: #f4b234; border:none; margin-right:15px;"><i class="fas fa-pencil-alt" style="font-size: 16px;  color:black;"></i></a>
    
                                                            @elseif(count($annonces) > 1)
                                                            <a data-toggle="tooltip" title="Modifier" class="btn btn-success" href="{{ route('dg_annonce.editer',$annonce->id) }}" style="padding: 5px 20px; background: #f4b234; border:none; margin-right:15px;"><i class="fas fa-pencil-alt" style="font-size: 16px;  color:black;"></i></a>
                                                            @endif
                                                            
                                                           @if(count($annonces) == 1)
                                                            @csrf
                                                            @method('DELETE')
                                                            <button title="Supprimer" type="submit" class="btn btn-danger" style="padding: 5px 20px; background:#d33d2e; border:none; margin-right:15px;"><i class="fas fa-trash" style="font-size: 15px; color:black;"></i></button>
                                                           @elseif(count($annonces) > 1)
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-toggle="tooltip" title="Supprimer" type="submit" class="btn btn-danger" style="padding: 5px 20px; background:#d33d2e; border:none; margin-right:15px;"><i class="fas fa-trash" style="font-size: 15px; color:black;"></i></button>
                                                           @endif 
                                                           
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


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
