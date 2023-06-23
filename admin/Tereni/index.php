<?php

include_once '../partials/Zastita.php';


require_once 'ControllerTeren.php';

$action= isset($_REQUEST['action'])?$_REQUEST['action']:'';

$id= isset($_REQUEST['id'])?$_REQUEST['id']:'';




switch($_SERVER['REQUEST_METHOD']){


    case 'GET':


        switch($action){


            case 'Izbrisi':
               $cs= new ControllerTeren();
               $cs->DeleteCourt($id);
               header('Location: ../Pocetna/?action=Teren');
                break;


                case 'NoviTeren':
                    include_once '../view/TerenForm.php';
                    break;

                    case 'Izmeni' :
                        include_once '../view/EditTeren.php';
                        break;


                    


        }


        break; 





        case 'POST':

                switch($action){

                       case 'Unesi':
                        $cs= new ControllerTeren();
                        $cs->InsertCourt();
                        break; 


                        case 'Update':
                            $cs= new ControllerTeren();
                            $cs->UpdateCourt();
                            break;


                        

                }






            break;


}

?>