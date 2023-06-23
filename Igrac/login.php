<?php

    session_start();
  
  if($_SESSION['user_type'] < 1 ){

  header('Location:../view/login.php');
    
  }
  
  if($_SESSION['user_type'] > 2 ){

    header('Location:../view/login.php');
      
    }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c733186886.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        html, body {
     min-height: 100%;}
    </style>
    <title>Rekreativni Tenis | Portal-Login</title>
</head>
<body>
<?php $loginstatus = isset($loginstatus)?($loginstatus):true  ;
        $alert = '<div class="alert mt-2 alert-danger" role="alert">
        Neispravno korisničko ime/lozinka </div>';
  ?>
       <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-6 mt-5 col-sm-none d-flex align-items-center justify-content-center">
                     <img src="img/stripy-36.png" alt="" class="img-fluid" style="max-width: 100%;">
            </div>
            <div class="col-md-6 text-center justify-content-center align-self-center">
                    <h1>Prijavite se na Vaš</h1>
                    <h1 style="color:#056839;font-weight: 900;font-size: 3.5rem;">tennis nalog<img src="img/ball.png" style="height: 1rem;vertical-align: baseline;" alt="ball"></h1>
                        <div class="card mt-5 mx-auto" style="width: auto;max-width: 30rem; border-radius: 1rem; box-shadow: 0px 0px 34px -10px rgba(0,0,0,0.33);">
                            <!-- <img class="card-img-top center-cropped" src="img/court.jpg" alt="Card image cap"> -->
                            <div class="card-body p-4">
                                <form action="controllerTemplate-basic.php" method="POST">
                                    <div class="form-group text-left">
                                        <label for="exampleInputEmail1">Korisničko ime</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="exampleInputPassword1">Šifra</label>
                                        <input type="password" name="password"class="form-control" id="exampleInputPassword1" >
                                    </div>
                                    <button type="submit" name="action" value="login" class="btn mx-auto w-100" style="background-color: #056839; color: white; font-weight: 700;">Prijava</button>
                                    <?php if(!$loginstatus){
                                    echo $alert;
                                    } ?>
                                    <p><br>Nemate otvoren nalog? Kliknite <a href="registration.php" style="font-weight: bold;color: #056839;"> ovde </a> da se registrujete.</p>
                                </form>
                            </div>
                 </div>
            </div>
        </div>
       </div>
</body>
</html>