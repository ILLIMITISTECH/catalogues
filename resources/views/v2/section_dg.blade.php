@if(Session::has("success"))
                                            <div class="alert alert-success">
                                            <b>Action clôturée avec succès.</b> 
                                            </div>
                                            @endif
<div class="row">
                            <div class="col-md-12">
                                <h5>@if (session('message'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('message') }}
                                </div>  
                                @endif
                                </h5>
                                <h5>@if (session('cloture'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('cloture') }}
                                </div>  
                                @endif
                                </h5>
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Mes actions en instance
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libellé</th>
                                                <th>Backup</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <!--<th class="text-center">Durée</th>-->
                                                <th>Pourcentage</th>
                                                <th class="text-center">Derniere MAJ</th>
                                                <th class="text-left">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_respons as $action)  
                                            @if($action->raison == 0)
                                            @if($action->visibilite == 0)
                                            <tr>
                                            <!--<form action="/save_action" method="post" id="target">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>-->
                                                <td class="">{{$action->libelle}}</td>
                                                
                                                @foreach($my_agents as $age)
                                                @foreach($agents as $agen)
                                                @if($action->bakup == $age->full_name && $agen->id == $age->id)
                                                
                                                @if($action->niveau_hieracie =='Directeur')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <!--<td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} j</td>-->
                                                
                                                <!-- Pourcentage des actions -->
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 4px 4px 10px #49a797;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :{{$action->note}}"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 3px 3px 8px #f49731;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50 && $action->pourcentage >= 20)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td> 
                                                 @elseif($action->pourcentage < 20 && $action->pourcentage >= 10 )
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;color:white;font-weight:bold;box-shadow: 2px 2px 6px #da4251;">{{$action->pourcentage}}%</div></td>                                                
                                                @elseif($action->pourcentage < 10)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-default" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;color:black; font-weight:bold; box-shadow: 4px 3px 6px #f7f7f7;background:white;">{{$action->pourcentage}}%</div></td>
                                                @endif  
                                             
                                                <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                   
                                                <!-- Derniere MAJ -->                     
                                                @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 0)
                                                  @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) > 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/3600)}} heures</td>
                                                  @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) == 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/60)}} minutes</td>
                                                  @endif
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 1)
                                                <td class="text-center">Hier à {{strftime("%H:%M", strtotime($action->updated_at))}}</td>
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) >= 2 && intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) <= 27)
                                                <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400)}} jours </td>
                                                @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) > 27)
                                                <td class="text-center">Le {{strftime("%d/%m/%Y", strtotime($action->updated_at))}}</td>
                                                @endif
                                                
                                                <td class="text-center">
                                                   <div class="student-dtl" style="display:flex;">
                                                       
                                                       
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Mettre à jour votre action">
                                                            <a id="PopoverCustomT-1" href="{{route('action_user_d.editer', $action->id)}}" class="button" style="padding:0px 20px; height:18px; background:#49a797">
                                                                <i class="fas fa-sync" style="font-size: 15px; color:black;"></i>
                                                            </a>
                                                        </span>
                                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   
                                                        
                                                       @if($action->pourcentage == 100)
                                                                            <!--<span class="d-inline-block" data-toggle="tooltip" title="Clôturer votre action" >
                                                                                <span id="popup" class="btn mr-2 mb-2 popup" onclick="display()">                                                
                                                                                    <div id="myBtn" class="button" style="margin-top:-4px;padding:0px 18px; height:17px; background:#49a797; margin-left:-13px;">
                                                                                          <i class="fas fa-clipboard-check" style="font-size: 15px; color:black;"></i>
                                                                                            Change class .modal-sm to change the size of the modal -->
                                                                                               <!-- <div id="modals" class="modal-contents" data-toggle="popover" data-container="#popup" >
                                                                                                    <div id="pop" style="font-family: 'PT Sans', sans-serif; font-weight:lighter; background-color: white" class="pop" style="">
                                                                                                   
                                                                                                        <div class="modal-body">      
                                                                                                            <h4 class="modal-title w-100" id="myModalLabel"><b style="font-size:12px;">Voulez-vous clôturer cette action?</b></h4>
                                                                                                            
                                                                                                            <div id="selectDiv{{$action->id}}">
                                                                                                                <input type="hidden" id="suiviID{{$action->id}}" value="{{$action->id}}">
                                                                                                                <div class="check">                                                                           
                                                                                                                <center>   
                                                                                                                    <input id="loginVisibilite{{$action->id}}" type="radio" name="visibilite" value="1"><b style="font-size:15px; margin-left:10px; color:#49a797;">OUI</b>
                                                                                                                    <input id="loginnVisibilite{{$action->id}}" type="radio" name="visibilite" value="0"><b style="font-size:15px; margin-left:10px; color:#ed4635;">NON</b>
                                                                                                                </center>
                                                                                                                </div>
                                                                                                                <br>
                                                                                                            </div>
                                                                                                            
                                                                                                            <button id="popClose" type="button" class="btn btn-secondary btn-sm popClose" data-dismiss="modal">Fermer</button>
                                                                                                            <button type="submit" class="btn btn-success btn-sm" style="background:#49a797;">Valider</button>
                                                                                                        </div>
                                                                                                    
                                                                                                    </div>
                                                                                                </div>
                                                                                             end of modal -->   
                                                                                            
                                                                                        <!--<div class="flip-box" style="margin-left: -15px; margin-top:-5px;" style="padding:2 5px; background:#56c8cc">
                                                                                            <div class="flip-box-inner">
                                                                                                <div class="flip-box-front">
                                                                                                     <!--<img src="{{asset('images/illimitis/cloture1.jpeg')}}" alt="Paris" style="height:25px; width:25px;">
                                                                                                  
                                                                                                </div>
                                                                                                <div class="flip-box-back" style="color: #5cc57e" disabled>
                                                                                                <i class="fas fa-clipboard-check" style="margin-left: -4px; font-size: 23px; width:30px;"></i>
                                                                                                <!--<p style="font-size:11px; color:black;" disabled>Clôture</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> 
                                                                                    </div>    
                                                                                </span>
                                                                            </span>-->
                                                                        <form action="{{route('visibilite.cloture', $action->id)}}" method="post" id="target" class="form">
                                                                         <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Clôturer votre action">
                                                                            <button data-toggle="modalsss" type="submit" id="PopoverCustomT-1" data-target="#centralModalSmss" style="margin-top:2px; padding: 0px 18px; height:18px; background:#49a797; border:none;">
                                                                                <div id="myBtnss" class="button" >
                                                                                     <i class="fas fa-check" style="font-size: 15px; margin-top:-80px; color:black;"></i>
                                                                                </div>
                                                                            </button>
                                                                            </span>
                                                                        </form>
                                                                            @else  
                                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Clôturer votre action">
                                                                            <span data-toggle="modal" id="PopoverCustomT-1" data-target="#centralModalSm" disabled>
                                                                                <div id="myBtn" class="button" style="margin-top:2px; padding: 0px 18px; height:18px; background: #666768">
                                                                                    <i class="fas fa-check" style="font-size: 15px; margin-top:-80px; color:black;"></i>
                                                                                </div>
                                                                            </span>
                                                                            </span>
                                                                            @endif 
                                                    </div>
                                                </td>
                                           
                                            </tr>
                                           @endif
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


                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Actions escaladées par ma Team
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libellé</th>
                                                <th>Responsable</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <!--<th class="text-center">Durée</th>-->
                                                <th class="text-center">Pourcentage</th>
                                               <th class="text-center">MAJ :</th> 
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_escalades as $action)
                                            
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                                @foreach($my_agents as $age)
                                                @foreach($agents as $agen)
                                                @if($action->action_respon == $age->full_name && $agen->id == $age->id)
                                                
                                                @if($action->niveau_hieracie =='Directeur')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                <td data-toggle="tooltip" data-placement="left" title="{{$agen->prenom}} {{$agen->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($agen->prenom, 0, 1)}} {{substr($agen->nom, 0, 1)}}</span></td>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                                
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <!--<td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>-->
                                                
                                                
                                               <!-- Pourcentage des actions -->
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :{{$action->note}}"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50 && $action->pourcentage >= 20)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td> 
                                                 @elseif($action->pourcentage < 20 && $action->pourcentage >= 10 )
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;color:white;font-weight:bold;">{{$action->pourcentage}}%</div></td>                                                
                                                @elseif($action->pourcentage < 10)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 : {{$action->note}}"><div class="progress-bar bg-default" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;color:black; font-weight:bold; box-shadow: 4px 3px 6px #f7f7f7;  background:white;">{{$action->pourcentage}}%</div></td>
                                                @endif    
                                                
                                                <!-- Derniere MAJ -->
                                                @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 0)
                                                  @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) > 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/3600)}} heures</td>
                                                  @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) == 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/60)}} minutes</td>
                                                  @endif
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 1)
                                                <td class="text-center">Hier à {{strftime("%H:%M", strtotime($action->updated_at))}}</td>
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) >= 2 && intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) <= 27)
                                                <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400)}} jours </td>
                                                @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) > 27)
                                                <td class="text-center">Le {{strftime("%d/%m/%Y", strtotime($action->updated_at))}}</td>
                                                @endif
                                                
                                                <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                
                                                <td class="text-center">
                                                    <!-- <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">
                                                        Details
                                                    </button>   --> 
                                                    <div class="student-dtl" style="display:flex; justify-content: space-evenly;"> 
                                                    
                                                    @if(count($action_escalades) == 1)
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" style="padding: 1px 18px; background: #49a797">
                                                            <a title="Assigner à un autre collaborateur " href="{{route('action_dg_reasigner.editer', $action->id)}}" class="button" id="PopoverCustomT-1">
                                                                <i class="fas fa-angle-right" style="font-size: 17px; margin-top:-80px; color:black;"></i>
                                                            </a>
                                                        </span> 
                                                       @elseif(count($action_escalades) > 1)
                                                       <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Assigner à un autre collaborateur " style="padding: 1px 18px; background: #49a797">
                                                            <a href="{{route('action_dg_reasigner.editer', $action->id)}}" class="button" id="PopoverCustomT-1">
                                                                <i class="fas fa-angle-right" style="font-size: 17px; margin-top:-80px; color:black;"></i>
                                                            </a>
                                                        </span> 
                                                       @endif
                                                     
                                                        
                                                       @if(count($action_escalades) == 1)
                                                         <span class="d-inline-block" tabindex="0">
                                                            <a title="Réassigner au responsable" href="{{route('action_dg_asigner.editer', $action->id)}}" class="button" id="PopoverCustomT-1" style="padding: 3px 14px; background: #49a797">
                                                                <i class="fas fa-angle-double-left" style="font-size: 17px; margin-top:-80px; color:black;"></i>
                                                            </a>                
                                                        </span>
                                                       @elseif(count($action_escalades) > 1)
                                                         <span class="d-inline-block" tabindex="0" data-placement="left" data-toggle="tooltip" title="Réassigner au responsable">
                                                            <a href="{{route('action_dg_asigner.editer', $action->id)}}" class="button" id="PopoverCustomT-1" style="padding: 3px 14px; background: #49a797">
                                                                <i class="fas fa-angle-double-left" style="font-size: 17px; margin-top:-80px; color:black;"></i>
                                                            </a>                
                                                         </span>
                                                       @endif
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Les actions pour lesquelles je suis Backup
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="">Libellé</th>
                                                <th>Responsable</th>
                                                <th class="text-center">Priorité</th>
                                                <th class="text-center">Échéance</th>
                                                <!--<th class="text-center">Durée</th>-->
                                                <th class="text-center">Pourcentage</th>
                                                <th class="text-center">MAJ :</th>
                                                <th class="text-center">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action_bakups as $action)
                                            <tr>
                                                <td class="">{{$action->libelle}}</td>
                                               @if($action->niveau_hieracie =='Directeur')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #f7b924; border-radius:40px; background:#ffdf6c; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Chef de Service')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #3f6ad8; border-radius:40px; background:#3f6ad8; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie =='Agent')
                                                <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #39c47d; border-radius:40px; background:#7dc48f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @elseif($action->niveau_hieracie == null)
                                                <td data-toggle="tooltip" data-placement="left" title="{{$action->prenom}} {{$action->nom}}"><span  style="border: 1px solid #d2488f; border-radius:40px; background:#d2488f; color:white; font-weight:bold; font-size:15px; padding:5px; text-shadow: 1px 1px 2px black;">{{substr($action->prenom, 0, 1)}} {{substr($action->nom, 0, 1)}}</span></td>
                                                @endif
                                                
                                                @if($action->risque == 'Elevé(E)')
                                                <td class="text-center"><div class="badge badge-danger">Elevé</div></td>
                                                @elseif($action->risque == 'Moins(M)')
                                                <td class="text-center"><div class="badge badge-warning">Moyen</div></td>
                                                @else($action->risque == 'Faible(F)')
                                                <td class="text-center"><div class="badge badge-success">Faible</div></td>
                                                @endif
                                                
                                                <td class="text-center">{{strftime("%d/%m/%Y", strtotime($action->deadline))}}</td>
                                                <!--<td class="text-center">{{ intval(abs(strtotime($date1) - strtotime($action->created_at))/ 86400) }} J</td>-->
                                                
                                                <!-- Pourcentage des actions -->
                                                @if($action->pourcentage > 70)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :&nbsp;{{$action->note}}"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage >= 50 && $action->pourcentage <= 80)
                                                <td class="text-center"  data-toggle="tooltip" data-placement="left" title="Note 💬 :&nbsp;{{$action->note}}"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$action->pourcentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td>
                                                @elseif($action->pourcentage < 50 && $action->pourcentage >= 20)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 :&nbsp;{{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}+2" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;font-weight:bold;">{{$action->pourcentage}}%</div></td> 
                                                 @elseif($action->pourcentage < 20 && $action->pourcentage >= 10 )
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 :&nbsp;{{$action->note}}"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{$action->pourcentage}}+7" aria-valuemin="0" aria-valuemax="100" style="width: {{$action->pourcentage}}%;color:white;font-weight:bold;">{{$action->pourcentage}}%</div></td>                                                
                                                @elseif($action->pourcentage < 10)
                                                <td class="text-center" data-toggle="tooltip" data-placement="left" title="Note 💬 :&nbsp;{{$action->note}}"><div class="progress-bar bg-default" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;color:black; font-weight:bold; box-shadow: 4px 3px 6px #f7f7f7;  background:white;">{{$action->pourcentage}}%</div></td>
                                                @endif  
                                                
                                                <!-- Derniere MAJ -->
                                                @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 0)
                                                  @if(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) > 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/3600)}} heures</td>
                                                  @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 3600) == 0)
                                                  <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/60)}} minutes</td>
                                                  @endif
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) == 1)
                                                <td class="text-center">Hier à {{strftime("%H:%M", strtotime($action->updated_at))}}</td>
                                                @elseif(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) >= 2 && intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) <= 27)
                                                <td class="text-center">il y'a {{intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400)}} jours </td>
                                                @else(intval(abs(strtotime("now") - strtotime($action->updated_at))/ 86400) > 27)
                                                <td class="text-center">Le {{strftime("%d/%m/%Y", strtotime($action->updated_at))}}</td>
                                                @endif
                                                
                                                <input type="hidden" name="deadline" calss="w3-input" value="{{$action->deadline}}">
                                                <input type="hidden" name="pourcentage" calss="w3-input" value="{{$action->pourcentage}}">
                                                <input type="hidden" name="note" calss="w3-input" value="{{$action->note}}">
                                                <input type="hidden" name="action_id" calss="w3-input" value="{{$action->id}}">
                                                
                                                <td class="text-center">
                                                   <div class="student-dtl" style="display:flex; justify-content: space-evenly;">
                                                       <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Mettre à jour votre action">
                                                            <a id="PopoverCustomT-1" href="{{route('action_user_fdirecteur.editer', $action->id)}}" class="button" style="padding:3px 20px;background:#49a797">
                                                                <i class="fas fa-sync" style="font-size: 15px; color:black;"></i>
                                                            </a>
                                                        </span>
                                                     @if($action->pourcentage == 100)
                                                        <button type="button" id="PopoverCustomT-1"  style="padding: 0px 18px; background:#666768; border:none;" data-toggle="modal" data-target="#centralModalSm">                                                
                                                            <div id="myBtn" class="button" style="padding: 0px 18px; background:#49a797; border:none;">
                                                                <i class="fas fa-check" style="font-size: 15px; color:black;"></i>
                                                        </button>
                                                        @else
                                                        <button type="button" data-toggle="modal" id="PopoverCustomT-1" style="padding: 0px 18px; background:#666768; border:none;" data-target="#centralModalSm" disabled>
                                                            <div id="myBtn" class="button" >
                                                                <i class="fas fa-check" style="font-size: 15px; color:black;"></i>
                                                            </div>
                                                        </button>
                                                      @endif 
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
    width: 15%; /* Full width */
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