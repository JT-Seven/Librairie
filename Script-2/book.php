<?php


	/* 
		Ce fichier d�finit la structure d'un livre. Il permet �galement de manipuler et de persister des livres
		Un livre ou book est un tableau associatif contenant les �l�ments suivants
		- id => integer
		- title => string
		- author => string
		- price => float
		- description => string
		- image_url => url de l'image
	*/

	function getPDO()
	{
		try {
			$pdo = new PDO('mysql:dbname=librairie4;host=localhost', 'root', "");
			$pdo->exec("SET CHARACTER SET utf-8");
			return $pdo;
		} catch (PDOException $e) {
			var_dump($e);
		}
	}
		
	
	function findAllBooks() //Creation de la fonction findAllBooks
	{
		$database = getPDO();
		$requete = $database->prepare('SELECT * FROM livres');
		$requete->execute();
		$stock = $requete->fetchAll(PDO::FETCH_ASSOC);
		return $stock;
	}
	

	function findoneBook($bookid) //Recherche un livre dans la librairie
	{
		$stock2 = findAllBooks();
		foreach($stock2 as $book)
		{
			if ($book['id_livres'] == $bookid)
			{
				$bookid = $book['id_livres'];
				$title = $book['titre'];
				$price = $book['prix'];
				$data = array($bookid, $title, $price);
				return $data;
			}
		}
		return false;
	}
?>

