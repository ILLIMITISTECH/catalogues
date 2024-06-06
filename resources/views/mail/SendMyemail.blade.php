<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="short icon" href="{{asset('collov2/assets/images/icon.png')}}">
        <title>Collaboratis</title>
    </head>
    <body>
        <br>
            <div class="main" style="margin: 0 auto; background: #f7f7f7; padding: 60px 0px; overflow: scroll;">
                <div class="panel panel-default" style="width:65vh; height: 70vh; margin-left:23%; border-radius: 5px; box-shadow: 1px 2px 4px rgb(187, 185, 185); ">
                    <div class="panel-header" 
                           style= "padding: 20px 0px 5px 45px; font-size: 17px; font-weight:lighter; background-color:#56c9cc; color: #5e5d5d; height: 80px;">
                           <h3>Collaboratis</h3>
                    </div>   
                    <div class="panel-body" style= "padding: 50px 0px 5px 45px; font-size: 17px; font-weight:lighter; background-color:white; color: #5e5d5d; height: 300px;" >
                        
                        <!--Hello! <strong>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</strong><br><br><br>
                        Bienvenue sur collaboratis, connecter-vous en cliquant <a href="https://collaboratis.optievent.com/connexion">ici</a>
                        <br><br>
                        Bonne utilisation de Collaboratis !-->
                        <table class="table table-striped table-bordered">
                           
                                      
                                      <p><b>{{$e_message}}</b></p>
                                      <p><b>Merci de valider</b></p>
                                      
                               
                        </table>
                    </div>
                    <br><br>
                </div>
            </div>
    </body>
</html>
