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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    .btn {
      border: none;
      color: white;
      padding: 12px 30px;
      cursor: pointer;
      font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
      background-color: RoyalBlue;
    }
</style>
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
                  <h3 class="card-title">Liste des documents</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/documents/create">Ajouter un document</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Nom du fichier</th>
                        <!--<th width="250">Description</th>-->
                        <th>Fichier</th>
                        <th width="250">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($documents as $document)           
                            <tr>       
                                <td>{{$document->name}}</td>
                                <!--<td>{{$document->description}}</td>-->
                                <td>
                                <i class="fa fa-download"><a href="{{url('illimitis',$document->filename)}}" download>Telecharger</a></i>
                                </td>
                                <td>
                                    <form action="{{ route('documents.destroy',$document->id) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('documents.edit',$document->id) }}" style="font-size : 12px;"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-dark" href="{{ route('documents.show',$document->id) }}" style="font-size : 12px;"><i class="bi bi-info-circle-fill"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êts-vous sûr de vouloir supprimer ?')" style="font-size : 12px;"><i class="bi bi-trash-fill"></i></button>
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

