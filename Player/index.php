<?php
require_once 'Controller.php';
$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

switch ($_SERVER["REQUEST_METHOD"]) {
	case "GET":
		switch ($search) {
			case "Svi":
				$cp = new controller();
				$cp->GetPlayers();
				include 'Svi.php';
				break;

			case "Muski":
				$cp = new controller();
				$cp->GetPlayersMale();
				include 'Muski.php';
				break;

			case "Zenski":
				$cp = new controller();
				$cp->GetPlayersFemale();
				include 'Zenski.php';
				break;

			case "TOP5":
				$cp = new controller();
				$cp->GetPlayers5();
				include 'TOP5.php';
				break;

			case "TOP5M":
				$cp = new controller();
				$cp->GetPlayersMale5();
				include 'TOP5M.php';
				break;

			case "TOP5Z":
				$cp = new controller();
				$cp->GetPlayersFemale5();
				include 'TOP5Z.php';
				break;
		}
		break;

	case "POST":
		switch ($search) {
		}
		break;
}
