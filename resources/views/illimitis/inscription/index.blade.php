<html lang="fr">
  <head><meta charset="gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>ILLIMITIS | Inscriptions </title>
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
                <div class="card-header" style="position : relative;">
                  <h3 class="card-title">Liste des inscriptions</h3>
                   <div style="position : absolute; right : 10%;" class="card-title">
                        <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/inscriptions/create">Ajouter une inscription</a></button>
                    
                    </div> 
                     <div style="position : absolute; right : 30%; top:10%;" class="card-title">
                            <!--<select class="form-select" aria-label="Default select example">
                              <option selected>Filtrer par formation</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>-->
                           <form action="/search_formation" method="get">
                            <select name="search_formation" class="form-select" aria-label="Default select example">
                                <option value="" disabled selected>Filtrer par formation</option>
                                @foreach($formations as $formation)
                                    <option value="{{$formation->libelle}}">{{$formation->libelle}}</option>
                                @endforeach
                            </select>
                                <button class="btn btn-success form-control" style="width:70px; height:25px; color:white;font-weight:bold;position : absolute; left : 100%;  top:10%;" type="submit">Filtrer</button>
                        </form> 
                        </div>
                         <div style="position : absolute; right : 68%;" class="card-title">
                             <button type="button" class="btn btn-light" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">file_upload</span><a  style="font-size:10px;">Exporter les inscriptions</a></button>
                        </div>
                        
                        
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter" style="width : 100%;">
                    <thead>
                      <tr>
                        <th>Nom et prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Formation</th>
                        <!--<th>Session</th>-->
                        <th>Session du</th>
                        <th>Statut</th>
                        
                      
                        <th width="300">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($inscriptions as $inscription)           
                            <tr>    
                                <td>{{$inscription->prenom}} {{$inscription->nom}}</td>
                                <td>{{$inscription->email}}</td>
                                <td>{{$inscription->mobile}}</td>
                                <?php $formations = DB::table('formations')->where('id',$inscription->formation_id)->get() ?>
                                @if($formations->isEmpty())
                                <td>No formation</td>
                                @else
                                @foreach($formations as $formation)
                                <td>{{$formation->libelle}}</td>
                                @endforeach
                                @endif
                            
                                  <?php $sessions = DB::table('sessions')->where('id',$inscription->session_id)->get() ?>
                                @if($sessions->isEmpty())
                                <td>No $session</td>
                                @else
                                @foreach($sessions as $session)
                                 <td>{{date('d/m/Y', strtotime($session->date_debut))}} | {{date('d/m/Y', strtotime($session->date_debut))}}</td>
                                @endforeach
                                @endif
                                @if($inscription->statut_inscription == 0)
                                   <td><div class="spinner-grow text-danger" role="status"><span class="visually-hidden">Loading...</span></div></td>
                                @elseif($inscription->statut_inscription == 1)
                                   <td><div class="spinner-grow text-warning" role="status"><span class="visually-hidden">Loading...</span></div></td>
                                @elseif($inscription->statut_inscription == 2)
                                   <td><div class="spinner-grow text-success" role="status"><span class="visually-hidden">Loading...</span></div></td>
                                @else
                                   <td><div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div></td>
                                @endif
                                <!--Buttons d'options sur le tableau-->
                                <td style="margin-top : 5%; display :flex;>
                                    <form action="{{ route('inscriptions.destroy',$inscription->id) }}" method="POST">

                                        <a class="btn btn-success" href="{{ route('inscriptions.edit',$inscription->id) }}" style="margin-right : 2%;"><span class="material-icons" style="font-size : 14px;">edit</span></a>
                                        <a class="btn btn-dark" href="{{ route('inscriptions.show',$inscription->id) }}" style="margin-right : 2%;"><span class="material-icons" style="font-size : 14px;">info</span></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êts-vous sûr de vouloir supprimer ?')" style="margin-right : 2%;"><span class="material-icons" style="font-size : 14px;">delete</span></button>
                                    </form>
                                </td>   
                                  <!--Buttons d'options sur le tableau-->
                            </tr> 
                        @endforeach  
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

