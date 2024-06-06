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
                  <h3 class="card-title">Ajouter un Hébergement</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/hebrgements">Liste de nos hébrgements</a></button>   
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
                        <form action="{{route('hebergements.store')}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-pane" id="tab1">
                                <fieldset>
                                <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Libellé</label>
                                        <div class="controls">
                                            <input name="libelle" type="text" class="form-control" placeholder="Domaine">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Description</label>
                                        <div class="controls">
                                            <input name="description" type="text" class="form-control" placeholder="Description">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Domaine sup</label>
                                        <div class="controls">
                                            <input name="domaine_sup" type="text" class="form-control" placeholder="Domaine sup">
                                        </div>                                                          
                                    </div> 
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Deadline</label>
                                        <div class="controls">
                                            <input name="deadline" type="date" class="form-control" placeholder="Deadline">
                                        </div>                                                          
                                    </div> 
                                    
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Prix</label>
                                        <div class="controls">
                                            <input name="prix" type="text" class="form-control" placeholder="Prix">
                                        </div>                                                          
                                    </div> 
                                    
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Pays</label>
                                        <div class="controls">
                                            <select name="pays" class="form-control" >
                                                <option value="" >Sélectionner la pays</option>
                                                <option value="Senegal" >Sénégal</option>
                                                <option value="Burkina Faso" >Burkina Faso</option>
                                                <option value="Côte d'ivoire" >Côte d'ivoire</option>
                                            </select>
                                        </div>                                                          
                                    </div> 
                                    
                                </fieldset>                                                
                            </div>   
                            <div class="form-actions pull-right" style="margin-top:20px;">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
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

