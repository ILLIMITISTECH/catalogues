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
                  <h3 class="card-title">Modifier un document</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons">add_circle_outline</span><a  style="color:white; font-size:10px;" href="/documents">Liste des documents</a></button>   
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
                        <form action="{{route('documents.update', $document->id)}}" method="post" class="form-horizontal" id="demo1-upload" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="tab-pane" id="tab1">
                                <fieldset>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Image</label>
                                        <div class="controls">
                                            <input name="image" value="{{$document->image}}" type="file" class="form-control" placeholder="Fichier">
                                        </div>                                                          
                                    </div>  
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Nom du Fichier</label>
                                        <div class="controls">
                                            <input name="name" value="{{$document->name}}" type="text" class="form-control" placeholder="Nom du Fichier">
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Description</label>
                                        <div class="controls">
                                        <textarea name="description" value="{{$document->description}}" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                                        </div>                                                          
                                    </div>
                                    <div class="control-group">                                                        
                                        <label class="control-label" for="focusedInput">Fichier</label>
                                        <div class="controls">
                                            <input name="filename" value="{{$document->filename}}" type="file" class="form-control" placeholder="Fichier">
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
