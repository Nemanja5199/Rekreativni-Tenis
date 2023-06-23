<?php

  include_once '../partials/Zastita.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";



switch($_SERVER['REQUEST_METHOD']){

    case 'GET':
    switch($action){

      case 'Pocetna' :
        
        include_once '../view/Pocetna.php';
        break;


        case 'Klubovi' :
        
            include_once '../view/Klubovi.php';
            break;

            case 'Korisnici' :
        
                include_once '../view/Korisnici.php';
                break;

                case 'Mecevi' :
        
                    include_once '../view/Mecevi.php';
                    break;

                    case 'Igraci' :
        
                        include_once '../view/Igraci.php';
                        break;

                        case 'NoviKorisnik' :
        
                            include_once '../view/NoviKorisnikForma.php';
                            break;


                            case 'Teren' :
        
                                include_once '../view/Tereni.php';
                                break;


                                
                                
    


                        


    

    }   break;
        
}


?>