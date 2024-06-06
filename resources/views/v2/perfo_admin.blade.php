<div class="app-page-title">
                           
                           <div class="row">
                               <div class="col-md-6 col-lg-4">
                                   <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                                       <div class="widget-content">
                                           <div class="widget-content-outer">
                                               <div class="widget-content-wrapper">
                                                  @if(intval($sum_actions/count($actions)) == 100)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-success">{{intval($sum_actions/count($actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{intval($sum_actions/count($actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @elseif(intval($sum_actions/count($actions)) >= 50)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-warning">{{intval($sum_actions/count($actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{intval($sum_actions/count($actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @else
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-danger">{{intval($sum_actions/count($actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{intval($sum_actions/count($actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @endif
                                               </div>
                                               <div class="widget-content-left fsize-1">
                                                   <div class="text-muted opacity-6">Ma Performance</div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6 col-lg-4">
                                   <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                                       <div class="widget-content">
                                           <div class="widget-content-outer">
                                               <div class="widget-content-wrapper">                               
                                                   @if(intval($sum_directions/count($action_directions))== 100)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-success">{{intval($sum_directions/count($action_directions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{intval($sum_directions/count($action_directions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @elseif(intval($sum_directions/count($action_directions)) >= 50)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-warning">{{intval($sum_directions/count($action_directions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{intval($sum_directions/count($action_directions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @else
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-danger">{{intval($sum_directions/count($action_directions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{intval($sum_directions/count($action_directions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @endif
                                               </div>
                                               <div class="widget-content-left fsize-1">
                                                   <div class="text-muted opacity-6">Performance de ma direction</div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6 col-lg-4">
                                   <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                                       <div class="widget-content">
                                           <div class="widget-content-outer">
                                               <div class="widget-content-wrapper">
                                                   @if(intval($sum_suivi_actions/count($suivi_actions))== 100)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-success">{{intval($sum_suivi_actions/count($suivi_actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($suivi_actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= 50)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-warning">{{intval($sum_suivi_actions/count($suivi_actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($suivi_actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                    @elseif(intval($sum_suivi_actions/count($suivi_actions)) >= 50)
                                                   <div class="widget-content-left pr-2 fsize-1">
                                                       <div class="widget-numbers mt-0 fsize-3 text-danger">{{intval($sum_suivi_actions/count($suivi_actions))}}%</div>
                                                   </div>
                                                   <div class="widget-content-right w-100">
                                                       <div class="progress-bar-xs progress">
                                                           <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{intval($sum_suivi_actions/count($suivi_actions))}}" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                                       </div>
                                                   </div>
                                                   @endif   
                                               </div>
                                               <div class="widget-content-left fsize-1">
                                                   <div class="text-muted opacity-6">Performance de ma Team</div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                           </div>
                           
                       </div>         