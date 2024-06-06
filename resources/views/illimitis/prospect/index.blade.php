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
                  <h3 class="card-title">Liste des prospects</h3>
                   <div  style="margin-left:620px" class="card-title">
                    <button type="button" class="btn btn-dark" style ="font-size : 10px; margin-left:60%; margin-bottom : 5px;"><span class="material-icons"></span><a  style="color:black; font-size:10px;" href="/prospects/create">Ajouter un prospect</a></button>   
                    </div>                             
                </div>
                <div class="card-table table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>Document t&eacute;l&eacute;charg&eacute;</th>
                        <th >Date</th>
                        
                        <th width="250">Options</th>                       
                      </tr>
                    </thead>   
                    <tbody>  
                        @foreach($prospects as $prospect)           
                            <tr>       
                                <td>{{$prospect->prenom}}</td>
                                <td>{{$prospect->nom}}</td>
                                <td>{{$prospect->email}}</td>
                                <td>{{$prospect->phone}}</td>
                                <td>{{$prospect->document_name}}</td>
                                <td>{{date('d/m', strtotime($prospect->created_at))}}</td>
                                <td>
                                    <form action="{{ route('prospects.destroy',$prospect->id) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('prospects.edit',$prospect->id) }}">Modifier</a>
                                        <!--<a class="btn btn-success" href="{{ route('prospects.show',$prospect->id) }}">Details</a>-->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('脢ts-vous s没r de vouloir supprimer ?')">Supprimer</button>
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
     <!-- jQuery  -->
   <script src="{{asset('assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/js/detect.js')}}"></script>
   <script src="{{asset('assets/js/fastclick.js')}}"></script>
   <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
   <script src="{{asset('assets/js/waves.js')}}"></script>
   <script src="{{asset('assets/js/wow.min.js')}}"></script>
   
   <!-- Datatables-->
   <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>
   
   <!-- Datatable init js -->
   <script src="{{asset('assets/pages/datatables.init.js')}}"></script>
   
   <script src="{{asset('assets/js/jquery.app.js')}}"></script>
   
   <script type="text/javascript">
   $(document).ready(function() {
       $('#datatable').dataTable();
       $('#datatable-keytable').DataTable( { keys: true } );
       $('#datatable-responsive').DataTable();
       $('#datatable-scroller').DataTable( { ajax: "{{asset('assets/plugins/datatables/json/scroller-demo.json')}}", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
       var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
   } );
   TableManageButtons.init();
   </script>
</body>
</html>
    

   
  
