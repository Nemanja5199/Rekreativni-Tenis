<?php

require_once 'DAOPlayer.php';

if(!session_id()) {
    session_start();
  }

class controller
{

    function GetPlayers()
    {
        $dao = new DAOPlayer();
        $players = $dao->getPlayers();
        return $players;
    }

    function GetPlayersMale()
    {
        $dao = new DAOPlayer();
        $playersmale = $dao->getPlayersMale();
        return $playersmale;
    }

    function GetPlayersFemale()
    {
        $dao = new DAOPlayer();
        $playersfemale = $dao->getPlayersFemale();
        return $playersfemale;
    }

    function GetPlayers5()
    {
        $dao = new DAOPlayer();
        $players5 = $dao->getPlayers5();
        return $players5;
    }

    function GetPlayersMale5()
    {
        $dao = new DAOPlayer();
        $playersmale = $dao->getPlayersMale5();
        return $playersmale;
    }

    function GetPlayersFemale5()
    {
        $dao = new DAOPlayer();
        $playersfemale = $dao->getPlayersFemale5();
        return $playersfemale;
    }
}
?>