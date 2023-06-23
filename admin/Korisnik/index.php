


<?php

include_once '../partials/Zastita.php';



require_once 'ControllerKorisnik.php';

$action= isset($_REQUEST['action'])?$_REQUEST['action']:'';



$id= isset($_REQUEST['id'])?$_REQUEST['id']:'';






switch($_SERVER['REQUEST_METHOD']){


    
    case 'GET':



        switch($action){

            

            case 'Ban':
                $cs = new controllerKorisnik();
                $cs->BanUser($id);
                include_once '../view/Korisnici.php';
                break;

                case 'Unban':
                $cs = new controllerKorisnik();
                $cs->UnbanUser($id);
                include_once '../view/Korisnici.php';
                break;


                case 'DeletUser':
                    $cs = new controllerKorisnik();
                    $cs->DeleteUser($id);
                    include_once '../view/Korisnici.php';
                    break;



                    case 'EDIT':
                        include_once '../view/EditUser.php';
                        break;
                    

                  

                    
                
                
        }



        break;













        case 'POST':


        switch($action){


            case 'Unesi':
            $cs= new controllerKorisnik();
            $cs->InsertUser();
           header('Location: ../Pocetna/?action=Korisnici');
           break;


           case 'Update':
            $cs = new controllerKorisnik();
            $cs->UpdateUser($id);
            header('Location: ../Pocetna/?action=Korisnici');
                break;

        }

            

        break;

}




?>