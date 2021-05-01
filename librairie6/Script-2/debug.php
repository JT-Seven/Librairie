<?php
	require_once("book.php");/*On recupère le fichier 'book.php' pour pouvoir exploiter le contenu de ce fichier / 
	La fonction require_once verifie notamment si le fichier a deja ete inclus et si c'est le cas il ne l'inclut pas une deuxieme fois */
	$stock = findAllprod();//Déclaration de la variable '$stock' pour y ajouter la fonction 'findAllprod' qui provient du ficher 'books.php';
	require_once("cart.php");

	echo '<b>findAllprod() =</b>  ';
	var_dump($stock);
	echo "<br/>";
	echo "<br/>";
	echo '<b>search() =</b>  ';
	echo "<br/>";
	echo "<br/>";
	var_dump(selection("dvd"));
	

	
?>