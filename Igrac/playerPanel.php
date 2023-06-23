<?php
     class player{
        public $id;
        public $name;
        public $matches_lost;
        public $matches_won;
        public $surname;
        public $gender;
        public $image_url;
        public $club_id;
        public $username;
        public $password;
    }
    require_once 'DAO.php';
    if(!isset($_SESSION)) session_start();
    if($_SESSION["player"] != "")
    {        
        $dao = new DAO();
        $id = $_SESSION["player"];
        $player = new player();
        $player = $dao->getPlayerById($id["id"]);
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
    <title>Rekreativni tenis | Korisnički Panel</title>
</head>
<body>
    <?php 
        require_once 'DAO.php';
        $dao = new DAO();
        require 'partials/navbar.html';

    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <div class="card mt-5" style="width: 20rem;border-radius: 1rem; box-shadow: 0px 0px 34px -10px rgba(0,0,0,0.33);">
                    <img class="card-img-top img-fluid" src="img/clubs.jpg" alt="Card image cap">
                    <div class="card-body p-4">
                        <h1 class="mb-3">Klubovi</h1>
                        <?php 
                            $clubList = $dao->getAllClubs();
                            foreach($clubList as $value){
                                echo  '
                                <div class="row w-100 mt-2">
                                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                                        <img class="img-fluids" src="'.$value["image_url"].'" style="width:30px;">
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center justify-content-center">
                                        <p class="w-100 mb-0"> '.$value["name"].'<p>
                                    </div>
                                </div>';
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ml-2">
                <div class="card mt-5" style="width: auto;border-radius: 1rem; box-shadow: 0px 0px 34px -10px rgba(0,0,0,0.33);">
                        <!-- <img class="card-img-top img-fluid" src="img/player.webp" alt="Card image cap"> -->
                        <div class="card-body p-4">
                            <div class="row">
                            </div>
                                    <h1 class="mb-3">Predstojeći mečevi</h1>
                            <!-- <div class="row my-5">
                                    <button type="button" class="btn btn-primary btn-male mx-auto d-block">Muškarci</button>
                                    <button type="button" class="btn btn-danger btn-female mx-auto d-block">Žene</button>
                            </div> -->
                            <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Igrač 1</th>
                                        <th></th>
                                        <th scope="col">Igrač 2</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Vreme</th>
                                        <th scope="col">Teren</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php
                                $playerList = $dao->getAllPlayers();
                                $matchList = $dao->getAllMatches();
                                $courtList = $dao->getAllCourts();
                                foreach($matchList as $value){
                                    if($value["match_date"] > date("Y-m-d")){
                                    echo '
                                    
                                        <tr class="text-center">
                                        <td> <img class="img-fluid mx-auto d-block" src="'.$playerList[$value["player1_id"]-1]["image_url"].'" style="max-width:50px;border-radius:50%;border:1px solid lightgray"> <p style="font-weight:700;"> '.$playerList[$value["player1_id"]-1]["surname"].' </p></td>
                                        <td> vs </td>

                                        <td> <img class="img-fluid " src="'.$playerList[$value["player2_id"]-1]["image_url"].'" style="max-width:50px;border-radius:50%;border:1px solid lightgray">  <p style="font-weight:700;"> '.$playerList[$value["player2_id"]-1]["surname"].' </p> </td>
                                        <td class="h-100 my-auto d-block"> '.$value["match_date"].' </td>
                                        <td> '.substr($value["match_time"],0,-3).' </td>
                                        <td> '.$courtList[$value["court_id"]]["name"].' </td>
                                        </tr>
                                    
                                    '; }
                                }
                                
                                
                            ?></tbody>
                            </table>
                    </div>
                    <div class="card-body p-4">
                            <div class="row">
                            </div>
                                    <h1 class="mb-3">Završeni mečevi</h1>
                            <!-- <div class="row my-5">
                                    <button type="button" class="btn btn-primary btn-male mx-auto d-block">Muškarci</button>
                                    <button type="button" class="btn btn-danger btn-female mx-auto d-block">Žene</button>
                            </div> -->
                            <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Igrač 1</th>
                                        <th></th>
                                        <th scope="col">Igrač 2</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Vreme</th>
                                        <th scope="col">Teren</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php
                                $playerList = $dao->getAllPlayers();
                                $matchList = $dao->getAllMatches();
                                $courtList = $dao->getAllCourts();
                                foreach($matchList as $value){
                                    if($value["match_date"] < date("Y-m-d")){
                                        
                                   
                                   
                                    echo '
                                    
                                        <tr class="text-center">
                                        <td> <img class="img-fluid mx-auto d-block" src="'.$playerList[$value["player1_id"]]["image_url"].'" style="max-width:50px;border-radius:50%;border:1px solid lightgray"> <p style="font-weight:700;"> '.$playerList[$value["player1_id"]]["surname"].' </p></td>
                                        <td> vs </td>

                                        <td> <img class="img-fluid " src="'.$playerList[$value["player2_id"]]["image_url"].'" style="max-width:50px;border-radius:50%;border:1px solid lightgray">  <p style="font-weight:700;"> '.$playerList[$value["player2_id"]]["surname"].' </p> </td>
                                        <td class="h-100 my-auto d-block"> '.$value["match_date"].' </td>
                                        <td> '.substr($value["match_time"],0,-3).' </td>
                                        <td> '.$courtList[$value["court_id"]]["name"].' </td>
                                        </tr>
                                    
                                    '; }
                                }
                                
                                
                            ?></tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-block btn-danger w-25 mx-auto m-5" href="controllerTemplate-basic.php?logout=true"> <i class="fa fa-sign-out"></i><span>Odjava</span></a>

    <?php include '/xampp/htdocs/ip22-tim4-rekreativni-tenis-development2/includes/footer.php' ?>
</body>
</html>
<?php }
    else{
        header('location:login.php');
    }
    ?>