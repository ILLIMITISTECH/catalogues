@if(Session::has("success"))
                                            <div class="alert alert-success">
                                            <b>Action clôturée avec succès.</b> 
                                            </div>
                                            @endif
<div class="row">
                            <div class="col-md-12">
                            <h5> @if (session('message'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('message') }}
                                                </div>  
                                            @endif</h5>
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Mes actions en instance
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                                <th>Backup</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <th class="text-center">Durée</th>
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">Commentaire</th>
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <form action="{{route('contact.store')}}" method="post" id="target" class="form">
                                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                            @foreach($action_respons as $action)  
                                            @if($action->visibilite == 0)
                                            <tr>
                                            <form action="/save_action" method="post" id="target">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                <td class="">{{$action->libelle}}</td>
                                                <td class="text-center">{{$action->bakup}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} j</td>
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>                                                
                                                @endif
                                                <td class="text-center">{{$action->note}}</td>
                                                <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">

                                                <td class="text-center">
                                                   <div class="student-dtl" style="display:flex;">
                                                       <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Mettre a jour votre action">
                                                        <a id="PopoverCustomT-1" href="{{route('action_user.editer', $action->id)}}" class="button">
                                                            <div class="flip-box">
                                                                <div class="flip-box-inner">
                                                                    <div class="flip-box-front">
                                                                        <img src="{{asset('images/illimitis/maj1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                    </div>
                                                                   <div class="flip-box-back" style="color: #5cc57e"> 
                                                                        <i class="fas fa-cloud-upload-alt" style="font-size:25px; width:30px; height:30px;"></i> 
                                                                    </div>
                                                                </div>
                                                            </div>                                      
                                                        </a>
                                                        </span> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Escalader votre action">
                                                        <a href="{{route('action_user_a.editer', $action->id)}}" class="button" id="PopoverCustomT-1">
                                                            <div class="flip-box">
                                                                <div class="flip-box-inner">
                                                                    <div class="flip-box-front">
                                                                        <img src="{{asset('images/illimitis/esc.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                    </div>
                                                               <div class="flip-box-back" style="color: #5cc57e">
                                                                    <i class="fas fa-user-tie" style="font-size:25px; width:30px; height:30px;"></i>
                                                                    <!--<p style="font-size:10px; color:black;">Escalader</p>-->
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </a> 
                                                        </span> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    
                                                        <!-- Change class .modal-sm to change the size of the modal -->
                                                                    <div id="modals" class="modal-contents" >
                                                                        <div id="pop" style="font-family: 'PT Sans', sans-serif; font-weight:lighter; background-color: white" class="pop" style="">
                                                                            <div class="modal-header" style="margin-top:20px;">                                                                        
                                                                                <h4 class="modal-title w-100" id="myModalLabel"><b style="font-size:12px;">Êtes-vous vraiment sûre de vouloire clôturer l'action?</b></h4>
                                                                                 <!--<button type="button" class="close" data-dismiss="modal" onclick="check();" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>-->
                                                                            </div>
                                                                       
                                                                            <div class="modal-body">                                        
                                                                                <div id="selectDiv{{$action->id}}">
                                                                                    <input type="hidden" id="suiviID{{$action->id}}" value="{{$action->id}}">
                                                                                    <div class="check">                                                                           
                                                                                    <center>   
                                                                                        <input id="loginVisibilite{{$action->id}}" type="radio" name="visibilite" value="1"><b style="font-size:15px; margin-left:10px; color:green;">OUI</b>
                                                                                        <input id="loginnVisibilite{{$action->id}}" type="radio" name="visibilite" value="0"><b style="font-size:15px; margin-left:10px; color:red">non</b>
                                                                                    </center>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="modal-footer">
                                                                                <button id="popClose" type="button" class="btn btn-secondary btn-sm popClose" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-success btn-sm">Valider</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              <!-- end of modal -->   
                                                        <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Prénom & Nom</label>
                                                                            <input type="text" style="border: solid 1px gray;" name="name" value="{{Auth::user()->prenom}} {{Auth::user()->nom}}" class="form-control" id="name" placeholder="Votre Prénom & Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                             
                                                                            <div class="form-group" hidden>    
                                                                            @foreach($superieur1s as $superieu1r)
                                                                             @foreach($superieurs as $superieur)
                                                                             @if($superieu1r->superieur_id == $superieur->id)
                                                                                <label style="color:black;">Votre Email</label>
                                                                            <input type="email" style="border: solid 1px gray;" class="form-control" value="{{$superieur->email}}" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                                                                            <div class="validation"></div>
                                                                            @endif
                                                                            @endforeach
                                                                            @endforeach
                                                                            </div>
                                                                          
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Subject</label>
                                                                            <input type="text" style="border: solid 1px gray;" class="form-control" name="subject" value="Action Clôturée" id="subject" placeholder="Votre Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                            <div class="form-group" hidden>
                                                                                <label style="color:black;">Votre Message</label>
                                                                            <input class="form-control" style="border: solid 1px gray;" id="idButton" name="message" rows="5" value="Hello  {{$action->responsable}},
                                                                            &thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;
                                                                            &thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;
                                                                            &thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;
                                                                            &thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;
                                                                            &#10 &#13 La tâche: {{$action->libelle}} assignée à {{Auth::user()->prenom}} {{Auth::user()->nom}} a été cloturée" data-rule="required" data-msg="Please write something for us" placeholder="Votre Message">
                                                                            <div class="validation"></div>
                                                                            </div>
                                                                            @if($action->pourcentage == 100)
                                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Clôturer votre action">
                                                                                <span id="popup" class="btn mr-2 mb-2 popup" data-toggle="modal" data-target=".bd-example-modal-sm"  onclick="display()">                                                
                                                                                    <div id="myBtn" class="button" style="color:green;">
                                                                                        <div class="flip-box" style="margin-left: -15px; margin-top:-5px;">
                                                                                            <div class="flip-box-inner">
                                                                                                <div class="flip-box-front">
                                                                                                     <!--<img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">-->
                                                                                                    <i class="fas fa-clipboard-check" style="margin-left: -4px; font-size: 23px; width:30px;"></i>
                                                                                                </div>
                                                                                                <div class="flip-box-back" style="color: #5cc57e" disabled>
                                                                                                <i class="fas fa-clipboard-check" style="margin-left: -4px; font-size: 23px; width:30px;"></i>
                                                                                                <!--<p style="font-size:11px; color:black;" disabled>Clôture</p>-->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>    
                                                                                </span>
                                                                            </span>
                                                                            @else  
                                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Clôturer votre action">
                                                                            <span data-toggle="modal" id="PopoverCustomT-1" data-target="#centralModalSm" disabled>
                                                                                <div id="myBtn" class="button" style="color:green;">
                                                                                    <div class="flip-box">
                                                                                        <div class="flip-box-inner" disabled>
                                                                                            <div class="flip-box-front" disabled>
                                                                                                 <!--<img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">-->
                                                                                                <i class="fas fa-clipboard-check" style="margin-left: -4px; font-size: 23px; width:30px;"></i>
                                                                                            </div>
                                                                                            <div class="flip-box-back" style="color: #5cc57e" disabled>
                                                                                                <i class="fas fa-clipboard-check" style="margin-left: -4px; font-size: 23px; width:30px;"></i>
                                                                                                <!--<p style="font-size:11px; color:black;" disabled>Clôture</p>-->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </span>
                                                                            </span>
                                                                            @endif 
                                                    </div>
                                                </td>
                                            </form>
                                            </tr>
                                            @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                <h5> @if (session('message'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('message') }}
                                                </div>  
                                            @endif</h5>
                                    <div class="card-header">Actions escaladées de ma Team
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                              
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <th class="text-center">Durée</th>
                                                <th class="text-center">Pourcentage</th>
                                               
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_respons as $action)
                                            @if($action->raison != "")
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>
                                                @if($action->pourcentage == 100)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage <= 99)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>                                                
                                                @endif                                                
                                                
                                                <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                                        <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                                        <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                                        <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                <td class="text-center">
                                                   
                                                    <div class="student-dtl" style="display:flex; justify-content: space-evenly;"> 
                                                                        <a href="" class="button" id="PopoverCustomT-1"><div class="flip-box">
                                                                                            <div class="flip-box-inner">
                                                                                                <div class="flip-box-front">
                                                                                                <img src="{{asset('images/illimitis/reasigner1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                                                </div>
                                                                                                    <div class="flip-box-back">
                                                                                                    <p>Assigner</p>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div></a>
                                                                        <a href="" class="button" id="PopoverCustomT-1"><div class="flip-box">
                                                                                            <div class="flip-box-inner">
                                                                                                <div class="flip-box-front">
                                                                                                <img src="{{asset('images/illimitis/asigner.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                                                </div>
                                                                                                    <div class="flip-box-back">
                                                                                                    <p>Re-assigner</p>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div></a>                
                                                                       </div>                                                 
                                                </td>

                                            </tr>
                                            @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                <h5> @if (session('messageResponsable'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('messageResponsable') }}
                                                </div>  
                                            @endif</h5>
                                    <div class="card-header">Les actions pour lesquelles je suis Backup
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                                <th>Responsable</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <th class="text-center">Durée</th>
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">Commentaire</th>
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_bakups as $action)
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                <td class="text-center">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>                                                
                                                @endif   
                                                <td class="text-center">{{$action->note}}</td>
                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                
                                                <td class="text-center">
                                                   <div class="student-dtl" style="display:flex; justify-content: space-evenly;">
                                                       <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Mettre a jour votre action">
                                                        <a id="PopoverCustomT-1" href="{{route('action_user_futilisateur.editer', $action->id)}}" class="button">
                                                            <div class="flip-box">
                                                                <div class="flip-box-inner">
                                                                    <div class="flip-box-front">
                                                                        <img src="{{asset('images/illimitis/maj1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                    </div>
                                                                     <div class="flip-box-back" style="color: #5cc57e"> 
                                                                        <i class="fas fa-cloud-upload-alt" style="font-size:25px; width:30px; height:30px;"></i> 
                                                                    </div>
                                                                </div>
                                                            </div>                                      
                                                        </a>
                                                      </span>  
                                                   <!-- @if($action->pourcentage == 100)
                                                        
                                                        <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true" >
                                                            
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content" >
                                                                    <center> 
                                                                            <div class="flip-box-front">
                                                                              <img src="{{asset('images/illimitis/collobo.jpeg')}}" alt="Paris" style="width:150px;" disabled>
                                                                            </div> 
                                                                    </center>

                                                                    <div class="modal-header" style="margin-top:20px;">                                                                        
                                                                        <h4 class="modal-title w-100" id="myModalLabel"><b style="font-size:12px;">Êtes-vous vraiment sûre de vouloire clôturer l'action?</b></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">                                        
                                                                        <div id="selectDiv{{$action->id}}">
                                                                            <input type="hidden" id="suiviID{{$action->id}}" value="{{$action->id}}">
                                                                            <div class="check">                                                                           
                                                                            <center>   
                                                                                <input id="loginVisibilite{{$action->id}}" type="radio" name="visibilite" value="1"><b style="font-size:15px; margin-left:10px; color:green;">OUI</b>
                                                                                <input id="loginnVisibilite{{$action->id}}" type="radio" name="visibilite" value="0"><b style="font-size:15px; margin-left:10px; color:red">non</b>
                                                                            </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success btn-sm">Valider</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <button type="button" id="PopoverCustomT-1" data-toggle="modal" data-target="#centralModalSm">                                                
                                                            <div id="myBtn" class="button" style="color:green;">
                                                                <div class="flip-box">
                                                                    <div class="flip-box-inner">
                                                                        <div class="flip-box-front">
                                                                            <img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                        </div>
                                                                        <div class="flip-box-back">
                                                                        <p style="margin-left:-12px; font-size:11px;".>Clôture</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </button>
                                                        @else
                                                        <button type="button" data-toggle="modal" id="PopoverCustomT-1" data-target="#centralModalSm" disabled>
                                                            <div id="myBtn" class="button" style="color:green;">
                                                                <div class="flip-box">
                                                                    <div class="flip-box-inner" disabled>
                                                                        <div class="flip-box-front" disabled>
                                                                            <img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;" disabled>
                                                                        </div>
                                                                        <div class="flip-box-back" disabled>
                                                                        <p style="margin-left:-12px; font-size:11px;". disabled>Clôture</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        @endif -->
                                                    </div>
                                                </td>

                                            </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                <h5> @if (session('messageResponsable'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('messageResponsable') }}
                                                </div>  
                                            @endif</h5>
                                    <div class="card-header">Les actions de ma direction
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                                <th>Responsable</th>
                                                <th>Back-up</th>  
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <th class="text-center">Durée</th>
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">Commentaire</th>
                                                // <th class="text-center">Options</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_directions as $action)
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                <td class="text-center">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</td>
                                                <td class="text-center">{{substr($action->bakup, 0, 3)}}</td>
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50)
                                                <td class="text-center"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;">{{$action->pourcentage}}%</div></td>                                                
                                                @endif   
                                                <td class="text-center">{{$action->note}}</td>
                                                    <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                    <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                    <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                    <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                
                                                // <td class="text-center">
                                                //   <div class="student-dtl" style="display:flex; justify-content: space-evenly;">
                                                //        <a id="PopoverCustomT-1" href="{{route('action_user_fresponsable.editer', $action->id)}}" class="button">
                                                //            <div class="flip-box">
                                                //                <div class="flip-box-inner">
                                                //                    <div class="flip-box-front">
                                                //                        <img src="{{asset('images/illimitis/maj1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                //                    </div>
                                                //                    <div class="flip-box-back">
                                                //                    <p>MAJ</p>
                                                //                    </div>
                                                //                </div>
                                                //            </div>                                      
                                                //        </a>
                                                //        
                                                //  
                                                //    </div>
                                                // </td>

                                            </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->

                    </div>
                    <style>

.flip-box {
background-color: transparent;
width: 25px;
height: 25px;
border: 1px solid #f1f1f1;
perspective: 1000px;
}

.flip-box-inner {
position: relative;
width: 100%;
height: 100%;
text-align: center;
transition: transform 0.8s;
transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
transform: rotateY(180deg);
}

.flip-box-front, .flip-box-back {
position: absolute;
width: 100%;
height: 100%;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}

.flip-box-front {

color: black;
}

.flip-box-back {
background-color: white;
color: green;
text-align: center;
transform: rotateY(180deg);
}
</style> 

<style>

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
margin-left: 90px;
margin-top: 150px;
width: 250px; /* Full width */
height: 80px; /* Full height */


}

/* Modal Content */
.modal-content {
background-color: #fefefe;
margin: auto;
padding: 20px;
border: 1px solid #888;
width: 100%;
height: 100%;
}

/* The Close Button */
.close {
color: #aaaaaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: #000;
text-decoration: none;
cursor: pointer;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){

@foreach($action_respons as $suivi)

$("#loginVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);  
}
});
}

});

$("#loginnVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginnVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',  
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);
}
});
}

});
@endforeach
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
$(document).ready(function(){

@foreach($action_bakups as $suivi)

$("#loginVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);  
}
});
}

});

$("#loginnVisibilite{{$suivi->id}}").change(function(){  
var visibilite = $("#loginnVisibilite{{$suivi->id}}").val();
var suiviID = $("#suiviID{{$suivi->id}}").val()
if(visibilite==""){
alert("please select an option");
}else{
$.ajax({
url: '{{url("/admin/banSuivi")}}',  
data: 'visibilite=' + visibilite + '&suiviID=' + suiviID,
type: 'get',
success:function(response){
console.log(response);
}
});
}

});
@endforeach
});
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>

<style>
  
.popup{
    cursor:pointer;
}

.pop{
    display: none; /* Hidden by default */
    border-radius: 10px;
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 42%;
    top: 30%;
    overflow: auto; /* Enable scroll if needed */
    width: 25%; /* Full width */
     /* Full height */
    padding-top:0px;
    /* Animation ins */
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@keyframes animatetop {
from {top: -300px; opacity: 0}
to {top: 0; opacity: 1}
}
</style>

<script>
// Get the modal
var pop = document.getElementById("pop");

// Get the button that opens the modal
var popup = document.getElementById("popup");

// Get the element that closes the modal
var popclose = document.getElementById("popClose");

popclose.onclick = function(){
    var modal = document.getElementById('modals');
    modal.style.display = "none";
}
// When the user clicks the button, open the modal 
function display() {
    var pop = document.getElementById("pop");
    pop.style.display = "block";
}


// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
if (event.target == pop) {
pop.style.display = "none";
}
}

function check(){
    var radios = document.querySelectorAll('.radios');

    for(var i = 0; i<radios.length; i++){
        if(radios[i].checked.value='O'){
            alert("Bien joué {{Auth::user()->prenom}} 💯 | Action cloturé avec succés." );
        }
    }
}
</script>