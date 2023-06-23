<?php

require_once 'DAO.php';
if (!session_id()) {
    session_start();
}

class controllerMecevi
{

    function GetMecevi()
    {

        $dao = new DAO();
        $mecevi = $dao->getMecevi();
        return $mecevi;
    }

    function GetMecById($id)
    {

        $dao = new DAO();
        $mec = $dao->getMecById($id);
        return $mec;
    }

    function DeleteMec()
    {

        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $msg = isset($msg) ? $msg : "";

        if (!empty($id)) {
            $dao = new DAO();
            $dao->deleteMec($id);
            $msg = "Mec je obrisan.";
            include '../view/Mecevi.php';
        } else {
            $msg = "Greška!";
            include '../view/Mecevi.php';
        }
    }

    function GetTereni()
    {

        $dao = new DAO();
        $tereni = $dao->getTereni();
        return $tereni;
    }

    function GetIgraci()
    {

        $dao = new DAO();
        $igraci = $dao->getIgraci();
        return $igraci;
    }

    function GetStatus()
    {

        $dao = new DAO();
        $status = $dao->getStatus();
        return $status;
    }

    function GetKategorija()
    {

        $dao = new DAO();
        $kategorija = $dao->getKategorije();
        return $kategorija;
    }

    function InsertMec()
    {
        $match_date = isset($_POST['match_date']) ? test_input($_POST['match_date']) : '';
        $match_time = isset($_POST['match_time']) ? test_input($_POST['match_time']) : '';
        $match_type = isset($_POST['match_type']) ? test_input($_POST['match_type']) : '';
        $winner = isset($_POST['winner']) ? test_input($_POST['winner']) : '';
        $court_id = isset($_POST['court_id']) ? test_input($_POST['court_id']) : '';
        $player1_id = isset($_POST['player1_id']) ? test_input($_POST['player1_id']) : '';
        $player2_id = isset($_POST['player2_id']) ? test_input($_POST['player2_id']) : '';
        $match_status = isset($_POST['match_status']) ? test_input($_POST['match_status']) : '';
        $rezultat = isset($_POST['rezultat']) ? $_POST['rezultat'] : '';
        $category = isset($_POST['category']) ? test_input($_POST['category']) : '';
        $msg = isset($msg) ? $msg : "";

        if (!empty($match_date) && !empty($match_time) && !empty($match_type) && !empty($winner) && !empty($court_id) && !empty($player1_id) && !empty($player2_id) && !empty($match_status) && !empty($category)) {
            $dao = new DAO();
            $dao->InsertMec($match_date, $match_time, $match_type, $winner, $court_id, $player1_id, $player2_id, $match_status, $rezultat, $category);
            $msg = "Uspešno dodat meč!";
            include 'InsertMec.php';
        } else {
            $msg = "Morate popuniti sva polja!";
            include 'InsertMec.php';
        }
    }

    function UpdateMec()
    {
        $match_date = isset($_POST['match_date']) ? test_input($_POST['match_date']) : '';
        $match_time = isset($_POST['match_time']) ? test_input($_POST['match_time']) : '';
        $match_type = isset($_POST['match_type']) ? test_input($_POST['match_type']) : '';
        $winner = isset($_POST['winner']) ? test_input($_POST['winner']) : '';
        $court_id = isset($_POST['court_id']) ? test_input($_POST['court_id']) : '';
        $player1_id = isset($_POST['player1_id']) ? test_input($_POST['player1_id']) : '';
        $player2_id = isset($_POST['player2_id']) ? test_input($_POST['player2_id']) : '';
        $match_status = isset($_POST['match_status']) ? test_input($_POST['match_status']) : '';
        $rezultat = isset($_POST['rezultat']) ? $_POST['rezultat'] : ''; //moze biti null
        $category = isset($_POST['category']) ? test_input($_POST['category']) : '';
        $id = isset($_POST['id']) ? test_input($_POST['id']) : '';
        $msg = isset($msg) ? $msg : "";

        if (!empty($match_date) && !empty($match_time) && !empty($match_type) && !empty($winner) && !empty($court_id) && !empty($player1_id) && !empty($player2_id) && !empty($match_status) && !empty($category)) {
            $dao = new DAO();
            $dao->UpdateMec($match_date, $match_time, $match_type, $winner, $court_id, $player1_id, $player2_id, $match_status, $rezultat, $category, $id);
            $msg = "Uspešno izmenjen meč!";
            include '../view/Mecevi.php';
        } else {
            $msg = "Morate popuniti sva polja!";
            include 'EditMec.php';
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
