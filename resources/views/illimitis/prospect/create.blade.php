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
                  <h3 class="card-title">Ajouter des prospects</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/prospects">Liste des prospects</a></button>   
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
                        <form action="{{route('prospects.store')}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-pane" id="tab1">
                                <fieldset>
                                <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Prenom</label>
                                        <div class="controls">
                                            <input name="prenom" type="text" class="form-control" placeholder="Prenom">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Nom</label>
                                        <div class="controls">
                                            <input name="nom" type="text" class="form-control" placeholder="Nom">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Email</label>
                                        <div class="controls">
                                            <input name="email" type="text" class="form-control" placeholder="email@********">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Mobile</label>
                                        <div class="controls">
                                            <input name="phone" type="number" class="form-control" placeholder="Mobile">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Besoins</label>
                                        <div class="controls">
                                            <input name="besoins" type="text" class="form-control" placeholder="Besoins">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Pays</label>
                                        <div class="controls">
                                            <select name="pays_id" id="pays_id" required>
                                                <option value="">Selectionner un pays</option>
                                                @foreach($pays as $pay)
                                                <option value="{{$pay->id}}">{{$pay->nom_pay}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div>   
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Document</label>
                                        <div class="controls">
                                            <select name="document_id" id="document_id" required>
                                                <option value="">Selectionner un document</option>
                                                @foreach($documents as $document)
                                                <option value="{{$document->id}}">{{$document->name}}</option>
                                                @endforeach
                                            </select>
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

