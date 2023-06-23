<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c733186886.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body class="bg-reg">
<?php require 'DAO.php' ?>
<div class="container">
    <div class="justify-content-center align-self-center">
                <h1 class="text-center">    <i class="fa-solid fa-user-plus fa-sm "></i><br>Kreirajte svoj</h1>
                <h1 class="text-center" style="color:#056839;font-weight: 900;font-size: 3.5rem;">tennis nalog<img src="img/ball.png" style="height: 1rem;vertical-align: baseline;" alt="ball"></h1>
                <div class="card mt-5 mx-auto d-block" style="width: 30rem;border-radius: 1rem; box-shadow: 0px 0px 34px -10px rgba(0,0,0,0.33);">
                        <!-- <img class="card-img-top" src="img/court.jpg" alt="Card image cap"> -->
                    <div class="card-body p-4">
                        <form action="controllerTemplate-basic.php" method="POST">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Ime</label>
                                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prezime</label>
                                <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Korisničko ime</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Lozinka</label>
                                <input type="password" name="password"class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pol (eng.)</label>
                                <input type="text" name="gender" class="form-control" placeholder="male/female" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <select name="clubid" class="form-select mx-auto d-block my-3 option" aria-label="Default select example">
                            <option disabled selected>Izaberite svoj klub</option>
                            <?php 
                                $dao = new DAO();
                                $clubList = $dao->getAllClubs();
                                var_dump($clubList);
                                foreach($clubList as $value){
                                    echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" name="action" value="register" class="btn mx-auto d-block" style="background-color: #056839; color: white; font-weight: 700;">Create account</button>

                        </form>
                    </div>
                </div>
            </div>
    </div>
    
</body>
</html>