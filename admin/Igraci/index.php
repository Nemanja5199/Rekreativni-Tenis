<?php


include_once '../partials/Zastita.php';


?>



<?php
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

$id= isset($_REQUEST['id'])?$_REQUEST['id']:'';

require_once 'controllerIgraci.php';

switch ($_SERVER["REQUEST_METHOD"]) {
	case "GET":
		switch ($action) {
			case "Izmeni":
				include 'IzmeniIgraca.php';
				break;
			
			case "Izbrisi":
				$cp = new controllerIgraci();
				$cp->DeletePlayer();
				break;

				case 'Ban':
					$cs = new controllerIgraci();
					$cs->BanPlayer($id);
					header('Location: ../Pocetna/?action=Igraci');
					break;
	  
	  
					case 'Unban':
					  $cs = new controllerIgraci();
					  $cs->UnbanPlayer($id);
					  header('Location: ../Pocetna/?action=Igraci');
					  break;






		}
		break;

	case "POST":
		switch ($action) {
			case "Unesi":
				$cp = new controllerIgraci();
				$cp->InsertPlayer();
				break;

			case "Izmeni":
				$cp = new controllerIgraci();
				$cp->UpdatePlayer();
				break;
		}
		break;
}
