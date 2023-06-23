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
    <title>Player Panel</title>
</head>
<body>
    <?php 
        require_once 'DAO.php';
        $dao = new DAO();
        require 'partials/navbar.html';

    ?>


    <div class="container">
        <div class="row">
            
            <div class="col-md-12 ml-2">
                <div class="card mt-5" style="width: auto;border-radius: 1rem; box-shadow: 0px 0px 34px -10px rgba(0,0,0,0.33);">
                        <!-- <img class="card-img-top img-fluid" src="img/player.webp" alt="Card image cap"> -->
                        <div class="card-body p-4">
                            <div class="row">
                            </div>
                                    <h1 class="mb-3">Statistika igrača</h1>
                            <!-- <div class="row my-5">
                                    <button type="button" class="btn btn-primary btn-male mx-auto d-block">Muškarci</button>
                                    <button type="button" class="btn btn-danger btn-female mx-auto d-block">Žene</button>
                            </div> -->
                            <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Wins</th>
                                        <th scope="col">Lost</th>
                                        <th scope="col">Win Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                                $playerList = $dao->getAllPlayers();
                                foreach($playerList as $value){
                                    if($value["matches_won"] > 0 || $value["matches_lost"] > 0){
                                        $perc = ($value["matches_won"]/($value["matches_lost"]+$value["matches_won"]))*100;
                                        $smile = "";
                                        switch($perc){
                                            case $perc > 80:
                                                $smile = '<i class="fa-solid fa-face-grin-stars" style="color:green"></i>';
                                                break;
                                            case $perc > 60:
                                                $smile = '<i class="fa-solid fa-face-grin" style="color:yellow" ></i>';
                                                break;
                                            case $perc < 60:
                                                    $smile = '<i class="fa-solid fa-face-frown" style="color:red"></i>';
                                                    break;
                                        }
                                    }
                                    else $perc = "No matches played";
                                    // echo  '
                                    // <div class="row border rounded w-100 mt-4">
                                    //     <div class="col-md-2 d-flex align-items-center justify-content-center">
                                    //         <img class="img-fluid" src="'.$value["image_url"].'" style="width:50px;border-radius:50%;border:1px solid lightgray">
                                    //     </div>
                                    //     <div class="col-md-9 d-flex align-items-center justify-content-center">
                                    //         <p class="w-100 mb-0"> '.$value["name"].' '.$value["surname"].' <span class="font-weight-bold"> '.$value["matches_won"].'</span>/'.$value["matches_lost"].'  <p>
                                    //     </div>
                                    // </div>';
                                    echo '
                                    
                                        <tr>
                                        <td> <img class="img-fluid " src="'.$value["image_url"].'" style="max-width:50px;border-radius:50%;border:1px solid lightgray"></td>
                                        <td class="h-100 my-auto d-block"> '.$value["name"].' </td>
                                        <td> '.$value["surname"].' </td>
                                        <td> '.$value["matches_won"].' </td>
                                        <td> '.$value["matches_lost"].' </td>
                                        <td> '.number_format((float)$perc, 2, '.', '').'% '.$smile.'</td>
                                        </tr>
                                    
                                    ';
                                }
                                
                            ?></tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '/xampp/htdocs/ip22-tim4-rekreativni-tenis-development2/includes/footer.php' ?>
</body>
</html>
<?php }
    else{
        header('location:login.php');
    }
    ?>