<html lang="fr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>ILLIMITIS</title>
    <!-- CSS files -->
    <link href="{{asset('table/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/demo.min.css')}}" rel="stylesheet"/>
         <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body class="antialiased">
    <div class="page">
    <!-- side bar-->
    @include('illimitis.sidebar')
     <!-- side bar-->
      <div class="content">
           <!--============= Début du Header ============-->
           
           @include('illimitis.header')
           
           <!--============= Fin du Header ============-->
          
        <div class="container-xl" style="margin-top:50px;">
          <!-- Page title -->         
          <div class="row row-deck row-cards">          
            <div class="col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">session</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/sessions">Liste des sessions</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Formation</th>
                        <th>Libelle</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                        <th>Public Cible</th>
                        <th>Prix</th>
                        <th>Durée</th>
                                             
                      </tr>
                    </thead>   
                    <tbody>  
                                
                            <tr>   
                                <td>
                                <div class="student-img">
                                    <img src="{{url('illimitis',$sessions->image)}}" style="height:200px;" alt="" />
                                </div>
                                </td>    
                                <td>{{$sessions->libelle}}</td>
                                <td>{{date('d/m/Y', strtotime($session->date_debut))}}</td>
                                <td>{{date('d/m/Y', strtotime($session->date_fin))}}</td>
                                <td>{{$sessions->public_cible}}</td>
                                <td>{{$sessions->prix}} FCFA</td>
                                <td>{{$sessions->duree}}</td>              
                            </tr> 
                        
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>           
          </div>
        </div>
         <!-- footer -->
        @include('illimitis.footer')
         <!-- end footer -->
      </div>
    </div>

    

    <!-- script -->
    @include('illimitis.script')
    <!-- end script -->
  </body>
</html>
