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
                            <a href="/admin/dashboard"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>  
                        <li>
                            <a href="/agents"><i class="icon-chevron-right"></i> Agents</a>
                        </li>
                       <li> 
                          <button class="dropdown"><a href="#">Actions</a> 
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                             <ol class="afg"><a href="/actions"><i style="margin-right: 10px;" class="icon-chevron-right"></i>Voir toutes les actions</a></ol><hr>
                          </div>
                         </li> 
                        <li>
                            <a href="/suivi_actions"><i class="icon-chevron-right"></i> Suivi Actions</a>
                        </li>
                        <li>
                            <a href="/services"><i class="icon-chevron-right"></i> Services</a>
                        </li>
                        <li>
                            <a href="/directions"><i class="icon-chevron-right"></i> Directions</a>
                        </li>
                        <li>
                            <a href="/annonces"><i class="icon-chevron-right"></i>Annonces</a>
                        </li>
                        <li>
                            <a href="/roles"><i class="icon-chevron-right"></i> Roles</a>
                        </li>
                        <li>
                            <a href="/users"><i class="icon-chevron-right"></i> Utilisateurs</a>
                        </li>
        
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