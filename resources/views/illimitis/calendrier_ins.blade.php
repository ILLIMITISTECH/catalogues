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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{asset('illimitis/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('illimitis/css/swiper.css')}}" rel="stylesheet">
	<link href="{{asset('illimitis/css/magnific-popup.css')}}" rel="stylesheet">
	<!--<link href="{{asset('illimitis/css/styles.css')}}" rel="stylesheet">-->
	
	<!-- Favicon  -->
    <link rel="icon" href="{{asset('illimitis/images/favicon.png')}}">
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <div class="container" style="max-width : 50%; margin-right : auto; margin-top : 5%;">
    <div class="col-12 header">
                <h5 class="form-header" id="catalogue-section1-Title" style="color: black; font-family: Montserrat;">Inscription à la formation | {{$formation->libelle}} </h5>
                <hr syle="color : black;">
                <p>En remplissant ce bulletin, vous nous autorisez à utiliser vos données pour vous contacter au sujet de cette formation et des prochaines opportunités à venir, dans le respect de la règlementation en vigueur sur les données personnelles au Sénégal et au Burkina Faso</p>
                <p>Pour tout complément d'information, merci de nous contacter à l'adresse info@artdufocus.com ou en nous appelant au Sénégal au (221) 77 416 69 69 / (221) 76 438 09 48‬; et au Burkina Faso au (226) 75 30 30 75 ou (226) 53 36 33 33. </p>
                <hr syle="color : black;">
            </div>   

            <!-- Début de la première partie : Identité -->
            <form class="row g-3" action="{{route('inscription.formation')}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-12 header">
                        <h5 class="form-header-lil">Votre Identité </h5>

                    </div>   
            
                    <div class="col-md-6">                                                        
                        <label class="form-label" for="focusedInput">Prénom<b style="color:red;">*</b> :</label>
                        <div class="controls">
                            <input name="prenom" type="text" class="form-control" placeholder="Votre Prénom" required>
                                <input name="formation_id" type="hidden" value="{{$formation->id}}" class="form-control" placeholder="Votre Prénom">
                                <input name="session_id" type="hidden" value="{{$sessions->id}}" class="form-control" placeholder="Votre Prénom">
                        </div>                                                          
                    </div> 
                    <div class="col-md-6">                                                        
                        <label class="form-label" for="focusedInput">Nom<b style="color:red;">*</b> :</label>
                        <div class="controls">
                            <input name="nom" type="text" class="form-control" placeholder="Votre Nom" required>
                        </div>                                                          
                    </div>

                    <div class="col-md-6">                                                        
                        <label class="form-label" for="focusedInput">Entreprise</label>
                        <div class="controls">
                            <input name="entreprise" type="text" class="form-control" placeholder="Votre Entreprise">
                        </div>                                                          
                    </div> 
                    <div class="col-md-6">                                                        
                    <label class="form-label" for="focusedInput">Fonction</label>
                    <div class="controls">
                        <input name="fonction" type="text" class="form-control" placeholder="Fonction">
                    </div>                                                          
                    </div> 
                    <div class="col-12">                                                        
                        <label class="form-label" for="focusedInput">Email <b style="color:red;">*</b> : </label>
                        <div class="controls">
                            <input name="email" type="text" class="form-control" placeholder="email@********" required>
                        </div>                                                          
                    </div> 
                    <div class="col-md-6">                                                        
                        <label class="form-label" for="focusedInput">Mobile <b style="color:red;">*</b>:</label>
                        <div class="controls">
                            <input name="mobile" type="number" class="form-control" placeholder="Mobile" required>
                        </div>                                                          
                    </div> 
                    <div class="col-md-6">                                                        
                        <label class="form-label" for="focusedInput">Whatsapp | Mettre l'indicatif (00221xxxxxxxx)</label>
                        <div class="controls">
                            <input name="whatsapp" type="number" class="form-control" placeholder="Whatsapp">
                        </div>                                                          
                    </div>
                                
                    <div class="col-12">                                                        
                        <label class="form-label col-md-6" for="focusedInput">Pays de résidence <b style="color:red;">*</b></label>
                        <div class="controls">
                            <select name="pays_id" id="pays_id" required>
                                <option value="">Pays</option>
                                @foreach($pays as $pay)
                                <option value="{{$pay->id}}">{{$pay->nom_pay}}</option>
                                @endforeach
                            </select>
                        </div>                                                          
                    </div> 
        
    
          
            <!-- fin de la première partie : Identité -->

               <!-- Début de la deuxieme partie :Attentes-->
          
                    <div class="col-12 header">
                        <h5 class="form-header-lil">Vos Attentes </h5>
                        <p>Pour une réponse précise et pragmatique à vos besoins, nous avons besoin d'en savoir plus sur vos attentes les plus fortes en participant à la formation.</p>
                    </div>   
                    <div class="col-12">                                                        
                        <label class="form-label" for="focusedInput"><b style="color:red;">*</b>Attente 1</label>
                        <div class="controls">
                            <input name="attente_a" type="text" class="form-control" placeholder="Attente 1" required>
                        </div>                                                          
                    </div> 
                    <div class="col-12">                                                        
                        <label class="form-label" for="focusedInput">Attente 2</label>
                        <div class="controls">
                            <input name="attente_b" type="text" class="form-control" placeholder="Attente 2">
                        </div>                                                          
                    </div>
                    <div class="col-12">                                                        
                        <label class="form-label" for="focusedInput">Attente 3</label>
                        <div class="controls">
                            <input name="attente_c" type="text" class="form-control" placeholder="Attente 3">
                        </div>                                                          
                    </div> 
                                
           
            <!-- fin de la première partie : Identité -->

             <!-- Début de la4e partie partie :Attentes-->
            
                    <div class="control-group">                                                        
                        <label class="form-label" for="focusedInput">Comment réglez-vous cette formation ?</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="En espèces" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                            En espèces
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par chèque" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault2">
                            Par chèque
                            </label>
                        </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par virement bancaire" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault3">
                            Par virement bancaire
                            </label>
                        </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par mobile money" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault4">
                            Par mobile money
                            </label>
                        </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par Moneygram" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault5">
                            Par Moneygram
                            </label>
                        </div> <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par Western Union" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault6">
                            Par Western Union
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="Par PayPal" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault7">
                                Par PayPal
                            </label>
                        </div> 
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="regler" value="J'ai un(e) sponsor" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault8">
                                J'ai un(e) sponsor
                            </label>
                        </div> 
                        
                    </div> 
                    
                    <div class="control-group">                                                        
                        <label class="form-label" for="focusedInput">Qui paie cette formation ?</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="paie" value="Moi-même" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                            Moi-même
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paie" value="Mon entreprise" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Mon entreprise
                            </label>
                        </div> 
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paie" value="Mon sponsor" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Mon sponsor
                            </label>
                        </div> 
                    </div> 
                    
                    <div class="control-group">                                                        
                        <label class="form-label" for="focusedInput">Nom et coordonnées du sponsor ou de la personne en charge de votre inscription (si applicable)</label>
                        <div class="controls">
                            <input name="charge" type="text" class="form-control" placeholder="Votre réponse">
                        </div>                                                          
                    </div> 
                <!-- </div>   -->
               
       

            <!-- fin de la 4e partie : Identité -->
            <!-- Début de la4e partie partie :Attentes-->
          
                 <div class="control-group">                                                        
                    <label class="form-label" for="focusedInput">Comment avez vous été informé(e) de cette formation ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="informer" value="Recherche libre sur Internet" id="recherche_libre">
                        <label class="form-check-label" for="recherche_libre">
                                Recherche libre sur Internet
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="informer" value="Recommandation d'un(e) ami(e)" id="recommendation_ami" checked>
                        <label class="form-check-label" for="recommendation_ami">
                            Recommandation d'un(e) ami(e)
                        </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="Recommandation d'un(e) participant(e)" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Recommandation d'un(e) participant(e)
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="Par mailing" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Par mailing
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="J'ai déjà participé à la une de vos formations" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                J'ai déjà participé à la une de vos formations
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="Réseaux sociaux: Facebook" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Réseaux sociaux: Facebook
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="Réseaux sociaux: LinkedIn" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Réseaux sociaux: LinkedIn
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="informer" value="Réseaux sociaux: Autres" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Réseaux sociaux: Autres
                            </label>
                    </div>
                </div>
                    
                <div class="col-12">                                                        
                    <label class="form-label" for="focusedInput">Noms et prénoms de la personne qui vous a recommandé</label>
                    <div class="controls">
                        <input name="perso_recom" type="text" class="form-control" placeholder="Votre réponse">
                    </div>                                                          
                </div> 
                
                <div class="col-12">                                                        
                    <label class="form-label" for="focusedInput">Contact téléphonique de la personne qui vous a recommandé</label>
                    <div class="controls">
                        <input name="phone_recom" type="text" class="form-control" placeholder="Votre réponse">
                    </div>                                                          
                </div> 

                
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferm</button> -->
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>   
                                
            
            </form>
                                                                                                                           
            <!-- fin de la 4e partie : Identité -->
    </div>


    <style>

        body{
            background-color : #f8f8f8;
        }

        form {
            margin
            background-color : white;
            border : 0.5px solid black;
            border-radius : 12px;
            margin : 10%;
            padding :2% 2% 5% 2%;
        }

        .header {
            text-align : left;
        }

        .header p{
            /* font-family: Montserrat; */
            
            font-size : 12px;

            
        }

        .form-header-lil{
            font-family: Montserrat;
            font-size : 14px;

        }

        .form-label {
            /* color : black; */
            font-size : 12px;
            font-family: Montserrat;
        }
        .control-group
        {
            margin : 3% 0 3% 0;
        }
        placeholder{
            font-size : 10px;
            font-family: Montserrat;
        }
        
        .form-header{
            margin : 3%;
            boder-top : 5px solid red;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
       .form-header p  {
           color : black;
           font-size : 12px;
           
       }  
       .form-check-label{
          font-family: Montserrat;  
          font-size : 10px;
          color : black;
       }
       
       .form-header li {
           color : black;
           font-size : 12px;
           
       }
       
      .modal-title{
          
            color : black;
            font-size : 12px;
            font-family: Montserrat;
          
      }
    </style>
   
    



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