<html lang="fr">
  <head><meta charset="gb18030">
    
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
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
                  <h3 class="card-title">Liste des clients</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/clients/create">Ajouter un client</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th width="250">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($clients as $client)           
                            <tr>       
                                <td>{{$client->prenom}}</td>
                                <td>{{$client->nom}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->mobile}}</td>
                                <td>
                                    <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('clients.edit',$client->id) }}"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-dark" href="{{ route('clients.show',$client->id) }}"><i class="bi bi-info-circle-fill"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êts-vous sûr de vouloir supprimer ?')"><i class="bi bi-trash-fill"></i></button>
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

