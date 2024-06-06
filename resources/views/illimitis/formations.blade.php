<!DOCTYPE html>
<html lang="en">
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
    <title>ILLIMITIS > Nos formations</title>
    
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
                            <a class="dropdown-item page-scroll" href="solutions.html">Toutes les solutions</a>
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
            <img src="{{asset('illimitis/images/formation02.jpg')}}" width="1100" height="400"></img>
            <br>
            <table> 
                <tr> <br>
                <td><h3>A ILLIMITIS nous ne formons pas, nous transformons !</h3>
                    <p>Nous sommes convaincus que pour changer le monde, nous devons nous changer nous-mêmes. Et le meilleur moyen de changer, c'est se former, et ouvrir son esprit à de nouvelles opportunités !
                    C'est pour cela que nous mettons l'accent sur le potentiel humain comme déterminant du succès et de l'impact. C'est pour cela que nous mettons
                        l'accent sur des cursus qui revèlent le potentiel de vos équipes, transforment votre organisation, et boostent votre performance ! Let's start. Now !</p> </td> 
                <td> <a class="btn-solid-reg popup-with-move-anim" href="#">Catalogue</a></td>
                </tr> 
            </table>
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

     <!-- Details 1 -->
     <div class="basic-2 bg-dark-blue" id="lma">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('illimitis/images/formation-leader.jpg')}}" alt="Leadership, management, art oratoire">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>LEADERSHIP, MANAGEMENT & ART ORATOIRE</h2>
                        <p align="justify">Boostez l’engagement de vos équipes en réveillant les leaders qui sommeillent en eux ; et en créant le 'bonheur au travail'. Améliorez leur productivité par le focus. Devenez d'excellents managers de projets et de la qualité ; et délivrez des discours et présentations d’impact, avec les règles d'or de l'impact oratoire. Enfin, bâtissez des équipes performantes avec nos team buildings et notre accompagnement dédié.</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#">Voir toutes les formations de cette catégorie</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->

    

    <!-- Details 2 -->
    <div class="basic-3 bg-dark-blue" id="tpo">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>TRANSFORMATION & PERFORMANCE ORGANISATIONNELLE</h2>
                        <p align="justify">La transformation organisationnelle de l’entreprise passe par sa transformation humaine. Il est de ce fait primordial de prendre en compte et d’anticiper les besoins en talents, d’aligner la culture d’entreprise aux valeurs fondamentales, de favoriser la cohésion et la collaboration tout en renforçant l’expérience « collaborateur » de la team RH.</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#">Voir toutes les formations de cette catégorie</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('illimitis/images/formation-tpo.png')}}" alt="Transformation et performance organisationnelle">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of details 2 -->


     <!-- Details 1 -->
     <div class="basic-2 bg-dark-blue" id="dei">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('illimitis/images/formation-dei.jpg')}}" alt="Digital, Entreprenariat et innovation">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>DIGITAL, ENTREPRENARIAT & INNOVATION</h2>
                        <p align="justify">Vous ne résoudrez pas les problèmes d’aujourd’hui avec les méthodes d’hier ! Adoptez le desigh thinking pour penser et innover autrement. Prenez en compte l’expérience utilisateur dans la conception de vos applications ; développez des applications web et mobiles innovantes ; et boostez la présence digitale de votre entreprise, avec des outils simples et efficaces. Enfin, facilitez la communication équipes informatiques/management à travers les référentiels internationaux de gouvernance et de gestion des systèmes d’information.</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#">Voir toutes les formations de cette catégorie</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->

    <!-- Basic -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">  
                    <br>
                    <h2 class="mb-4">3 raisons de nous choisir...</h2>
                    <p class="mb-5" align="justify">La formation et le coaching sont un investissement ! Nous sommes à vos côtés pour le meilleur retour sur investissement dans le capital humain, moteur de la performance et de l'impact. Nous maintenons et revendiquons notre tradition d'excellence, de qualité, et d'impact, attestées par la satisfaction de tous nos participants. Let's start. Now !  </p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->

    <!-- Cards -->
    <div class="ex-cards-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card-->
                    <div class="card">
                        <div class="price"><span class="value">#1</span></div>
                        <div class="card-body">
                            <div class="package">CONTENUS CERTIFIES</div>
                            <p>Tous nos contenus de formation sont certifiés par des organismes internationaux reconnus. </p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Coaching</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Formations</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Team Building</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#">En savoir plus</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="price"><span class="value">#2</span></div>
                        <div class="card-body">
                            <div class="package">SEE, lEARN, APPLY</div>
                            <p>Notre approche androgogique permet de capitaliser 80% des acquis au cours de la formation. </p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Etudes de cas</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Partipation active</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Vidéos et illustrations</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#">En savoir plus</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="price"><span class="value">#3</span></div>
                        <div class="card-body">
                            <div class="package">SUIVI RIGOUREUX</div>
                            <p>Bénéficiez d'un suivi post formation de 15 à 30 jours gratuit pour chaque formation</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Communauté active</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Partage de ressources</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Suivi individualisé possible</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#">En savoir plus</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-cards-4 -->
    <!-- end of cards -->


    <!-- Basic -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                      <p class="mb-5" align="justify">Nos experts sont avec vous, pour affiner vos besoins, les traduire en formation et coaching, et vous fournir un accompagnement à la hauteur de vos ambitions. Notre plateforme post formation met à votre disposition des ressources actualisées pour renforcer vos acquis, 24H/24. Let's start. Now ! </p>

                    <a class="btn-solid-reg mb-6" href="index.html">Télécharger le catalogue global</a> | 
                    <a class="btn-solid-reg mb-6" href="index.html">Télécharger le calendrier 2021</a> | 
                    <a class="btn-solid-reg mb-6" href="index.html">Parlez-nous de vos besoins</a> 
                    
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