<div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Les Indicateurs
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>   
                                                <th>Cible</th>
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">Date Cible</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suivi_indicateurs as $suivi)  
                                            
                                            <tr>
                                            <form action="/save_action" method="post" id="target">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                <td class="">{{$suivi->libelle}}</td>
                                                <td class="text-center">{{$suivi->cible}}</td>
                                                @if($suivi->pourcentage == 100)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>
                                                @elseif($suivi->pourcentage <= 99)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>
                                                @elseif($suivi->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>                                                
                                                @endif
                                                <td class="text-center">{{$suivi->date_cible}}</td>
                                                
                                            </form>
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


                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Projets
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Projets</th>
                                               <!--  <th>Backup</th> -->
                                                <th class="text-center">Suivi</th>
                                                <th class="text-center">Assignés à</th>
                                                <th class="text-center">Deadline</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suivi_actions as $suivi)
                                            <tr>
                                                <td class="">{{$suivi->libelle}}</td>

                                                @if($suivi->pourcentage == 100)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>
                                                @elseif($suivi->pourcentage <= 99)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>
                                                @elseif($suivi->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$suivi->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$suivi->pourcentage}}%;">{{$suivi->pourcentage}}%</div></td>                                                
                                                @endif                                                
                                                <td class="">{{$suivi->prenom}} {{$suivi->nom}}</td>
                                                <td class="">{{$suivi->date}}</td>
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