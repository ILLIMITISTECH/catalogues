<style>
.dot {
  height: 25px;
  width: 25px;
  background-color: lightgreen;
  border-radius: 50%;
  display: inline-block;
}
</style>
<div class="navbar navbar-fixed-top" >
            <div class="navbar-inner" style="height:60px;">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a href="#"><img src="{{asset('images/illimitis/collobo.jpeg')}}" alt="" style="width:220px;"></a>
                    <div class="nav-collapse collapse" style="margin-top:-40px;">
                        <ul class="nav pull-right">
                             <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="text-align:center;"> <i class="icon-u"></i><span class="dot">{{substr(Auth::user()->prenom,0,1)}}{{substr(Auth::user()->nom,0,1)}}</span><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profil</a>
                                    </li> 
                                    <li class="divider"></li>
                                    <li>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                                    </li>
                                </ul>
                            </li>
                        </ul>
                       
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>