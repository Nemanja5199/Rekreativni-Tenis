<?php

require_once 'DAO.php';

class controllerRez
{

    function GetMecevi()
    {

        $dao = new DAORez();
        $mecevi = $dao->getMecevi();
        return $mecevi;
    }

    function GetMBuduci()
    {

        $dao = new DAORez();
        $bmecevi = $dao->getMeceviBuduci();
        return $bmecevi;
    }

    function GetMZavrseni()
    {

        $dao = new DAORez();
        $zmecevi = $dao->getMeceviZavrseni();
        return $zmecevi;
    }

    function GetTereni()
    {

        $dao = new DAORez();
        $tereni = $dao->getTereni();
        return $tereni;
    }

    function GetIgraci()
    {

        $dao = new DAORez();
        $igraci = $dao->getIgraci();
        return $igraci;
    }

    function GetStatus()
    {

        $dao = new DAORez();
        $status = $dao->getStatus();
        return $status;
    }

    function GetKategorija()
    {

        $dao = new DAORez();
        $kategorija = $dao->getKategorije();
        return $kategorija;
    }


}
?>