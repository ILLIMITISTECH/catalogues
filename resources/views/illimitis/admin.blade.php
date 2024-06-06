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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
          
        <div class="container-xl" style="margin-top : 2%;">
          <!-- Page title -->         
          <div class="row row-deck row-cards">          
            <div class="col-md-12 col-lg-12">
              <div class="card">  
                <div class="card-header" style="position : relative;">
                  <h3 class="card-title" style="font-family: 'Montserrat', sans-serif; font-weight : bold;">Liste des Sessions </h3>
                   <div style="position : absolute; right : 2%;" class="card-title">
                    <button type="button" class="btn btn-primary" style ="font-size : 10px; margin-left:10px; margin-bottom : 5px; background-color : black;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px; font-family: 'Montserrat', sans-serif; font-weight : bold;" href="/sessions/create">Ajouter une Session</a></button>
                   </div>
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Formation</th>-->
                        <th style="font-family: 'Montserrat', sans-serif;">Libelle</th>
                        <th style="font-family: 'Montserrat', sans-serif;">Date de debut</th>
                        <th style="font-family: 'Montserrat', sans-serif;">Date de fin</th>
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Public Cible</th>-->
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Prix</th>-->
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Durée</th>-->
                                             
                      </tr>
                    </thead>   
                    <tbody>  
                    @foreach($sessions as $session)     
                            <tr>   
                                <!--<td>-->
                                <!--<div class="student-img">-->
                                <!--    <img src="{{url('illimitis',$session->image)}}" style="height:100px;" alt="" />-->
                                <!--</div>-->
                                <!--</td>    -->
                                <td>{{$session->libelle}}</td>
                                <td>{{date('d/m/Y', strtotime($session->date_debut))}}</td>
                                <td>{{date('d/m/Y', strtotime($session->date_fin))}}</td>
                                <!--<td>{{$session->public_cible}}</td>-->
                                <!--<td>{{$session->prix}} FCFA</td>-->
                                <!--<td>{{$session->duree}}</td>              -->
                            </tr> 
                    @endforeach
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-12" style="margin-top: 2%;">
              <div class="card">
                <div class="card-header" style="position : relative;">
                  <h3 class="card-title" style="font-family: 'Montserrat', sans-serif; font-weight : bold;">Liste des Formations</h3>
                   <div class="card-title" style="position : absolute; right : 2%;">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:10px; margin-bottom : 5px; background-color : black;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px; font-family: 'Montserrat', sans-serif; font-weight : bold;" href="/formations/create">Ajouter une Formation</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th style="font-family: 'Montserrat', sans-serif;">Libellé</th>
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Objectif</th>-->
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Public Cible</th>-->
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Prix</th>-->
                        <!--<th style="font-family: 'Montserrat', sans-serif;">Durée</th>-->
                        <th width="280" style="font-family: 'Montserrat', sans-serif;">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($formations as $formation)           
                            <tr style="position : relative;">       
                                <td>{{$formation->libelle}}</td>
                                <!--<td>{{$formation->objectif}}</td>-->
                                <!--<td>{{$formation->public_cible}}</td>-->
                                <!--<td>{{$formation->prix}} FCFA</td>-->
                                <!--<td>{{$formation->duree}}</td>-->
                                <td style="text-align : right; position : absolute; right : 3%;">
                                   
                                        <form action="{{ route('formations.destroy',$formation->id) }}" method="POST" style="display : flex;">
                                        <!--<button class="btn btn-dark" href="{{ route('formations.show',$formation->id) }}" style="margin-right: 10%;"><span class="material-icons" style="font-size : 18px;">info</span></button>-->
                                        <button class="btn btn-success" href="{{ route('formations.edit',$formation->id) }}" style="margin-right: 10%;"><span class="material-icons" style="font-size : 18px;">create</span></button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êts-vous sûr de vouloir supprimer ?')"><span class="material-icons" style="font-size : 18px;">delete</span></button>
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

