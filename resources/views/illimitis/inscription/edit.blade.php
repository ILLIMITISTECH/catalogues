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
                  <h3 class="card-title">Modifier un inscription</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/inscriptions">Liste des inscriptions</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                    <h6> 
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                        </div>  
                        @endif
                    </h6>
                        <form action="{{route('inscriptions.update', $inscription->id)}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="tab-pane" id="tab1">
                                <fieldset>
                                     <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Prenom</label>
                                        <div class="controls">
                                            <input name="prenom" value="{{$inscription->prenom}}" type="text" class="form-control" placeholder="Prenom">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Nom</label>
                                        <div class="controls">
                                            <input name="nom" value="{{$inscription->nom}}" type="text" class="form-control" placeholder="Nom">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Email</label>
                                        <div class="controls">
                                            <input name="email" value="{{$inscription->email}}" type="text" class="form-control" placeholder="email@********">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Mobile</label>
                                        <div class="controls">
                                            <input name="mobile" value="{{$inscription->mobile}}" type="number" class="form-control" placeholder="Mobile">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Whatsapp</label>
                                        <div class="controls">
                                            <input name="whatsapp" value="{{$inscription->whatsapp}}" type="number" class="form-control" placeholder="Whatsapp">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Fonction</label>
                                        <div class="controls">
                                            <input name="fonction" value="{{$inscription->fonction}}" type="text" class="form-control" placeholder="Fonction">
                                        </div>                                                          
                                    </div>   
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Adresse</label>
                                        <div class="controls">
                                            <input name="adresse" value="{{$inscription->adresse}}" type="text" class="form-control" placeholder="Adresse">
                                        </div>                                                          
                                    </div>   
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Pays</label>
                                        <div class="controls">
                                            <select name="pays_id" id="pay_id" required>
                                                <option value="{{$inscription->pays_id}}">Selectionner un pays</option>
                                                @foreach($pays as $pay)
                                                <option value="{{$pay->id}}">{{$pay->nom_pay}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>   
                              <!--  <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Client</label>
                                        <div class="controls">
                                            <select name="client_id" id="client_id" required>
                                                <option value="{{$inscription->client_id}}">Selectionner un client</option>
                                                @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->prenom}} {{$client->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>   -->
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Formation</label>
                                        <div class="controls">
                                            <select name="formation_id" id="formation_id" required>
                                                <option value="{{$inscription->formation_id}}">Selectionner un formation</option>
                                                @foreach($formations as $formation)
                                                <option value="{{$formation->id}}">{{$formation->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Session</label>
                                        <div class="controls">
                                            <select name="session_id" id="session_id" required>
                                                <option value="{{$inscription->session_id}}">Selectionner un session</option>
                                                @foreach($sessions as $session)
                                                <option value="{{$session->id}}">{{date('d/m/Y', strtotime($session->date_debut))}} & {{date('d/m/Y', strtotime($session->date_fin))}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>   
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Agent</label>
                                        <div class="controls">
                                            <select name="agent_id" id="agent_id" required>
                                                <option value="{{$inscription->agent_id}}">Selectionner un agent</option>
                                                @foreach($agents as $agent)
                                                <option value="{{$agent->id}}">{{$agent->prenom}} {{$agent->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>                            
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Attente 1</label>
                                        <div class="controls">
                                            <input name="attente_a" value="{{$inscription->attente_a}}" type="text" class="form-control" placeholder="Attente 1">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Attente 2</label>
                                        <div class="controls">
                                            <input name="attente_b" value="{{$inscription->attente_b}}" type="text" class="form-control" placeholder="Attente 2">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Attente 3</label>
                                        <div class="controls">
                                            <input name="attente_c" value="{{$inscription->attente_c}}" type="text" class="form-control" placeholder="Attente 3">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Montant payer</label>
                                        <div class="controls">
                                            <input name="montant_paye" value="{{$inscription->montant_paye}}" type="number" class="form-control" placeholder="Montant payer">
                                        </div>                                                          
                                    </div>                                                                                                                                                              
                                </fieldset>                                                
                            </div>   
                            <div class="form-actions pull-right" style="margin-top:20px;">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
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

