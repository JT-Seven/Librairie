<?php 	

	if (isset($_GET["action"])) { //Si la superglobal '$_GET["action"]' est definie on execute tous ca;
		switch ($_GET["action"]) { //On vas switcher entre les requetes qui se font via la superglobal '$_GET';
			case "about.php": //A chaque case si la requete est egal a l'un des fichier on l'execute;
				$content_for_layout ="about.php"; 
				break;
			case "debug.php":
				$content_for_layout ="debug.php";
				break;
			case "index.php":
				$content_for_layout ="store.php";
				break;
			case "showcart.php":
				$content_for_layout ="showcart.php";
				break;
			case "addToCart":
				$content_for_layout ="showcart.php";
				break;
			case "supprimer":
				$content_for_layout ="showcart.php";
				break;
			case "retour":
				$content_for_layout ="debug.php";
				break;
			case "commander":
				$content_for_layout ="checkout.php";
				break;
			case "checkout.php":
				$content_for_layout ="checkout.php";
				break;
			default: 
				$content_for_layout ="inconstruction.php";
		}
		$layout = "mainlayout.php";
	} else { // Sinon si elle n'est pas definie;
		$content_for_layout = "store.php";
		$layout = "mainlayout.php";
	}	

	include($layout);

?>