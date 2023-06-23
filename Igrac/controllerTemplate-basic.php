<?php
    require_once 'DAO.php';
    session_start();
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija

if ($_SERVER['REQUEST_METHOD']="POST"){
    $dao = new DAO();
    if ($action == 'login') {
    $username = isset($_POST["username"])? test_input($_POST["username"]) : ""; 
    $password = isset($_POST["password"])? test_input($_POST["password"]) : "";

        if(!empty($username) && !empty($password)){
                $postoji = $dao->playerLogin($username,$password);
                if($postoji == true){
                    $loginstatus = true;
                    $id = $dao->LoginID($username,$password);
                    $_SESSION["player"]= $id;
                    include_once 'playerPanel.php';
                }
                else{
                    $loginstatus = false;
                    include_once 'login.php';
                }
            }
            else{
                $loginstatus = false;
                include_once 'login.php';
            }
        }
    if ($action == 'register') {
        // REGISTRACIJA
        $username = isset($_POST["username"])? test_input($_POST["username"]) : ""; 
        $password = isset($_POST["password"])? test_input($_POST["password"]) : "";
        $firstname = isset($_POST["firstname"])? test_input($_POST["firstname"]) : ""; 
        $lastname = isset($_POST["lastname"])? test_input($_POST["lastname"]) : "";
        $gender = isset($_POST["gender"])? test_input($_POST["gender"]) : "";
        $clubid = isset($_POST["clubid"])? test_input($_POST["clubid"]) : "";
        if(!empty($username) && !empty($password)){
            $dao->createPlayer($firstname,$lastname,$gender,$username,$password,$clubid);
            echo '<h1> Uspešno ste kreirali nalog! </h1> <a href="login.php"> Vratite se nazad na login stranu.</a> ';  

        }else{
            $msg = "You need to fill all inputs.";
        }
            
    } 
    // ZAKAZIVANJE MECEVA
    elseif ($action == 'mec') {
        $courtID = isset($_POST["courtid"])? test_input($_POST["courtid"]) : ""; 
        $oppID = isset($_POST["oppid"])? test_input($_POST["oppid"]) : ""; 
        $date =  date('Y-m-d', strtotime($_POST["vreme"])); 
        $time =  ($_POST["appt"]); 
        $statusID = isset($_POST["statusid"])? test_input($_POST["statusid"]) : ""; 
        $categoryID = isset($_POST["categoryid"])? test_input($_POST["categoryid"]) : ""; 
        
        $id = $_SESSION["player"]["id"];
        $player1Name = $dao->getPlayerById($id)["name"];
        $p1 = $player1Name." - ".$id;


        $oppName = $dao->getPlayerById($oppID)["name"];
   
        $opponent=$oppName." - ".$oppID;

        $matchesList = $dao->getAllMatches();
        $zauzet = false;
        foreach($matchesList as $match){
            if($match["court_id"] == $courtID && $match["match_date"] == $date && substr($match["match_time"],0,-3) == $time){
                $zauzet = true;
            }
            else {$zauzet = false;}
        }
        echo $zauzet;
        if($zauzet == false){
            $dao->createMatch($date,$time,"/",$courtID,$id,$oppID,3,$categoryID);
            echo 'Uspešno ste zakazali meč, srećno!';
            echo '<a href="playerPanel.php"> Vrati se na pocetnu stranu. </a>';
        }
        else{
            echo 'Termin je zauzet';
            echo '<a href="playerPanel.php"> Vrati se na pocetnu stranu. </a>';

        }

    } 
    // UPDATE PLAYER
    elseif ($action == 'update') {

        $id = $_SESSION["player"]["id"];
        $player = $dao->getPlayerById($id);
        
        $firstname = isset($_POST["firstname"])? test_input($_POST["firstname"]) : ""; 
        $lastname = isset($_POST["lastname"])? test_input($_POST["lastname"]) : ""; 
        $username = isset($_POST["username"])? test_input($_POST["username"]) : ""; 
        $imgURL = isset($_POST["image_url"])? test_input($_POST["image_url"]) : ""; 
        $clubid = isset($_POST["clubid"])? test_input($_POST["clubid"]) : "";
        $passwordOLD = isset($_POST["passwordOLD"])? test_input($_POST["passwordOLD"]) : ""; 
        $password1 = isset($_POST["password1"])? test_input($_POST["password1"]) : ""; 
        $passwordNEW = isset($_POST["passwordNEW"])? test_input($_POST["passwordNEW"]) : "";

        if($player["password"] == $passwordOLD && $player["password"] != $passwordNEW ){
            if($password1 == $passwordNEW){
                $dao -> updatePlayer($firstname,$lastname,$imgURL,$clubid,$username,$passwordNEW,$id);
                $loginstatus = true;
                include_once 'playerProfile.php';
            }
            $loginstatus = false;

            include_once 'playerProfile.php';

        }
        $loginstatus = false;

        include_once 'playerProfile.php';


    }
    
} if ($_SERVER['REQUEST_METHOD']="GET"){

    if (isset($_GET["logout"])) {
        header('location:login.php');
        session_unset();
        session_destroy();
        //...
    } elseif ($action == 'akcijaGet2'){
        //...
    }elseif ($action == 'akcijaGet3'){
        //...
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>