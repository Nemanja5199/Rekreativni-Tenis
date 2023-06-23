
<?php


include_once '../partials/Zastita.php';


?>


<?php

require_once 'DAO.php';

if(!session_id()) {
    session_start();
  }

class controllerIgraci
{




    


    function getPlayerCount()
    {

        $dao = new DAO();
        $players = $dao->getPlayerCount();
        return $players;
    }


    function GetPlayer($page)
    {

        $dao = new DAO();
        $players = $dao->getPlayers($page);
        return $players;
    }

    function GetClub()
    {

        $dao = new DAO();
        $clubs = $dao->getClubs();
        return $clubs;
    }

    function InsertPlayer()
    {

        $name = isset($_POST['name']) ? test_input($_POST['name']) : '';
        $matches_lost = isset($_POST['matches_lost']) ? test_input($_POST['matches_lost']) : '';
        $matches_won = isset($_POST['matches_won']) ? test_input($_POST['matches_won']) : '';
        $surname = isset($_POST['surname']) ? test_input($_POST['surname']) : '';
        $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : '';
        $image_url = isset($_POST['image_url']) ? test_input($_POST['image_url']) : '';
        $club_id = isset($_POST['club_id']) ? test_input($_POST['club_id']) : '';
        $msg = isset($msg) ? $msg : "";

        if (!empty($name) && !empty($matches_lost) && !empty($matches_won) && !empty($surname) && !empty($gender) && !empty($image_url) && !empty($club_id)) {
            $dao = new DAO();
            $dao->InsertPlayer($name, $matches_lost, $matches_won, $surname, $gender, $image_url, $club_id);
            $msg = "Uspešno dodat igrač!";
            include 'DodajIgraca.php';
        } else {
            $msg = "Morate popuniti sva polja!";
            include 'DodajIgraca.php';
        }
    }

    function UpdatePlayer()
    {

        $name = isset($_POST['name']) ? test_input($_POST['name']) : '';
        $matches_lost = isset($_POST['matches_lost']) ? test_input($_POST['matches_lost']) : '';
        $matches_won = isset($_POST['matches_won']) ? test_input($_POST['matches_won']) : '';
        $surname = isset($_POST['surname']) ? test_input($_POST['surname']) : '';
        $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : '';
        $image_url = isset($_POST['image_url']) ? test_input($_POST['image_url']) : '';
        $club_id = isset($_POST['club_id']) ? test_input($_POST['club_id']) : '';
        $id = isset($_POST['id']) ? test_input($_POST['id']) : '';
        $msg = isset($msg) ? $msg : "";

        if (!empty($name) && !empty($matches_lost) && !empty($matches_won) && !empty($surname) && !empty($gender) && !empty($image_url) && !empty($club_id)) {
            $dao = new DAO();
            $dao->UpdatePlayer($name, $matches_lost, $matches_won, $surname, $gender, $image_url, $club_id, $id);
            $msg = "Uspešno izmenjen igrač!";
            include '../view/Igraci.php';
        } else {
            $msg = "Morate popuniti sva polja!";
            include 'IzmeniIgraca.php';
        }
    }

    function DeletePlayer()
    {

        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $msg = isset($msg) ? $msg : "";

        if (!empty($id)) {
            $dao = new DAO();
            $dao->DeletePlayer($id);
            $msg = "Uspešno izbrisan igrač!";
            include '../view/Igraci.php';
        } else {
            $msg = "Greška!";
            include '../view/Igraci.php';
        }
    }





    function BanPlayer($id){

        $ban= 1;
    
    
        $dao = new DAO();
       if(!$dao->BanPlayer($ban,$id)){
    
        echo "<script>alert('Somethnig went wrong.')</script>";
    
       }
    
    }
    
    
    
    function UnbanPlayer($id){
    
        $ban= 0;
    
    
        $dao = new DAO();
       if(!$dao->BanPlayer($ban,$id)){
    
        echo "<script>alert('Somethnig went wrong.')</script>";
    
       }
    
    }





}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}