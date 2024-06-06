<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Leno is a mobile app landing page template made with HTML and Bootstrap to help you present mobile apps to the online audience and convince visitors to download from the app stores">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Webpage Title -->
    <title>ILLIMITIS >Innovation  </title>
    
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
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Leno</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img style="width: 250px; height: 46px;" src="{{asset('illimitis/images/logo.png')}}" alt="logo ILLIMITIS"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">A propos</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="aboutus.html#adn">ADN et valeurs</a>
                            <a class="dropdown-item page-scroll" href="aboutus.html#team">La dream team</a>
                            <a class="dropdown-item page-scroll" href="aboutus.html#clients">Témoignagnes clients</a>
                         </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Solutions</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="solutions.html#mobisante">I-santé</a>
                            <a class="dropdown-item page-scroll" href="solutions.html#mobiagri">I-agriculture</a>
                            <a class="dropdown-item page-scroll" href="solutions.html#digiboost">I-marketing</a>
                            <a class="dropdown-item page-scroll" href="solutions.html#optimarket">I-commerce</a>
                            <a class="dropdown-item page-scroll" href="solutions.html#collaboratis">I-collaboration</a>
                            <a class="dropdown-item page-scroll" href="solutions.html#optievent">I-évenementiel</a>
                        </div>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/">Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/catalogues">Catalogues</a>
                    </li>
                    <li class="nav-item dropdown">
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/connexion">Connexion</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="https://web.facebook.com/illimitis" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://www.linkedin.com/company/illimitis/"target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-linkedin fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://www.twitter.com/illimitis"target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#"target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-youtube fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header class="ex-header bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Features Details</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 bg-dark-blue pb-4" style="margin-top: -10%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-fluid mb-6" src="{{asset('illimitis/web/images/innovation-header.png')}}" alt="alternative">
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 bg-dark-blue" style="margin-top: -10%;"> 
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="text-box mt-5 mb-6">
                        <h3>Nous sommes dans l'accompagnement de Startups Disruptives à fort impact !</h3>
                        <p>Notre immagination est notre seule limite pour vous appuyer à travers le mentorat, la mise en relation et des séances de travail sur vos différentes problématiques.<br>
                        Nous donnons de notre temps aux rêveurs et entrepreneurs qui créent des solutions tangibles aux problèmes uregents de leur continent et du monde entier.</p>
                    </div> <!-- end of text-box -->

                    <div class="row" style="margin-bottom: 10%;">
                        <div class="col-md-4 innov-icon-box">
                            <img  class="innov-icon" src="{{asset('illimitis/images/mentorship.png')}}" alt="Mnetorat">
                            <h4 class="innov-icon-title">Mentorat</h4>
                            <p class="innov-icon-description">
                                Nous organisons des séances de mentorat avec des experts de votre domaine d'activité.
                            </p>
                        </div>
                        <div class="col-md-4 innov-icon-box">
                            <img  class="innov-icon" src="{{asset('illimitis/images/mise-en-relation.png')}}" alt="mise en relation">
                            <h4 class="innov-icon-title">Mise en relation</h4>
                            <p class="innov-icon-description">
                               Nous vous mettons en relation avec des talents, des investisseurs, ou des structures d'accompagnement.
                            </p>
                        </div>
                        <div class="col-md-4 innov-icon-box">
                            <img  class="innov-icon" src="{{asset('illimitis/images/workshops.png')}}" alt="workshops">
                            <h4 class="innov-icon-title">Ateliers/Workshops</h4>
                            <p class="innov-icon-description">
                                Nous mettons en place des ateliers taillés sur mesure pour vous aider dans vos problématiques.
                            </p>
                           
                        </div>
                    </div>

                
                    <h3 style="text-align: center;">Ils nous font confiance !</h3>

                    <ul class="list-unstyled list-icon-lg mb-6" style="margin-top: 20%;">

                        <li class="media">
                            <div class="list-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            
                            <div class="media-body">
                                <h3 class="list-item-title">Institut du succès !</h3>
                                <h4 class="slogan"> Slogan : Devenez le succès que vous êtes ! </h4>
                                <p class="list-item-text">Nous mettons en place un institut pour dédié au succès. Il s'agit de parcours et de formations sur le succès individuel et collectif.</p>
                                <!-- <p class="list-item-text">Startup gagnante de <span class="special-word"> Burkina Startup 2020</span> </p> -->
                                <a class="btn-solid-reg mb-6" href="#">En savoir plus</a>
                            </div>
                           
                        </li>

                        <li class="media">
                            <div class="list-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="list-item-title">JALÔ</h3>
                                <h4 class="slogan"> Slogan : Nous sauvegardons le commerce de proximité en Afrique</h4>
                                <p class="list-item-text"> Plateforme de distribution digitale qui combine : une <span class="special-word">marketplace</span> et de <span class="special-word">l'assistance aux boutiquiers de quartiers.</span></p>
                                <p class="list-item-text">Startup reconnue comme une des<span class="special-word"> 4 Startups du Sénégal en 2017 par Orange Fab</span> </p>
                                <a class="btn-solid-reg mb-6" href="wwww.jalomarket.com">En savoir plus</a>

                            </div>
                        </li>
                        <li class="media">
                            <div class="list-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="list-item-title">Move Skills</h3>
                                <h4 class="slogan"> Slogan :Nous sommes le one stop shop de la formation en ligne sur les soft Skills </h4>
                                <p class="list-item-text">Nous créons une marketplace Africaine pour les formations en Soft Skills par des Coachs certifiés.</p>
                                <p class="list-item-text">Startup gagnante de <span class="special-word"> Burkina Startup 2020</span> </p>
                                <a class="btn-solid-reg mb-6" href="#">En savoir plus</a>
                            </div>
                           
                        </li>
                        <li class="media">
                            <div class="list-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="list-item-title">TÔLGO</h3>
                                <h4 class="slogan">Nous démocratisons l'accès aux services en ligne en Afrique</h4>
                                <p class="list-item-text">Tôlgo permet aux personnes n'ayant pas de comptes bancaires ou de cartes prépayées de payer en ligne à partir de leur compte Mobile Money.</p>
                                <p class="list-item-text">Membre de la cohort de 2020 du <span class="special-word"> Founder Institue (Silicon Valley)</span> </p>
                                <a class="btn-solid-reg mb-6" href="https://www.tolgo-app.com">En savoir plus</a>
                              
                            </div>
                        </li>

                    </ul> <!-- end of list-unstyled -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->




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
    <script src="{{asset('illimitis/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('illimitis/js/morphext.min.js')}}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{asset('illimitis/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('illimitis/js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>