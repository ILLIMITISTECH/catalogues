<div class="breadcome-area">
                <div class="container-fluid">
            
                </div>
            </div>
        </div>
        
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <h5> 
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                           {{ session('message') }}
                        </div>  
                    @endif
                </h5> 
            </div>
        </div>  

        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Performances</b></span>
                                        </div>
                                             <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:50px;"> 
                                                <tbody style="display:flex; justify-content:space-between;">
                                                <p><b><a href="#mesperformance" style="color:green;"> Mes Performances </a></b>: <b style="color:green;">{{intval($sum_actions/count($actions))}}%</b></p>
                                                @if(intval($sum_actions/count($actions)) >= "100")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif(intval($sum_actions/count($actions)) >= "90")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="90" style="width:90%;"> <span class="sr-only">90% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "80")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="80" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "70")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="70" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_actions/count($actions)) >= "60")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="60" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_actions/count($actions)) >= "50")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "40")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="40" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "30")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="30" style="width:30%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "20")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="20" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "10")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="10" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "5")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="5" style="width:5%;"> <span class="sr-only">5% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_actions/count($actions)) >= "00")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="00" style="width:00%;"> <span class="sr-only">00% Complete</span> </div>
                                                </div>
                                                @endif
                                                <p><b><a href="#directionperformance" style="color:green;">Performances de ma direction</a></b>: <b style="color:green;">{{intval($sum_directions/count($action_directions))}}%</b></p>
                                                @if(intval($sum_directions/count($action_directions)) >= "100")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                               @elseif(intval($sum_directions/count($action_directions)) >= "90")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="90" style="width:90%;"> <span class="sr-only">90% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "80")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="80" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "70")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="70" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_directions/count($action_directions)) >= "60")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="60" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_directions/count($action_directions)) >= "50")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "40")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="40" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "30")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="30" style="width:30%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "20")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="20" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "10")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="10" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "5")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="5" style="width:5%;"> <span class="sr-only">5% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_directions/count($action_directions)) >= "00")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="00" style="width:00%;"> <span class="sr-only">00% Complete</span> </div>
                                                </div>
                                                @endif

                                                <p><b><a href="#teamperformance" style="color:green;">Performance de la Team</a></b>: <b style="color:green;">{{intval($sum_suivi_actions/count($suivi_actions))}}%</b></p>

                                                @if(intval($sum_suivi_actions/count($suivi_actions)) >= "100")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "90")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="90" style="width:90%;"> <span class="sr-only">90% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "80")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="80" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "70")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="70" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "60")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="60" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                               
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "50")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "40")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="40" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "30")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="30" style="width:30%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "20")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="20" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "10")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="10" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "5")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="5" style="width:5%;"> <span class="sr-only">5% Complete</span> </div>
                                                </div>
                                                
                                                @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= "00")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="00" style="width:00%;"> <span class="sr-only">00% Complete</span> </div>
                                                </div>
                                                @endif
                                                     <!--@foreach($agents as $agent)
                                                        <tr>
                                                            
                                                                <td>
                                                               
                                                                <div class="student-img">
                                                                    <a href="{{route('agent.voir', $agent->id)}}"><img src="{{url('images',$agent->photo)}}" style="height:50px; width:50px; border-radius:100%;" alt="" /></a>
                                                                </div>
                                                                <div class="student-dtl">
                                                                        <p class="dp" style="margin-left:-20px;"><b><a href="{{route('agent.voir', $agent->id)}}" style="color:green;">{{$agent->prenom}} {{$agent->nom}}</a></b></p>
    
                                                                                       
                                                                 </div>
                                                                </td>
                                                                
                                                            
                                                        </tr>
                                                    @endforeach-->
                                                </tbody>
                                            </table>
                                            
                                            <!-- <center><table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;">
                                                <tbody style="display:flex; justify-content:space-between;">
                                                    @foreach($agents as $agent)
                                                    <tr>
                                                        <td><b><a href="{{route('agent.voir', $agent->id)}}" style="color:green;">{{$agent->prenom}} {{$agent->nom}}</a></b></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                             </table></center> -->
                                    </div>
                                    
                                    <div class="contacts-area mg-b-15">
                                        <div class="container-fluid">
                            
                                            <div class="row">
                                              @foreach($agents as $agent)
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="student-inner-std res-mg-b-30">
                                                        <div class="student-img">
                                                            <!--<a href="{{route('agent.voir', $agent->id)}}"><img src="{{url('images',$agent->photo)}}" style="height:50px; width:50px; border-radius:100%;" alt="" /></a>-->
                                                            <p></p>
                                                        </div>
                                                        <div class="student-dtl">
                                                            <p class="dp" style="margin-left:-20px; border-radius: 20px; border:solid 2px green; width:100%; height:100%;"><b><a href="{{route('agent.voir', $agent->id)}}" style="color:green;">{{$agent->prenom}} {{$agent->nom}}</a></b></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                              @endforeach
                                            </div>
                            
                                        </div>
                                    </div>

                                    <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Actualités/Annonces</b></span>
                                        </div>
                                        <div style="margin-top:50px;"> 
                                              <div class="row">
                                                  @foreach($annonces as $annonce)
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="student-inner-std res-mg-b-30">
                                                            
                                                            <div class="student-dtl">
                                                               
                                                                <li style="text-align:left;">{{$annonce->titre}}</li>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                  @endforeach
                                                </div>
                                        </div>
                                    </div>-->
                                    
                                   
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>


                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:50px;">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Mes Actions</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Tous mes actions</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>    
                              
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                            <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Libelle</th>
                                        <th>Risque</th>
                                        <th>Deadline</th>
                                        <th>Durée Écoulée</th>
                                        <th>Pourcentage</th>
                                        <th>Note</th>
                                        <th>Options</th>
                                        <th>Options</th>
                                    </tr>
                               </thead>                               
                                <tbody>
                                    @foreach($suivi_actions as $action)
                                      <tr>
                                            <td>{{$action->id}}</td>
                                            <td>{{$action->libelle}}</td>
                                            <td>{{$action->risque}}</td>
                                            <td>{{$action->deadline}}</td>
                                            <td>{{$action->delais}}</td>
                                            <td>{{$action->pourcentage}}</td>
                                            <td>{{$action->note}}</td>
                                            <td>                                  
                                                <div class="student-dtl">
                                                   <button><a href="{{route('action_user.editer', $action->id)}}" class="button">Maj</a></button>
                                            
                                                </div>
                                            </td>
                                            
                                      </tr>
                                    @endforeach
                                    @foreach($suivi_actions as $action)               
                                    <td>                                  
                                        <div class="student-dtl">
                                            <button><a href="{{route('action_user_a.editer', $action->id)}}" class="button">Escalader</a></button>    
                                        
                                        </div>
                                    </td>
                                    
                                    @endforeach

                                </tbody>
                                 
                            </table>
                        </div>
                    </div>
 -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row" id="mesperformance">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                        <h5> @if (session('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('message') }}
                                            </div>  
                                        @endif</h5>
                                            <span class="caption-subject"><b>Les actions pour lesquelles je suis responsable</b></span>
                                        </div>
                                        <div style="margin-top:50px;"> 
                                               
                                            <div class="row">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Libelle</th>
                                                               <th>Backup</th>
                                                               <th>Risque</th>
                                                               <th>Durée Écoulée</th>
                                                               <th>Pourcentage</th>
                                                               <th>Deadline</th>                   
                                                               <th>Note</th>
                                                               <th>Options</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_respons as $action)
                                                                 
                                                           
                                                             <tr>
                                                                   <form action="/save_action" method="post" id="target">
                                                                   <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                                                                   
                                                                   <td>{{$action->libelle}}</td>
                                                                    <td>{{$action->bakup}}</td>
                                                                  @if($action->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action->risque == 'Moins(M)')
                                                                   <<td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:45px; width:45px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                                                   <td>{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} Jours</td>
                                                                  
                                                                   
                                                                   <td>
                                                                <span class="text-success">{{$action->pourcentage}}%</span>
                                                                    @if($action->pourcentage == "100")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "90")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "80")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "70")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "60")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "50")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "40")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "30")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "20")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "10")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "00")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                                        </div>
                                                                    @endif  
                                                                    </td>
                                                                    <td>{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                                   <td>{{$action->note}}</td>

                                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                                   

                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <a href="{{route('action_user_d.editer', $action->id)}}"><button type="submit" id="action" class="button">Save Ant Maj</button></a>
                                                                          <button><a href="{{route('action_user_d.editer', $action->id)}}" class="button">Maj</a></button>
                                                                          <button><a href="{{route('history_d.voir', $action->id)}}" class="button">History</a></button>
                                                                       </div>
                                                                       
                                                                   </td>
                                                                  </form>
                                                                   
                                                             </tr>
                                                            
                                                           @endforeach
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                   </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b></b></span>
                                        </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:95px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Escalader</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_users as $action)
                                                             <tr>
                                                                  
                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <button><a href="{{route('action_user_a.editer', $action->id)}}" class="button">Escalader</a></button>
                                                                   
                                                                       </div>
                                                                   </td>
                                                                   
                                                             </tr>
                                                           @endforeach
                                                          
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                  
                                    </div> -->
                                    
                                </div>
                            </div>
                            
                           <!--  <div id="extra-area-chart" style="height: 356px;"></div> -->
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Page Views</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div> 
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Bounce Rate</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                                </li>
                            </ul>
                        </div> 
                    </div> -->

                </div>
            </div>
        </div>
        
        
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                        <h5> @if (session('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('message') }}
                                            </div>  
                                        @endif</h5>
                                            <span class="caption-subject"><b>Les actions pour lesquelles je suis Backup</b></span>
                                        </div>
                                        <div style="margin-top:50px;"> 
                                               
                                            <div class="row">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Libelle</th>
                                                               <th>Backup</th>
                                                               <th>Risque</th>
                                                               <th>Durée Écoulée</th>
                                                               <th>Pourcentage</th>
                                                               <th>Deadline</th>                   
                                                               <th>Note</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_bakups as $action)
                                                                 
                                                            
                                                             <tr>
                                                                   <form action="/save_action" method="post" id="target">
                                                                   <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                                                                   
                                                                   <td>{{$action->libelle}}</td>
                                                                    <td>{{$action->bakup}}</td>
                                                                   @if($action->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action->risque == 'Moins(M)')
                                                                   <<td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:45px; width:45px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                                                   <td>{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} Jours</td>
                                                                  
                                                                   
                                                                   <td>
                                                                <span class="text-success">{{$action->pourcentage}}%</span>
                                                                    @if($action->pourcentage == "100")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "90")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "80")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "70")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "60")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "50")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "40")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "30")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "20")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "10")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                                        </div>
                                                                        @elseif($action->pourcentage == "00")
                                                                        <div class="progress m-b-0">
                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                                        </div>
                                                                    @endif  
                                                                    </td>
                                                                    <td>{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                                   <td>{{$action->note}}</td>

                                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                                   

                                                                   
                                                                  </form>
                                                                   
                                                             </tr>
                                                            
                                                           @endforeach
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                   </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b></b></span>
                                        </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:95px;"> 
                                                   
                                                   <thead>
                                                           <tr>
                                                               
                                                               <th>Escalader</th>
                                                           </tr>
                                                      </thead>                               
                                                       <tbody>
                                                           @foreach($action_users as $action)
                                                             <tr>
                                                                  
                                                                   <td>                                  
                                                                       <div class="student-dtl">
                                                                          <button><a href="{{route('action_user_a.editer', $action->id)}}" class="button">Escalader</a></button>
                                                                   
                                                                       </div>
                                                                   </td>
                                                                   
                                                             </tr>
                                                           @endforeach
                                                          
                       
                                                       </tbody>
                                                        
                                                   </table>
                                                  
                                    </div> -->
                                    
                                </div>
                            </div>
                            
                           <!--  <div id="extra-area-chart" style="height: 356px;"></div> -->
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Page Views</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div> 
                         <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div> 
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Bounce Rate</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                                </li>
                            </ul>
                        </div> 
                    </div> -->

                </div>
            </div>
        </div>
        <!-- <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu">
                            <i class="fa fa-facebook"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Likes</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                            <i class="fa fa-twitter"></i>
                            <div class="social-edu-ctn">
                                <h3>30k followers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-linkedin"></i>
                            <div class="social-edu-ctn">
                                <h3>7k Connections</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-youtube"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Subscribers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-cards-item">
                            <div class="single-product-image">
                                <a href="#"><img src="{{asset('admin/img/product/profile-bg.jpg')}}" alt=""></a>
                            </div>
                            <div class="single-product-text">
                                <img src="{{asset('admin/img/product/pro4.jpg')}}" alt="">
                                <h4><a class="cards-hd-dn" href="#">Angela Dominic</a></h4>
                                <h5>Web Designer & Developer</h5>
                                <p class="ctn-cards">Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit</p>
                                <a class="follow-cards" href="#">Follow</a>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">199</span></h3>
                                            <p>Articles</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">599</span></h3>
                                            <p>Like</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">399</span></h3>
                                            <p>Comment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            <div class="single-review-st-hd">
                                <h2>Reviews</h2>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/1.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Sarah Graves</h3>
                                    <p>Highly recommend</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/2.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Garbease sha</h3>
                                    <p>Awesome Pro</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/3.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Gobetro pro</h3>
                                    <p>Great Website</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/4.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Siam Graves</h3>
                                    <p>That's Good</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/5.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Sarah Graves</h3>
                                    <p>Highly recommend</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                            <div class="single-review-st-text">
                                <img src="{{asset('admin/img/notification/6.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>Julsha Grav</h3>
                                    <p>Sei Hoise bro</p>
                                </div>
                                <div class="review-item-rating">
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star"></i>
                                    <i class="educate-icon educate-star-half"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-product-item res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <div class="single-product-image">
                                <a href="#"><img src="{{asset('admin/img/product/book-4.jpg')}}" alt=""></a>
                            </div>
                            <div class="single-product-text edu-pro-tx">
                                <h4><a href="#">Title Demo Here</a></h4>
                                <h5>Lorem ipsum dolor sit amet, this is a consec tetur adipisicing elit</h5>
                                <div class="product-price">
                                    <h3>$45</h3>
                                    <div class="single-item-rating">
                                        <i class="educate-icon educate-star"></i>
                                        <i class="educate-icon educate-star"></i>
                                        <i class="educate-icon educate-star"></i>
                                        <i class="educate-icon educate-star"></i>
                                        <i class="educate-icon educate-star-half"></i>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <button type="button" class="button-default cart-btn">Read More</button>
                                    <button type="button" class="button-default"><i class="fa fa-heart"></i></button>
                                    <button type="button" class="button-default"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="product-sales-area mg-tb-30" id="directionperformance">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Les Actions de ma Direction</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp actions-graph-rp">
                                            <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
													<!-- <i class="fa fa-reply" aria-hidden="true"></i> -->
												</a>
                                            <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
													<!-- <i class="fa fa-trash-o" aria-hidden="true"></i> -->
												</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                               <!--  <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Python</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>PHP</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Java</h5>
                                </li> -->
                            </ul>
                           <!-- <div id="morris-area-chart"></div> -->   
                           
                           <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:50px;"> 
                               <thead>
                                    <tr>
                                        
                                        <th>Libelle</th>
                                        <th>Responsable</th>
                                         <th>Backup</th>
                                        <th>Risque</th>
                                        <th>Durée Écoulée</th>
                                         <th>Pourcentage</th>
                                        <th>Deadline</th>
                                      
                                    </tr>
                               </thead>                               
                                <tbody>
                                    @foreach($action_directions as $action_direction)
                                      <tr>
                                         
                                          <td>{{$action_direction->libelle}}</td>
                                           <td>
                                              <!--<div class="student-img">
                                                <img src="{{url('images',$action_direction->photo)}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                              </div> -->
                                              <div class="student-dtl">
                                                    <p class="dp" style="margin-left:-20px;">{{$action_direction->prenom}} {{$action_direction->nom}}</p>
                                                </div>
                                            </td>
                                            <td>{{$action_direction->bakup}}</td>
                                          @if($action_direction->risque == 'Elevé(E)')
                                                                   <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/vert.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @elseif($action_direction->risque == 'Moins(M)')
                                                                   <<td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/jaune2.jpeg')}}" style="height:45px; width:45px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @else($action_direction->risque == 'Faible(F)')
                                                                  <td> 
                                                                        <div class="student-img">
                                                                            <img src="{{asset('images/illimitis/rouge.jpeg')}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                                                        </div>
                                                                    </td>
                                                                   @endif
                                          <td>{{ intval(abs(strtotime($date1) - strtotime($action_direction->created_at))/ 86400)}} Jours</td>
                                         
                                          
                                          <td>
                                          <span class="text-success">{{$action_direction->pourcentage}}%</span>
                                            @if($action_direction->pourcentage == "100")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "90")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "80")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "70")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "60")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "50")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "40")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "30")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "20")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "10")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                @elseif($action_direction->pourcentage == "00")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                </div>
                                            @endif  
                                            </td>
                                             <td>{{strftime("%d/%m/%Y", strtotime($action_direction->deadline))}}</td>
                                            
                                           
                                          
                                      </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                         
                               
                    </div>
                    </div>

                    <div class="product-sales-area mg-tb-30" id="teamperformance">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Team Actions</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp actions-graph-rp">
                                            <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
													<!-- <i class="fa fa-reply" aria-hidden="true"></i> -->
												</a>
                                            <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
													<!-- <i class="fa fa-trash-o" aria-hidden="true"></i> -->
												</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                               <!--  <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Python</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>PHP</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Java</h5>
                                </li> -->
                            </ul>
                           <!-- <div id="morris-area-chart"></div> -->   
                           
                            <center><table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:20px;">
                                <tbody style="display:flex; justify-content:space-between;">
                                    @foreach($directions as $direction)
                                    <tr>
                                        <td style="border-radius: 20px; border:solid 2px green; width:100%; height:100%;"><b><a href="{{route('direction.voir', $direction->id)}}" style="color:green;">{{$direction->nom_direction}}</a></b></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table></center> 
                           
                           <!--<table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:50px;"> 
                               <thead>
                                    <tr>
                                        <th>Projets</th>
                                        <th>Suivi</th>
                                        <th>Deadline</th>
                                        <th>Durée Écoulée</th>
                                         <th>Résponsable</th>
                                        <th>Bakup</th>
                                    </tr>
                               </thead>                               
                                <tbody>
                                    @foreach($suivi_actions as $suivi)
                                      <tr>
                                          <td>{{$suivi->libelle}}</td>
                                          <td>
                                          <span class="text-success">{{$suivi->pourcentage}}</span>
                                            @if($suivi->pourcentage == "100%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "90%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "80%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "70%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "60%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "50%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "40%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "30%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "20%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "10%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "0%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                </div>
                                            @endif  
                                            </td>
                                            
                                            <td>
                                              <div class="student-img">
                                                <img src="{{url('images',$suivi->photo)}}" style="height:50px; width:50px; border-radius:100%;" alt="" />
                                              </div> 
                                             
                                            </td>
                                             <td>{{ abs(strtotime($date1) - strtotime($suivi->deadline))/ 86400}} Jours</td>
                                             
                                              <td><div class="student-dtl">
                                                    <p class="dp" style="margin-left:-20px;">{{$suivi->prenom}} {{$suivi->nom}}</p>
                                                  
                                                </div> </td>
                                            <td>{{$suivi->bakup}}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                               
                            </table> -->

                               
                    </div>
                    </div>

                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Indicateurs</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Tous les Indicateurs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                                
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="margin-top:50px;"> 
                                                   
                                <tbody>
                                    @foreach($suivi_indicateurs as $suivi)
                                      <tr>
                                          <td>{{$suivi->libelle}}</td>
                                          <td><b> Cible</b>: {{$suivi->cible}}</td>
                                          <td>
                                          <span class="text-success">{{$suivi->pourcentage}}</span>
                                            @if($suivi->pourcentage == "100%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "90%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">900% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "80%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "70%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "60%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "50%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "40%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "30%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">30% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "20%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "10%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">10% Complete</span> </div>
                                                </div>
                                                @elseif($suivi->pourcentage == "0%")
                                                <div class="progress m-b-0">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0%;"> <span class="sr-only">0% Complete</span> </div>
                                                </div>
                                            @endif  
                                            </td>
                                        
                                          <td>{{$suivi->date_cible}}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                         <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div> -->
                   <!--  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="analysis-progrebar res-mg-t-30 mg-ub-10 res-mg-b-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Usage</h5>
                                <h2 class="storage-right"><span class="counter">90</span>%</h2>
                                <div class="progress progress-mini ug-1">
                                    <div style="width: 68%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 1:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%;" class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                        <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        

        <!-- <div class="courses-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Browser Status</h3>
                            <ul class="basic-list">
                                <li>Google Chrome <span class="pull-right label-danger label-1 label">95.8%</span></li>
                                <li>Mozila Firefox <span class="pull-right label-purple label-2 label">85.8%</span></li>
                                <li>Apple Safari <span class="pull-right label-success label-3 label">23.8%</span></li>
                                <li>Internet Explorer <span class="pull-right label-info label-4 label">55.8%</span></li>
                                <li>Opera mini <span class="pull-right label-warning label-5 label">28.8%</span></li>
                                <li>Mozila Firefox <span class="pull-right label-purple label-6 label">26.8%</span></li>
                                <li>Safari <span class="pull-right label-purple label-7 label">31.8%</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h3 class="box-title">Visits from countries</h3>
                            <ul class="country-state">
                                <li>
                                    <h2><span class="counter">1250</span></h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">1050</span></h2> <small>From USA</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">6350</span></h2> <small>From Canada</small>
                                    <div class="pull-right">55% <i class="fa fa-level-up text-success ctn-ic-3"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:55%;"> <span class="sr-only">55% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">950</span></h2> <small>From India</small>
                                    <div class="pull-right">33% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:33%;"> <span class="sr-only">33% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">3250</span></h2> <small>From Bangladesh</small>
                                    <div class="pull-right">60% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="courses-inner res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <div class="courses-title">
                                <a href="#"><img src="{{asset('admin/img/courses/1.jpg')}}" alt="" /></a>
                                <h2>Apps Development</h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                            </div>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 -->