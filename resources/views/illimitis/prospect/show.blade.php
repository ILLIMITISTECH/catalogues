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
                <div class="card-header">
                  <h3 class="card-title">prospect</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/prospects">Liste des prospects</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                      <tr>
                       <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Besoins</th>                       
                        <th>Pays</th>
                        <th>Document</th>
                                             
                      </tr>
                    </thead>   
                    <tbody>  
                                
                            <tr>   
                                <td>{{$prospect->prenom}}</td>
                                <td>{{$prospect->nom}}</td>
                                <td>{{$prospect->email}}</td>
                                <td>{{$prospect->phone}}</td>
                                <td>{{$prospects->nom_pay}}</td>
                                <td>{{$prospects->name}}<hr>
                                <i class="fa fa-download"><a href="{{url('illimitis',$prospects->filename)}}" download>Telecharger</a</i>
                                </td>              
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

