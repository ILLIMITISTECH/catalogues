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
                <div class="card-header" style="position : relative;">
                  <h3 class="card-title" style="font-family: 'Montserrat', sans-serif; font-weight : bold;">Liste des categories</h3>
                   <div style="position : absolute; right : 5%;" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:10px; margin-bottom : 5px; background-color : black;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px; font-family: 'Montserrat', sans-serif; font-weight : bold;" href="/categories/create">Ajouter une categorie</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Categorie</th>
                        <!--<th width="250">Description</th>-->
                        <th width="250">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($categories as $categorie)           
                            <tr>       
                                <td>{{$categorie->nom}}</td>
                                <!--<td>{{$categorie->description}}</td>-->
                                <td>
                                    <form action="{{ route('categories.destroy',$categorie->id) }}" method="POST"  style="display : flex;">
                                        <!--<a class="btn btn-success" href="{{ route('categories.show',$categorie->id) }}" style="margin-right: 2%;"><span class="material-icons" style="font-size : 18px;">info</span></a>-->
                                        <a class="btn btn-success" href="{{ route('categories.edit',$categorie->id) }}" style="margin-right: 2%;"><span class="material-icons" style="font-size : 18px;">create</span></a>
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

