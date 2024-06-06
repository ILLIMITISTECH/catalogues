<div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Membres de mon équipe
                                        <div class="btn-actions-pane-right"> 
                                        </div>
                                    </div>
                                


                                       
                                </div>
                               
                                <div class="row">
                                
                                @foreach($agents as $agent)
                                    <div class="col-md-6 col-lg-3">
                                    
                                        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                                            <div class="widget-content">
                                           
                                                <div class="widget-content-outer">
                                                     <!-- <div class="widget-content-wrapper">
                                                        <div class="widget-content-left pr-2 fsize-1">
                                                            <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                                                        </div>
                                                        <div class="widget-content-right w-100">
                                                            <div class="progress-bar-xs progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71 " aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left pr-2 fsize-1">
                                                            <div class="widget-numbers mt-0 fsize-3">
                                                                @if($agent->photo != null)
                                                                <img width="30" height="30" class="rounded-circle" src="{{ url('images/', $agent->photo) }}" alt="">
                                                                @else
                                                                <img width="30" height="30" class="rounded-circle" src="{{asset('images/contact.png')}}" alt="">
                                                                @endif
                                                            </div> 
                                                        </div>
                                                        <div class="widget-content-right w-100">
                                                            <div class="text-muted opacity-6">
                                                                <b> <a href="{{route('responsable_agent.voir', $agent->id)}}" class="label label-info">{{$agent->prenom}} {{$agent->nom}}</a> </b>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                   
                                </div>
                                @endforeach
                                </div>
                                
                                    <!--<div class="col-md-6 col-lg-3">
                                        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left pr-2 fsize-1">
                                                            <div class="widget-numbers mt-0 fsize-3 text-success">54%</div>
                                                        </div>
                                                        <div class="widget-content-right w-100">
                                                            <div class="progress-bar-xs progress">
                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left fsize-1">
                                                        <div class="text-muted opacity-6">Direction Marketing</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left pr-2 fsize-1">
                                                            <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                                                        </div>
                                                        <div class="widget-content-right w-100">
                                                            <div class="progress-bar-xs progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left fsize-1">
                                                        <div class="text-muted opacity-6">Direction Générale
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left pr-2 fsize-1">
                                                            <div class="widget-numbers mt-0 fsize-3 text-info">89%</div>
                                                        </div>
                                                        <div class="widget-content-right w-100">
                                                            <div class="progress-bar-xs progress">
                                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left fsize-1">
                                                        <div class="text-muted opacity-6">Direction Strategique</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                               
                            </div>
                        </div>
                        