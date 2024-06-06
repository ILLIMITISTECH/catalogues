<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* Fixed sidenav, full height */


/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  font-size: 14px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  
}

/* On mouse-over */
.sidenav a:hover, .dropdown:hover {
  color: #f1f1f1;
}



/* Add an active class to the active dropdown button */
.active {
  background-color: white;
  color: black;
  
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #f1f1f1;
  padding-left: 8px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
font-size: 14px;
line-height: 20px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 10px;
padding-top: 10px;

}
.afg {
    height: 1px;
 
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
 
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="/admin/dashboard/rapporteur"><i class="icon-chevron-right"></i> Accueil</a>
                        </li>
                        <!--<li>
                        <a href="/reunions"><i class="icon-chevron-right"></i>Toutes les reunions</a>
                        </li>-->
                        <li> 
                          <button class="dropdown"><a href="#">Reunions</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/reunions"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Voir toutes les reunions</a></ol><hr>
                            
                            
                          </div>
                         </li> 
                        <li> 
                          <button class="dropdown"><a href="#">Annonces</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/user_annonce_r"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Voir toutes les annonces</a></ol><hr>
                           
                          </div>
                         </li> 
                        <li> 
                          <button class="dropdown"><a href="#">Actions</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/user_action_r"><i style="margin-right: 10px;" class="icon-chevron-right"></i> Mes actions</a></ol><hr>
                            <ol class="afg"><a href="/user_actionA_r"><i style="margin-right: 10px;" class="icon-chevron-right"></i> Actions de ma direction</a></ol><hr>
                            <ol class="afg"><a href="/rapporteur_actionAcloture"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Actions clotur®¶es</a></ol><hr>
                          </div>
                         </li> 
                         
                         <li> 
                          <button class="dropdown"><a href="#">Assigner des actions</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/ajout_action_asigneresponR"><i style="margin-right: 10px;" class="icon-chevron-right"></i>A des responsables</a></ol><hr>
                             <ol class="afg"><a href="/ajout_action_asigneR"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Assigner une action</a></ol><hr>
                            <ol ><a href="/ajout_action_rap_moi"><i style="margin-right: 10px;" class="icon-chevron-right"></i>J'assigne une action pour moi</a></ol>
                          </div>
                         </li> 
                        <!--<li>
                            <a href="/user_action_r"><i class="icon-chevron-right"></i> Mes actions</a>
                        </li>
                        <li>
                            <a href="/user_actionA_r"><i class="icon-chevron-right"></i> Actions de ma direction</a>
                        </li>
                        <li>
                            <a href="/actions"><i class="icon-chevron-right"></i>Toutes les actions</a>
                        </li>
                         <li>
                            <a href="/rapporteur_actionAcloture"><i class="icon-chevron-right"></i>Les taches cl√¥tur√©es de ma direction</a>
                        </li> 
                        
                        <li>
                            <a href="/user_annonce_r"><i class="icon-chevron-right"></i>Voir toutes les annonces</a>
                        </li>-->
                        
                         <li> 
                          <button class="dropdown"><a href="#">Decisions</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/decissions"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Voir toutes les decisions</a></ol><hr>
                            
                            
                          </div>
                         </li> 
                          <li> 
                          <button class="dropdown"><a href="#">Indicateurs</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="/indicateurs"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Voir tous les indicateurs</a></ol><hr>
                            
                            
                          </div>
                         </li> 
                         <li> 
                          <button class="dropdown"><a href="#">Param®®tres (mon profil)</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <ol class="afg"><a href="#"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Param®®tres (mon profil)</a></ol><hr>
                            
                            
                          </div>
                         </li> 
                       
                        <!--<li>
                            <a href="/decissions"><i class="icon-chevron-right"></i>Voir toutes les decisions</a>
                        </li>
                        <li>
                            <a href="/indicateurs"><i class="icon-chevron-right"></i>Tous les indicateurs</a>
                        </li>-->
                        
                       
                       <!-- <li>
                            <a href="/ajout_action_asigneR"><i class="icon-chevron-right"></i>Assigner une action</a>
                        </li>
                        
                         <li>
                            <a href="/ajout_action_asigneresponR"><i class="icon-chevron-right"></i>Assigner une acion pour les autres responsables</a>
                        </li>
                         <li>
                            <a href="/ajout_action_rap_moi"><i class="icon-chevron-right"></i>J'assigne une action pour moi</a>
                        </li> -->
                       
        
                    </ul>
                </div>
                <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>