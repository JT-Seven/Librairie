<?php
session_start();

require_once("book.php");


if(isset($_GET['id']))
{
    addToCart($_GET['id']);
}


function &findCart() //Le panier
{
    if (!isset($_SESSION['cart'])) //Si la session cart est pas definie on la crée;
	{
		$_SESSION['cart'] = array("lineitems" => array()); //On la crée et on ajoute un tableau indexé avec une ligne de commande qui contient un tableau vide;
	}
	return $_SESSION['cart']; //On retourne la valeur de cette session cart pour afficher la valeur;
}


function addNewBookToCart($book) //Ligne de commande
{
	$cart =& findCart(); //On recupere par reference le panier 
	array_push(
		$cart['lineitems'], 
			array(
				'book' => $book[1],
				'quantity' => intval(1),
				'price' => $book[2],
				'id' => $book[0]
			)
		);
}


function addBookToCart($book) //Cherche dans le panier courant si le livre existe sinon il ajoute une ligne de commande
{
	$cart =& findCart(); //On recupere notre panier
	foreach($cart['lineitems'] as &$valeur) //Dans le panier on parcours l'index lineitems les  valeurs entré 
	{
		if ($valeur['book'] == $book[1]) // Si le livre inscrit est egale a la valeur de l'index 'book' on incremente la quantity et on retourne
		{
			$valeur['quantity']++;
			return;
		}
	}
	addNewBookToCart($book);
}


function addToCart($bookid) //Ajouter un livre dans le panier
{
	$cart =& findCart();
	$book = findoneBook($bookid); // on vas inserer dans la fonction findoneBook() notre livre qui a été ajouter via le store
	addBookToCart($book); // pour ensuite inserer notre fonction qui contient l'id dans addBookToCart() pour faire notre traitement a savoir si le livre existe et si il y a deja une ligne de commande
}	


function cartTotalPrice()
{
    $cart =& findCart();
	$tab = [];
    foreach($cart['lineitems'] as &$valeur)
    {
		$total = ($valeur['price'] * $valeur['quantity']); //on fait notre calcul pour avoir le total
		array_push($tab, $total); //dans notre tableau on ajoute le '$total' 
    }
	return array_sum($tab); // On fait la somme des element de notre tableau
}


function emptyCart() 
{
	session_unset();
	session_write_close();
}

if ($_GET['action'] == 'supprimer')
{
	emptyCart();
}


function checkout($database, $nom, $email, $adresse, $date)
{
	//--------"ACHETEURS"------------//

	$idacheteurs = rand(1, 100000); //Création de l'id acheteurs et commande
	$idcom = rand(1, 100000);
	
	$execute = $database->prepare("INSERT INTO acheteurs (nom, email, adresse, id_acheteurs) VALUES (?,?,?,?)");
	$execute->execute([ // On insere dans la table acheteurs les informations de l'utilisateurs + 'id crée
		$nom,
		$email,
		$adresse,
		$idacheteurs
	]);	
	
	$cart = findCart();
	for($i = 0; $i < count($cart['lineitems']); $i++) //On  parcours notre panier pour aller chercher nos informations
	{
		//-----------"COMMANDES"-----------------//

		$acheteurs = $database->prepare("INSERT INTO commandes (acheteurs_id_acheteurs, dates_commande, id_commande) VALUES (?,?,?)");
		$acheteurs->execute([ // On insere dans la table commande la date l'id acheteurs en clé etrangere pour faire la correspondance et la creation de notre id commande
			$idacheteurs,
			$date,
			$idcom
		]);

		//-----------"LIGNES_COMMANDES"--------------//

		$prixf = $cart['lineitems'][$i]['quantity'] * $cart['lineitems'][$i]['price']; // on recupere dans une variable le prix total de la commande
		$id = $cart['lineitems'][$i]['id']; // On recupere l'id du livre
		$quantiter = $cart['lineitems'][$i]['quantity']; // On recupere la quantité commmandé

		$lignes_com = $database->prepare("INSERT INTO lignes_commandes (commandes_id_commande,quantite,prix_facture,livres_id_livres) VALUES (?,?,?,?)");
		$lignes_com->execute([ //Dans notre table lignes_commande on inserer toutes ces informations
			$idcom,
			$quantiter,
			$prixf,
			$id
		]);
	}
}


?>
