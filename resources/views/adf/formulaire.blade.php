<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de formation>ILLIMITIS</title>
    <link rel="icon" href="{{asset('catalogue/logo.png')}}">

  
</head>
<style>
    
    body
    {
      background-image : url("{{asset('images/back.jpg')}}");
      background-repeat :no-repeat;
      height : 100%;
      background-position : center;
      background-size : cover;
    }
   
</style>
<body>
   
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background:#000000;">
        <div class="container">
           
            <a class="" href="https://catalogue.illimitis.com/">
                <img style="width: 250px; height: 46px;" src="https://plateforme-illimitis.collaboratis.com/illimitis/images/logo.png" alt="logo ILLIMITIS"></a>

            <!--<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">-->
            <!--    <span class="navbar-toggler-icon"></span>-->
            <!--</button>-->

       
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
    
    <main class="container" id=app>
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            @if (session('message'))
              <div class="container" style="text-align : center ; margin : 10% auto 5% auto;">
                    <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                     </div>
              </div>
             
            @endif
            
            <div class="row">
                <div class="col-lg-12">          
             
             <center><img style="width: 100%;" src="{{asset('images/accueil.jpg')}}"></center><br>
             
           <form action="{{route('store_formulaireAdf')}}" method="post" class="form-horizontal" id="demo1-upload" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            
                <!--</div>-->
                <br>
                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label"> Prénom <b style="color: red;">*</b></label>
                        <input type="text" name="prenom" id="firstname" placeholder="Prénom " required
                            class="formbold-form-input" />
                    </div>

                    <div>
                        <label for="lastname" class="formbold-form-label"> Nom <b style="color: red;">*</b></label>
                        <input type="text" name="nom" id="lastname" placeholder="Nom " required
                            class="formbold-form-input" />
                    </div>
                </div>

                <!--<div class="formbold-input-flex">-->
                    <div>
                        <label for="email" class="formbold-form-label">Adresse Email<b style="color: red;">*</b> </label>
                        <input type="email" name="email" id="email" placeholder="Email" class="formbold-form-input" required/>
                    </div>
                    <br>
                    
                <div class="formbold-mb-3 formbold-input-wrapp">
                    <label for="phone" class="formbold-form-label"> Numéro de Téléphone <b style="color: red;">*</b> </label>

                    <div>

                        <input type="text" name="phone" id="phone" placeholder="Numéro de Téléphone"
                            class="formbold-form-input" required/>
                    </div>
                </div>
                
                <div>
                        <label class="formbold-form-label">Genre <b style="color: red;">*</b></label>

                        <select class="formbold-form-input" name="genre" id="occupation" required>
                            <option value="">Choisir</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <!--<option value="others">Autres</option>-->
                        </select>
                    </div>

                <div class="formbold-mb-3">
                    <label for="age" class="formbold-form-label"> Pays <b style="color: red;">*</b></label>
                    <select class="formbold-form-input" name="pays_id" id="occupation" required>
                        <option value="">Sélectionner le pays</option>
                            @foreach($pays as $pay)
                        <option value="{{$pay->id}}">{{$pay->nom_pay}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="formbold-mb-3">
                    <label for="message" class="formbold-form-label">
                        Quels sont vos besoins de formation et d’accompagnement en 2024?
                    </label>
                    <textarea rows="3" name="besoins" id="message" class="formbold-form-input"></textarea>
                </div>



                <button type="submit" class="formbold-btn" style="background:#000000">Valider</button>
            </form>
            </div>
            </div>
        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .formbold-mb-3 {
            margin-bottom: 15px;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 570px;
            width: 100%;
            background: white;
            padding: 40px;
        }

        .formbold-img {
            display: block;
            margin: 0 auto 45px;
        }

        .formbold-input-wrapp>div {
            display: flex;
            gap: 20px;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .formbold-input-flex>div {
            width: 50%;
        }

        .formbold-form-input {
            width: 100%;
            padding: 13px 22px;
            border-radius: 5px;
            border: 1px solid #dde3ec;
            background: #ffffff;
            font-weight: 500;
            font-size: 16px;
            color: #536387;
            outline: none;
            resize: none;
        }

        .formbold-form-input::placeholder,
        select.formbold-form-input,
        .formbold-form-input[type='date']::-webkit-datetime-edit-text,
        .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
            color: rgba(83, 99, 135, 0.5);
        }

        .formbold-form-input:focus {
            border-color: #f16601;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-form-label {
            color: #07074D;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .formbold-form-file-flex {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .formbold-form-file-flex .formbold-form-label {
            margin-bottom: 0;
        }

        .formbold-form-file {
            font-size: 14px;
            line-height: 24px;
            color: #536387;
        }

        .formbold-form-file::-webkit-file-upload-button {
            display: none;
        }

        .formbold-form-file:before {
            content: 'Upload file';
            display: inline-block;
            background: #EEEEEE;
            border: 0.5px solid #FBFBFB;
            box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
            border-radius: 3px;
            padding: 3px 12px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            color: #637381;
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
            margin-right: 10px;
        }

        .formbold-btn {
            text-align: center;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            padding: 14px 25px;
            border: none;
            font-weight: 500;
            background-color: #f16601;
            color: white;
            cursor: pointer;
            margin-top: 25px;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-w-45 {
            width: 45%;
        }
    </style>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
</main>
</body>

</html>