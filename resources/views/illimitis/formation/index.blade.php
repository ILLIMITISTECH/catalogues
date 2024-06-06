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
               <div class="card-header" style="position : relative;">
                  <h3 class="card-title">Liste des Formations</h3>
                   <div class="card-title" style="position : absolute; right : 10%;">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/formations/create">Ajouter une Formation</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Libellé</th>
                        <!--<th>Objectif</th>-->
                        <!--<th>Public Cible</th>-->
                        <!--<th>Prix</th>-->
                        <!--<th>Durée</th>-->
                        <th width="250">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($formations as $formation)           
                            <tr>       
                                <td>{{$formation->libelle}}</td>
                                <!--<td>{{$formation->objectif}}</td>-->
                                <!--<td>{{$formation->public_cible}}</td>-->
                                <!--<td>{{$formation->prix}} FCFA</td>-->
                                <!--<td>{{$formation->duree}}</td>-->
                                <td>
                                    <form action="{{ route('formations.destroy',$formation->id) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('formations.edit',$formation->id) }}">Modifier</a>
                                        <!--<a class="btn btn-success" href="{{ route('formations.show',$formation->id) }}">Details</a>-->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êts-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                    </form>
                                </td>                    
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
