<!DOCTYPE html>
<html lang="en" class="bg-dark-blue">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <!-- SEO Meta Tags -->   
     <meta name="description" content="Notre imagination n'a pas de limites pour la performance des entreprises et des individus : solutions, formation, innovation ; pour votre impact ! ">
     <meta name="author" content="ILLIMITIS">
 
     <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
     <meta property="og:site_name" content="illimitis.com" /> <!-- website name -->
     <meta property="og:site" content="www.illimitis.com" /> <!-- website link -->
     <meta property="og:title" content="ILLIMITIS"/> <!-- title shown in the actual shared post -->
     <meta property="og:description" content="Notre imagination est notre seule limite" /> <!-- description shown in the actual shared post -->
     <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
     <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
     <meta property="og:type" content="article" />
 
    <!-- Webpage Title -->
    <title>ILLIMITIS >Notre Catalogue de formations</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="{{asset('illimitis/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('illimitis/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('illimitis/css/swiper.css')}}" rel="stylesheet">
	<link href="{{asset('illimitis/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('illimitis/css/styles.css')}}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{asset('illimitis/images/favicon.png')}}">
</head>
<body data-spy="scroll" data-target=".fixed-top" class="bg-dark-blue">
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Leno</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="http://illimitis.com/index.html"><img style="width: 250px; height: 46px;" src="{{asset('illimitis/images/logo.png')}}" alt="logo ILLIMITIS"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">-->
            <!--    <ul class="navbar-nav ml-auto">-->
            <!--        <li class="nav-item">-->
            <!--            <a class="nav-link page-scroll" href="/">Calendrier</a>-->
            <!--        </li>-->
            <!--        <li class="nav-item">-->
            <!--            <a class="nav-link page-scroll" href="/catalogues">Catalogues</a>-->
            <!--        </li>-->
                     <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/formation" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formations</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="formation.html#lma">Leadership, Management & Art Oratoire</a>
                            <a class="dropdown-item page-scroll" href="formation.html#tpo">Transformation & Performance Organisationnelle</a>
                            <a class="dropdown-item page-scroll" href="formation.html#dei">Digital, Entreprenariat & Innovation</a>
                            <a class="dropdown-item page-scroll" href="formation.html">Voir toutes les formations</a>
                            <a class="dropdown-item page-scroll" href="calendrier.html">Calendrier et inscriptions</a>
                       </div>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/innovations">Innovation</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/contacti">Contact</a>
                    </li>-->
                <!--    <li class="nav-item">-->
                <!--        <a class="nav-link page-scroll" href="/connexion">Connexion</a>-->
                <!--    </li>-->
                <!--</ul>-->
                <!--<span class="nav-item social-icons">-->
                <!--    <span class="fa-stack">-->
                <!--        <a href="https://web.facebook.com/illimitis" target="_blank">-->
                <!--            <i class="fas fa-circle fa-stack-2x"></i>-->
                <!--            <i class="fab fa-facebook-f fa-stack-1x"></i>-->
                <!--        </a>-->
                <!--    </span>-->
                <!--    <span class="fa-stack">-->
                <!--        <a href="https://www.linkedin.com/company/illimitis/"target="_blank">-->
                <!--            <i class="fas fa-circle fa-stack-2x"></i>-->
                <!--            <i class="fab fa-linkedin fa-stack-1x"></i>-->
                <!--        </a>-->
                <!--    </span>-->
                <!--    <span class="fa-stack">-->
                <!--        <a href="https://www.twitter.com/illimitis"target="_blank">-->
                <!--            <i class="fas fa-circle fa-stack-2x"></i>-->
                <!--            <i class="fab fa-twitter fa-stack-1x"></i>-->
                <!--        </a>-->
                <!--    </span>-->
                <!--    <span class="fa-stack">-->
                <!--        <a href="#"target="_blank">-->
                <!--            <i class="fas fa-circle fa-stack-2x"></i>-->
                <!--            <i class="fab fa-youtube fa-stack-1x"></i>-->
                <!--        </a>-->
                <!--    </span>-->
                <!--</span>-->
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
    
                 
  
          

    <div class="modal-dialog" role="document">
      <div class="modal-content" style="margin-top: 150px;">

        <div class="modal-header">
          
        </div>
        <div class="modal-body">
                @if (session('message'))
              <div class="container" style="text-align : center ; margin : 10% auto 5% auto;">
                    <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                    </div>
              </div>
            @endif
            
            

            ---------------------
 
             <center>   
             <a class="button" type="button" href="http://training.illimitis.com" id="valid" class="btn btn-primary" onClick="window.location.reload();" style="color:black">Retour à la page Catalogues !</a>
            </center>
         
        </div>
          
        
      </div>
    </div>
<!-- Modal 2 losrqu'on veut télécharger le le catalogue 2   -->
    <!-- end of details 2 -->

   <!-- Footer -->
   <div class="footer bg-dark-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-col first">
                    <h6>A propos de ILLIMITIS</h6>
                    <p class="p-small">Notre imagination n'a pas de limites pour booster, chaque jour, la performance des entreprises et des individus en Afrique. Nous sommes ensemble, et le meilleur est à venir !</p>
                </div> <!-- end of footer-col -->
                <!---->
                <div class="footer-col second">
                    <h6>Let's talk. Now !</h6>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li>Dakar (Sénégal) | (221) 77 416 69 69 </li>
                        <li>Ouagadougou (Burkina Faso) | (226) 75 30 30 75</li>
                        <li>Abidjan (Côte d'Ivoire) | (225) 01 41 18 05 05 </li>
                    </ul>
                </div> <!-- end of footer-col -->
                <div class="footer-col third">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/illimitis" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://www.twitter.com/illimitis" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://www.linkedin.com/company/illimitis/" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-linkedin fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#"target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-youtube fa-stack-1x"></i>
                        </a>
                    </span>
                   <!----
                    <span class="fa-stack">
                        <a href="https://www.instagram.com/illimitis" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x"></i>
                        </a>
                    -->
                    </span>
                    <p class="p-small">Let's start. Now ! <a href="mailto:info@illimitis.com"><strong>info@illimitis.com</strong></a></p>
                </div> <!-- end of footer-col -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->  
<!-- end of footer -->


    <!-- Scripts -->
    <script src="{{asset('illimitis/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('illimitis/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{asset('illimitis/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('illimitis/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('illimitis/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for Télécharger le cataloguees -->
    <script src="{{asset('illimitis/js/morphext.min.js')}}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{asset('illimitis/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('illimitis/js/scripts.js')}}"></script> <!-- Custom scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


 <script> 
 $("#down").hides();
 $("#valid").click(function()
 {
    $("#down").show();

 });

        
</script>

</body>
</html>