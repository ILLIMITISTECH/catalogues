<html >
    <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head><meta charset="gb18030">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Catalogue de formation ILLIMITIS</title>
    <!-- CSS files -->
    <link href="{{asset('table/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('table/css/demo.min.css')}}" rel="stylesheet"/>
         <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="{{asset('catalogue/logo.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
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
                                           
                </div>
                <div class="card-table table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Prospects</th>
                        <!--<th>Nom</th>-->
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Pays</th>
                        <th>Besoins</th>
                        <th>Document t&eacute;l&eacute;charg&eacute;</th>
                        <th >Date</th>
                        
                        <!--<th width="250">Options</th>                       -->
                      </tr>
                    </thead>   
                    <tbody>  
                    @php
                    
                    $notation = 1;
                    
                    @endphp
                    
                    
                        @foreach($prospects as $prospect)      
                        @php $p = DB::table('pays')->where('id', $prospect->pays_id)->first(); $ac = "�"; setlocale(LC_CTYPE, 'fr_FR.UTF-8'); @endphp
                        @if($p)
                        @if ($prospect->nom_pay !== 'Zimbabwe')
                        
                            <tr>
                                
                                <td>{{$notation}}</td>
                                <td>{{$prospect->prenom}} {{$prospect->nom}}</td>
                                <td>{{$prospect->email}}</td>
                                <td>{{$prospect->phone}}</td>
                                <td>{{$p->nom_pay}}</td>
                                
                                @if($prospect->besoins)
                                <td >{{$prospect->besoins}}</td>
                                @else
                                <td>--</td>
                                @endif
                                <td>{{$prospect->document_name}}</td>
                                <td>{{date('d/m', strtotime($prospect->updated_at))}} a {{date('H:i:s', strtotime($prospect->updated_at))}}</td>
    
                            </tr>
                            @endif
                            @endif
                            
                            @php
                    
                            $notation ++;
                            
                            @endphp
                            
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
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

   <script src="{{asset('assets/js/jquery.app.js')}}"></script>
   
   
   
   <script type="text/javascript">
  
        $('#datatable-buttons').DataTable({
   order: [[ 0, 'desc' ]]
})
       
  
  
   
   </script>
</body>
</html>
    

   
  
