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
    class court{
        public $id;
        public $surface_type;
        public $name;
        public $image_url;
        public $description;
        public $club_id;
    }
    
    require_once 'DAO.php';
    if(!isset($_SESSION)) session_start();
    if($_SESSION["player"] != "")
    {        
        $dao = new DAO();
        $id = $_SESSION["player"];
        $player = new player();
        $player = $dao->getPlayerById($id["id"]);
        $playerList = $dao->getAllPlayers();
        $courtList = $dao->getAllCourts();
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <title>Player Panel</title>
</head>
<body>

    <?php 
        // require_once 'DAO.php';
        // $dao = new DAO();
        require 'partials/navbar.html';
        // $link = "match.php?";
      
        // if(isset($_GET["court"])){
        //    $_SESSION["court"] = $_GET["court"];
        // }
        // if(isset($_GET["player"])){
        //     $_SESSION["playerget"] = $_GET["player"];
        // }
        // if(isset($_SESSION["court"])){
        //     $link.="courtID=".$_SESSION["court"];
        // }
        // if(isset($_SESSION["playerget"])){
        //     $link.="&playerID=".$_SESSION["playerget"];
        // }
        // echo $link;
        
    ?>
    <div class="container mt-5">
        <h1>Izaberite teren</h1>
        <div class="row mt-5">
        <?php 
        foreach($courtList as $court){
            echo '
            <div class="col-md-4">
            <div class="card card-custom" style="width: auto;border-radius:1rem">
            <img class="card-img-top" src="'.$court["image_url"].'" alt="Card image cap" style="height:200px">
            <div class="card-body">
            <h5>'.$court["name"].'</h5>
            <span class="badge badge-danger">'.$court["surface_type"].'</span>
            <div class="mt-2" id="overflowTest">'.$court["description"].'</div>
            <form>
            </form>
            </div>
            </div>
            </div>'
        ;
        }
        ?>
        </div>        <hr>

        
        <h1 class="mt-4">Izaberite protivnika</h1>
        <div class="row">
            <?php 
            foreach($playerList as $player){
                if($player["id"] != $_SESSION["player"]["id"]){
                $percentage = round(($player["matches_won"]/($player["matches_won"]+$player["matches_lost"]))*100,0);
                echo '
                <div class="col-md-4 mt-5">
                <div class="card card-custom" style="width: auto;border-radius:1rem">
                <img class="img-fluid mx-auto mt-4 " src="'.$player["image_url"].'" style="max-width:100px;border-radius:50%;border:1px solid lightgray">
                <div class="card-body">
                <h5>'.$player["name"].' '.$player["surname"].'</h5>
                <span class="badge badge-danger">'.$player["gender"].'</span>
                
                <p> Procenat pobeda </p>
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: '.$percentage.'%" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="text-center"> '.$percentage.'% </p>

                <form>
                </form>
                </div>
                </div>
                </div>
               
                ';
            }
            }
            ?>
        </div>
        <hr>
        <form action="controllerTemplate-basic.php" method="POST">
            <select name="courtid" class="form-select mx-auto d-block my-3" aria-label="Default select example">
            <option disabled selected>Izaberite svoj teren</option>
                                <?php 
                                    $dao = new DAO();
                                    foreach($courtList as $value){
                                        echo '<option id="c'.$value["id"].'" value="'.$value["id"].'">'.$value["name"].'</option>';
                                    }
                                    ?>
                                </select> 
            <select name="oppid" class="form-select mx-auto d-block my-3" aria-label="Default select example">
            <option disabled selected>Izaberite svog protivnika</option>

                                <?php 
                                    $dao = new DAO();
                                    foreach($playerList as $value){
                                        if($value["id"] != $_SESSION["player"]["id"]){
                                        echo '<option id="player'.$value["id"].'" value="'.$value["id"].'">'.$value["name"].'</option>';}
                                    }
                                    ?>
                                </select>
        <input type="date" id="date" name="vreme" min="datetime-local"> 
            <input type="time" id="appt" name="appt"
                min="09:00" max="18:00" required>

            <select name="statusid" class="form-select mx-auto d-block my-3" aria-label="Default select example">
            <option disabled selected>Izaberite status meca</option>

                                <?php 
                                    $dao = new DAO();
                                    $matchstatusList = $dao->getAllMatchStatus();
                                    foreach($matchstatusList as $value){
                                        echo '<option id="' .$value["id"].'" value="'.$value["id"].'">'.$value["status"].'</option>';}
                                    ?>
                                </select>
            <select name="categoryid" class="form-select mx-auto d-block my-3" aria-label="Default select example">
            <option disabled selected>Izaberite kategoriju</option>

                                <?php 
                                    $dao = new DAO();
                                    $matchstatusList = $dao->getAllCategorty();
                                    foreach($matchstatusList as $value){
                                        echo '<option id="' .$value["id"].'" value="'.$value["id"].'">'.$value["name"].'</option>';}
                                    ?>
                                </select>

                <button type="submit" name="action" value="mec" class="btn mx-auto d-block w-25" style="background-color: #056839; color: white; font-weight: 700;">Unesi meč</button>
                

        </form>
        <hr>

            <!-- IZABRAN -->
        
    </div>
        
    <?php include_once'../includes/footer.php' ?>
</body>
</html>
<?php }
    else{
        header('location:login.php');
    }
    ?>