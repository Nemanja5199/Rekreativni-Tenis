
<?php

include_once '../partials/Zastita.php';

?>

<?php

require_once 'controllerClub.php';

$action= isset($_REQUEST['action'])?$_REQUEST['action']:'';

$id= isset($_REQUEST['id'])?$_REQUEST['id']:'';




switch($_SERVER['REQUEST_METHOD']){


  case 'GET':

    switch ($action) {
			
			case "Izbrisi":
				$cc = new controllerClub();
				$cc->DeleteClub();
				break;

        case "NoviKlub":
         include_once '../view/KlubForma.php';
          break;


          case "Izmeni":
            include_once '../view/EditKlub.php';
             break;


             case 'Ban':
              $cs = new controllerClub();
              $cs->BanClub($id);
              header('Location: ../Pocetna/?action=Klubovi');
              break;


              case 'Unban':
                $cs = new controllerClub();
                $cs->UnbanClub($id);
                header('Location: ../Pocetna/?action=Klubovi');
                break;
  

              

        
		}
		break;

  case 'POST':


    switch($action)
      {

        case 'Unesi' :
          $cc = new controllerClub();
          $cc->InsertClub();
          header('Location: ../Pocetna/?action=Klubovi');
          break;
    
    
    
          case 'Edit':
          $cc = new controllerClub();
            $cc->UpdateClub();
            header('Location: ../Pocetna/?action=Klubovi');
            break;

      }
   
    
      

    break;
}


?>