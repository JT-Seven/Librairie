<?php	
	require_once("book.php"); /*On recupère le fichier 'book.php' pour pouvoir exploiter le contenu de ce fichier / 
	La fonction require_once verifie notamment si le fichier a deja ete inclus et si c'est le cas il ne l'inclut pas une deuxieme fois */
	//$stock = getAllBooks();	 
	$stock = findAllBooks(); //Déclaration de la variable '$stock' pour y ajouter la fonction 'findAllBooks' qui provient du ficher 'books.php';
	foreach($stock as $book) { // On parcour la variable '$stock' qui contient les valeurs du fichier stock.txt grace a la fonction : "l'id, le titre, la description, l'auteur et le prix";
?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td rowspan="3"><img src="<?php echo "img\\".$book["id_produit"]?>.jpg"/></td><!-- Cette ligne dit que j'affiche toutes les images qui provienne de la fonction findAllBooks -->
				<td><h2 style="margin: 0px;padding:0px"><?php echo strtoupper($book["titre"]) ?></h2></td> <!-- Cette ligne affiche tout les tritres 
				provenant de la fonction finAllBooks en majuscules-->
			</tr>
			<tr>
				<td><p><?php echo $book["description"] ?></p></td><!-- Affiche la description via la fonction findAllBooks -->
			</tr>
			<tr>
				<td><b><?php echo $book["prix"] ?>�</b>&nbsp<a href="index.php?action=addToCart&id=<?php echo $book["id_produit"] ?>">Ajouter au panier</a></td> <!-- Affiche en gras le prix  et ajoute
				un lien qui redirige vers le fichier 'inconstruction.php' mais sous le nom de 'addtocart' + son id personnel ajouter via la fonction findAllBooks -->
			</tr>
		</table>
		<hr />		
<?php
	}
?>
