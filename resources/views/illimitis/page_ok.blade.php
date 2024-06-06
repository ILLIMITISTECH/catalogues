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
    <title>Catalogue de formation >ILLIMITIS</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="{{asset('illimitis/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('illimitis/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('illimitis/css/swiper.css')}}" rel="stylesheet">
	<link href="{{asset('illimitis/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('illimitis/css/styles.css')}}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{asset('catalogue/logo.png')}}">
</head>

<style>
    
    body
    {
      background-image : url("{{asset('catalogue/pexels-dzenina-lukac-754262.jpg')}}");
      background-repeat :no-repeat;
      height : 100%;
      background-position : center;
      background-size : cover;
    }
   
</style>
<body data-spy="scroll" data-target=".fixed-top" >
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background:#000000;">
        <div class="container">
            
            <a class="" href="https://catalogue.illimitis.com/"><img style="width: 250px; height: 46px;" src="https://plateforme-illimitis.collaboratis.com/illimitis/images/logo.png" alt="logo ILLIMITIS"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

        
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
    
                 
  <br>
  <br>
  <br>
  <br>
</div>
    <center>  
      <div class="card" style="margin-top: 50px; width:500px;">

        <div class="card-body">
             
                @if (session('message'))
              <div class="container" style="text-align : center ; margin : 10% auto 5% auto;">
                    <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                    <br><hr>
                     @if (session('messages'))
                      
                            {{ session('messages') }}
                            
                @endif
                 <br><hr> 
                 <center> <b> Bonne et heureuse année 2023 </b>    </center>  
                  </div>
            </div>
                @endif
                    
                    @php $document = DB::table('documents')->select('documents.id','documents.filename','documents.name')
                            ->where('documents.id', 1)
                            ->first();
            $doc = $document->filename; @endphp

                <button type="submit" class="formbold-btn" style="background:#000000" target="_blank" download>
                    <a class="fa fa-download" style="color:white; background:#000000;" href="https://catalogue.illimitis.com/illimitis/{{$doc}}" target="_blank" download>
                    Cliquer ici pour télécharger le catalogue
                   
    </a>
                    </button>
               <br>  
               <br>  
            <center>  
                <div class="footer-col thirds">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/illimitis" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <!--<span class="fa-stack">-->
                    <!--    <a href="https://www.twitter.com/illimitis" target="_blank">-->
                    <!--        <i class="fas fa-circle fa-stack-2x"></i>-->
                    <!--        <i class="fab fa-twitter fa-stack-1x"></i>-->
                    <!--    </a>-->
                    <!--</span>-->
                    <span class="fa-stack">
                        <a href="https://www.linkedin.com/company/illimitis/" target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-linkedin fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://www.youtube.com/@illimitis3678"target="_blank">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-youtube fa-stack-1x"></i>
                        </a>
                    </span>
                  
                    <!--<p class="">Let's start. Now ! <a href="mailto:info@illimitis.com"><strong style="color:black">info@illimitis.com</strong></a></p>-->
                </div>
                 </center>  
             <center>   
            <p class=""><a class="button" type="button" href="https://www.illimitis.com/" style="color:black" target="_blank">Visitez notre site</a></p>
            </center>
         
        </div>
   
    </div>
    
    </center>
<!-- Modal 2 losrqu'on veut télécharger le le catalogue 2   -->
    <!-- end of details 2 -->

  

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