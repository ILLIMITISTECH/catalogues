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


    <!-- Header
    <header class="ex-header bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('illimitis/images/Visuel cataloge.jpg')}}" class="img-responsive" style="max-width: 100%; margin-top : 12%;"></img>
                </div>
                <div class="col-md-6" style="margin-top: 5%;">
                
                       <h3>A ILLIMITIS nous ne formons pas, nous transformons !</h3>
                            <p>Nous sommes convaincus que pour changer le monde, nous devons nous changer nous-mêmes. Et le meilleur moyen de changer, c'est se former, et ouvrir son esprit à de nouvelles opportunités !
                            C'est pour cela que nous mettons l'accent sur le potentiel humain comme déterminant du succès et de l'impact. C'est pour cela que nous mettons
                                l'accent sur des cursus qui revèlent le potentiel de vos équipes, transforment votre organisation, et boostent votre performance ! Let's start. Now !</p> </td> 

                      <button type="button" class="btn btn-primary btn-solid-reg popup-with-move-anim" data-toggle="modal" data-target="#formulaire-global">Télécharger le catalogue Global </button>

                    <hr color="#FFFFF0">
                    <hr class="hr-heading">
                </div>
            </div>
        </div>  end of container 
    </header> end of ex-header -->
    <!-- end of header -->


<!-- Modal 1 losrqu'on veut télécharger le catalogue global  -->

  <!-- Modal -->
  <div class="modal fade" id="formulaire-global" tabindex="-1" role="dialog" aria-labelledby="formulaire-global-Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle">Télecharger le catalogue Global de nos formations</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Nom <b style="color: red;">*</b> : </label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Prénom <b style="color: red;">*</b> : </label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Prénom">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Adresse Email <b style="color: red;">*</b> : </label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Pays <b style="color: red;">*</b> :</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Pays">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Numéro WhatsApp : </label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Numéro de Téléphone">
                </div>
                
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="label-forms" for="gridCheck" class="label-forms">En cliquant sur télécharger, j’accepte d’être contacté au sujet des formations à venir de ILLIMITIS et de ses partenaires</label>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferm</button> -->
          <button type="button" class="btn btn-primary">Télécharger</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal 1 losrqu'on veut télécharger le catalogue global  -->



<!-- Modal 3 losrqu'on veut télécharger le catalogue 3 -->

  <!-- Modal -->
  <div class="modal fade" id="catalogue-section2" tabindex="-1" role="dialog" aria-labelledby="catalogue-section2Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="catalogue-section1-Title">CATALOGUE DE FORMATIONS </h6>
         

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <h8 style="color: black; font-family: Montserrat;">DIGITAL, ENTREPRENARIAT & INNOVATION</h8>

                <div class="form-row" style="margin-top: 2%;">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Nom <b style="color: red;">*</b> : </label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Prénom <b style="color: red;">*</b> : </label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Prénom">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Adresse Email <b style="color: red;">*</b> : </label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Pays <b style="color: red;">*</b> :</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Pays">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Numéro WhatsApp : </label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Numéro de Téléphone">
                </div>
                
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="label-forms" for="gridCheck" class="label-forms">En cliquant sur télécharger, j’accepte d’être contacté au sujet des formations à venir de ILLIMITIS et de ses partenaires</label>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferm</button> -->
          <button type="button" class="btn btn-primary">Télécharger</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal 2 losrqu'on veut télécharger le le catalogue 2   -->




                   <h6 style="margin-top: 150px;"> 
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                        </div>  
                        @endif
                    </h6>
    <!-- Details 2 -->
    @foreach($documents as $document)
    <div class="basic-3 bg-dark-blue" id="tpo">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top: -5%;">
                    <div class="text-container">
                        <h2>{{$document->name}}</h2>
                        <p align="justify">{{$document->description}}</p>
                        <a type="button" class="btn btn-primary btn-solid-reg" href="{{ route('document_cata.editer', $document->id) }}">Télécharger le catalogue</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{url('illimitis',$document->image)}}" alt="Transformation et performance organisationnelle">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    @endforeach

      <!-- Modal 2 losrqu'on veut télécharger le catalogue 2 -->

  <!-- Modal -->
  <div class="modal fade" id="catalogue-section1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="catalogue-section1-Title">CATALOGUE DE FORMATIONS </h6>
         

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <h8 style="color: black; font-family: Montserrat;">{{$document->name}}</h8>

                <div class="form-row" style="margin-top: 2%;">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Nom <b style="color: red;">*</b> : </label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="label-forms">Prénom <b style="color: red;">*</b> : </label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Prénom">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Adresse Email <b style="color: red;">*</b> : </label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Pays <b style="color: red;">*</b> :</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Pays">
                </div>
                <div class="form-group">
                    <label for="inputEmail4" class="label-forms">Numéro WhatsApp : </label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Numéro de Téléphone">
                </div>
                
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="label-forms" for="gridCheck" class="label-forms">En cliquant sur télécharger, j’accepte d’être contacté au sujet des formations à venir de ILLIMITIS et de ses partenaires</label>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferm</button> -->
          <button type="button" class="btn btn-primary">Télécharger</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal 2 losrqu'on veut télécharger le le catalogue 2   -->
    <!-- end of details 2 -->

     <!-- Details 1 
     <div class="basic-2 bg-dark-blue" id="dei">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('illimitis/images/OTB-2.jpeg')}}" alt="Digital, Entreprenariat et innovation">
                    </div> end of image-container
                </div>  end of col
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>DIGITAL, ENTREPRENARIAT & INNOVATION</h2>
                        <p align="justify">Vous ne résoudrez pas les problèmes d’aujourd’hui avec les méthodes d’hier ! Adoptez le desigh thinking pour penser et innover autrement. Prenez en compte l’expérience utilisateur dans la conception de vos applications ; développez des applications web et mobiles innovantes ; et boostez la présence digitale de votre entreprise, avec des outils simples et efficaces. Enfin, facilitez la communication équipes informatiques/management à travers les référentiels internationaux de gouvernance et de gestion des systèmes d’information.</p>
                        <button type="button" class="btn btn-primary btn-solid-reg popup-with-move-anim" data-toggle="modal" data-target="#catalogue-section2">Télécharger le catalogue</button>
                    </div>  end of text-container
                </div> end of col 
            </div>  end of row 
            <hr color="#FFFFF0">
            <hr class="hr-heading">
        </div> end of container 
    </div> end of basic-2 -->
    <!-- end of details 1 -->



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
</body>
</html>