<?php
require_once 'controllerMecevi.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
$id= isset($_REQUEST['id'])?$_REQUEST['id']:'';

switch ($_SERVER["REQUEST_METHOD"]) {
	case "GET":
		switch ($action) {
			case "Izmeni":
				include 'EditMec.php';
				break;

			case "Izbrisi":
				$cm = new controllerMecevi();
				$cm->DeleteMec();
				break;
		}
		break;

	case "POST":
		switch ($action) {
			case "Izmeni":
				$cm = new controllerMecevi();
				$cm->UpdateMec();
				break;

			case 'Unesi':
				$cs = new controllerMecevi();
				$cs->InsertMec();
				break;
		}
		break;
}
