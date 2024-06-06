<div class ="container-fluid" style ="background-color : black; padding : 25px 10px 10px 10px; margin-top : -20px; max-height : 100px;">
              <div class="page-header d-print-none">
                <div class="row align-items-center">
                  <div class="col" style="margin-left : 2%;">
                    <!-- Page pre-title -->
                    <div class="page-pretitle" style ="color : white">
                    
                    </div>
                    <h2 class="page-title" style ="color : white">
                      ILLIMITIS | ESPACE D'ADMINISTRATION
                    </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                     <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#"class="dropdown-item" style="border: 1px solid #3f6ad8; background: #3f6ad8; color:white;" tabindex="0" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                    {{Auth::user()->prenom}}&nbsp;{{Auth::user()->nom}} <br><span style="font-size: 8px;">Déconnexion</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                    </div>
                  </div>
                </div>
              </div>
           </div>