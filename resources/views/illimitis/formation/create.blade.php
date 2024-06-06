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
                  <h3 class="card-title">Ajouter des Formations</h3>
                   <div  style="margin-left:620px" class="card-title">
                       
                    </div>                             
                </div>
                <div class="card-table table-responsive" style="margin-left : 2%;">
                    <h6> 
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                        </div>  
                        @endif
                    </h6>
                        <form action="{{route('formations.store')}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-pane" id="tab1">
                                <fieldset>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Categorie</label>
                                        <div class="controls">
                                            <select name="categorie_id" id="categorie_id" required>
                                                <option value="">Selectionner une categorie</option>
                                                @foreach($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                          
                                    </div> 
                                    <!--<div class="control-group">                                                        -->
                                    <!--    <label class="control-label" for="focusedInput">Image</label>-->
                                    <!--    <div class="controls">-->
                                    <!--        <input name="image" type="file" class="form-control" placeholder="Image">-->
                                    <!--    </div>                                                          -->
                                    <!--</div> -->
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Libelle</label>
                                        <div class="controls">
                                            <input name="libelle" type="text" class="form-control" placeholder="Libelle">
                                        </div>                                                          
                                    </div>
                                    <!--<div class="control-group">                                                        -->
                                    <!--    <label class="control-label" for="focusedInput">Objectif</label>-->
                                    <!--    <div class="controls">-->
                                    <!--        <input name="objectif" type="text" class="form-control" placeholder="Objectif">-->
                                    <!--    </div>                                                          -->
                                    <!--</div> -->
                                    <!--<div class="control-group">                                                        -->
                                    <!--    <label class="control-label" for="focusedInput">Public Cible</label>-->
                                    <!--    <div class="controls">-->
                                    <!--        <input name="public_cible" type="text" class="form-control" placeholder="Public Cible">-->
                                    <!--    </div>                                                          -->
                                    <!--</div> -->
                                    <!--<div class="control-group">                                                        -->
                                    <!--    <label class="control-label" for="focusedInput">Contenu</label>-->
                                    <!--    <div class="controls">-->
                                    <!--    <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Contenu"></textarea>-->
                                    <!--    </div>                                                          -->
                                    <!--</div> -->
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
                                    <!--
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Prix</label>
                                        <div class="controls">
                                            <input name="prix" type="number" class="form-control" placeholder="Prix">
                                        </div>                                                          
                                    </div> -->
                                    <!--<div class="control-group">                                                        -->
                                    <!--    <label class="control-label" for="focusedInput">Durée</label>-->
                                    <!--    <div class="controls">-->
                                    <!--        <input name="duree" type="text" class="form-control" placeholder="Durée">-->
                                    <!--    </div>                                                          -->
                                    <!--</div>                                                                                                                                                    -->
                                </fieldset>                                                
                            </div>   
                            <div class="form-actions pull-right" style="margin-top:20px;">
                                <button type="submit" class="btn btn-primary">Valider</button>
                                <a href="/formations"><button type="button" class="btn btn-dark"</button>Fermer</button></a>
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

