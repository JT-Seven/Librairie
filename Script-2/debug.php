<?php
	require_once("book.php");/*On recupère le fichier 'book.php' pour pouvoir exploiter le contenu de ce fichier / 
	La fonction require_once verifie notamment si le fichier a deja ete inclus et si c'est le cas il ne l'inclut pas une deuxieme fois */
	$stock = findAllBooks();//Déclaration de la variable '$stock' pour y ajouter la fonction 'findAllBooks' qui provient du ficher 'books.php';
	require_once("cart.php");

	echo '<b>$_GET["action"] =</b> ';
	print_r($_GET["action"]);					//   DEBUGAGE DES VARIABLES ET FONCTIONS DE TOUT LE CODE DE NOTRE LIBRAIRIE  //
	echo "<br/>";
	echo "<br/>";
	echo '<b>$content_for_layout =</b> ';
	print_r($content_for_layout);
	echo "<br/>";
	echo "<br/>";
	echo '<b>$layout =</b> ';
	print_r($layout);
	echo "<br/>";
	echo "<br/>";
	echo '<b>findAllBooks() =</b>  ';
	print_r($stock);
	echo "<br/>";
	echo "<br/>";
	echo '<b>findAllBooks() =</b>  ';
	var_dump($stock);
	echo "<br/>";
	echo "<br/>";
	echo '<b>findoneBook() =</b>  ';
	echo "<br/>";
	echo "<br/>";
	var_dump(findoneBook(2));
	echo "<br/>";
	echo "<br/>";
	echo '<b>findCart() =</b>  ';
	echo "<br/>";
	echo "<br/>";
	var_dump(findCart());
	echo "<br/>";
	echo "<br/>";
	

	
?>