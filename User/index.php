<?php
require_once 'ControllerUser.php';
$action=isset($_REQUEST['action'])?$_REQUEST['action']:"";


switch($_SERVER['REQUEST_METHOD']){


case "GET":

    switch($action){

        case"Pocetna":
            include '../view/index.php';
            break;


            case"Profil":
                include '../view/profil.php';
                break;


                case"Profil":
                    include '../view/profil.php';
                    break;

                    case"Logout":
                        $cs = new controllerUser();
                        $cs->Logout();
                        include '../view/index.php';
                        break;
                        

                        case"Igraci":
                            include '../view/igraci.php';
                            break;


                            case"Rezultat":
                                include '../view/rezultati.php';
                                break;

                                case"LoginFrom":
                                    include '../view/login.php';
                                    break;

                                    
                                    case"RegisterFrom":
                                        include '../view/register.php';
                                        break;

                                        case"AdminP":
                                           header('Location:../admin/Pocetna/?action=Pocetna');
                                            break;

                                         
                                    
                        


                        


                    

            

    }

    break;

    case"POST":

        switch($action){

            case"Register":
                $cs=new controllerUser();
                $cs->InsertUser();
                break;

            case "Login":
                $cs=new controllerUser();
                $cs->Login();
                include_once '../view/index.php';
                break;
    
           
    
        }

        break;
        
        


}





?>