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
                  <h3 class="card-title">Plus de détails</h3>
                   <div style="position : absolute; right : 10%;" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/inscriptions">Liste des inscriptions</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <!--<th>Formation</th>-->
                        <!--<th>Libelle</th>-->
                        <th>Session du</th>
                        <!--<th>Inscri</th>-->
                        <th>Attente 1</th>
                        <th>Attente 2</th>
                        <th>Attente 3</th>
                        <th>Montant à payer</th>
                        <th>Option</th>
                                             
                      </tr>
                    </thead>   
                    <tbody>  
                                
                            <tr>   
                                <!--<td>-->
                                <!--  <div class="student-img">-->
                                <!--    <img src="{{url('illimitis',$inscriptions->image)}}" style="height:200px;" alt="" />-->
                                <!--  </div>-->
                                <!--</td>-->
                                <!--<td>{{$inscriptions->libelle}}</td>-->
                                 @foreach($inscriptions as $inscription) 
                                <td>{{date('d/m/Y', strtotime($inscriptions->date_debut))}} | {{date('d/m/Y', strtotime($inscriptions->date_debut))}}</td>
                                @endforeach
                                <!--<td>{{$inscription->prenom}} {{$inscription->nom}} <br> {{$inscription->email}} mobile : {{$inscription->mobile}} <br> whatsapp : {{$inscription->whatsapp}} pays : {{$inscription->nom_pay}}</td>-->
                                <td>{{$inscription->attente_a}}</td>   
                                <td>{{$inscription->attente_b}}</td>
                                <td>{{$inscriptions->attente_c}}</td>
                                <td>{{$inscription->montant_paye}}</td>
                                <td> 
                                <div class="form" style="display:flex; justify-content: space-between;">
                                <form action="{{route('success.sta', $inscription->id)}}" method="post" id="target" class="form">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                    <button type="submit" class="btn btn-success">
                                        <span class="material-icons" style="font-size : 14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Valider le paiement">check_circle</span>
                                    </button>
                                </form>
                                <form action="{{route('warning.sta', $inscription->id)}}" method="post" id="target" class="form">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                    <button type="submit" class="btn btn-warning">
                                        <span class="material-icons" style="font-size : 14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Paiement en attente">pending_actions</span>
                                    </button>
                                </form>
                                <form action="{{route('danger.sta', $inscription->id)}}" method="post" id="target" class="form">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                    <button type="submit" class="btn btn-danger">
                                        <span class="material-icons" style="font-size : 14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Pas intéréssé">gpp_bad</span>
                                    </button>
                                </form>
                                </div>
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

