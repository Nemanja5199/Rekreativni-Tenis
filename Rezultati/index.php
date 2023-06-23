<?php
require_once 'ControllerRez.php';
$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

switch ($_SERVER["REQUEST_METHOD"]) {
	case "GET":
		switch ($search) {
			case "Svi":
				$cm = new controllerRez();
				$cm->GetMecevi();
				include '../view/rezultati.php';
				break;

			case "Završeni":
				$cm = new controllerRez();
				$cm->GetMZavrseni();
				include 'MeceviZavrseni.php';
				break;

			case "Budući":
				$cm = new controllerRez();
				$cm->GetMBuduci();
				include 'MeceviBuduci.php';
				break;
		}
		break;

	case "POST":
		switch ($search) {
		}
		break;
}