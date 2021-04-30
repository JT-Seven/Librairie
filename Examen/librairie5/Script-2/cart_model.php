<?php

session_start();

try {


function findCart()
{
    $pdo = new PDO('mysql:host=localhost;dbname=librairie','root','');
    if(!isset($_SESSION['cart']))
    { 
        $requete = $pdo->query("SELECT * FROM lignescommandes");
        $_SESSION['cart'] = $requete->fetchall(PDO::FETCH_OBJ);
    }
    return $_SESSION['cart'];
}


function addBookToCart($id) 
{   //ajoute une ligne de commande
    $pdo = new PDO('mysql:host=localhost;dbname=librairie','root','');

    $requete1 = $pdo->prepare("SELECT * FROM lignescommandes");
    $resultat1 = $requete1->execute(); 
    $resultat1 = $requete1->fetchAll(PDO::FETCH_OBJ); 
        
    for($i = 0; $i < count($resultat1); $i ++)
    {
        if($resultat1[$i] ->Livres_idLivres == $id)
        { //jusquau if tous fonctionne
            $quantite =  $resultat1[$i]->quantite;
            $quantite = $quantite + 1;
            $requete = $pdo->prepare("UPDATE lignescommandes set quantite = :quantite where  Livres_idLivres = :id");
            $requete->bindParam(':id',$id);
            $requete->bindParam(':quantite',$quantite);

            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);

            $requete1 = $pdo->prepare("SELECT * FROM lignescommandes");
            $requete1->execute();
            $resultat = $requete1->fetchall(PDO::FETCH_ASSOC);
            print_r($resultat);
        }
        else
        {  
            addNewBookToCart();
        }
    }
}


function addNewBookToCart($id) 
{   //ajoute une ligne de commande
    $pdo = new PDO('mysql:host=localhost;dbname=librairie','root','');

    $requete = $pdo->prepare("SELECT * FROM LIVRES");
    $resultat1 = $requete->execute(); 
    $resultat1 = $requete->fetchAll(PDO::FETCH_OBJ); 

    for($i = 0; $i < count($resultat1); $i ++)
    {
        if($resultat1[$i]->idLivres  == $id)
        {

            $requete1 = $pdo->prepare("INSERT INTO ACHETEURS (idAcheteurs) VALUES(4)");
            $requete1->execute();

            $requete2 = $pdo->prepare("INSERT INTO COMMANDES (date) values(2021-04-26)");
            $requete2->execute();

            $requete3 = $pdo->prepare("INSERT INTO LIGNESCOMMANDES ( Acheteurs_idAcheteurs) VALUES(3)");
            $requete3->execute();

            echo 'insertion';
        }
    }
    $requete4 = $pdo->prepare("SELECT * FROM lignescommandes");
    $requete4->execute();
    $resultat2 = $requete4->fetchall(PDO::FETCH_ASSOC);
    print_r($resultat2);
}  
     
} 
catch (PDOException $e) 
{
$error = $e->getMessage(); //Si il y a une erreur dans notre code on affiche ce message
}

function addToCart($bookID)
{  //appel le panier et apel la fonction ui va nous comparer le bookid rentrer et nous renvoyer un tableau avec le QUANTITE l'id et le nom.
$cart =& findCart();
$book = findOneBook($bookID);
addBookToCart($book);   //on donne lui valeur du tableau .
}


function emptyCart() 
{
session_unset();
session_write_close();
}


function cartTotalPrice()
{  //on parcourt et on ajoute la facture de chaque ligne de commande dans un tableau
$cart =& findCart();
$tab = [];
foreach($cart['lineitems'] as &$value)
{
    $total = ($value['quantity'] * $value['price']);
    array_push($tab,$total);
}
return array_sum($tab);
}


function checkout($nom, $adresse, $email, $payement)
{  //ajoute des infoormation de commande dans un fichier
$cart = findCart(); 
$tab = [];
foreach($cart['lineitems'] as  $value)
{
    $booktitle =  $value['book']; 
    $bookqte = $value['quantity']; 
    array_push($tab, $bookqte, $booktitle);
}
array_push($tab, $nom, $email, $adresse, $payement);
file_put_contents('nom_timestamp.txt', $tab); //On écrit un premier texte dans notre fichier
}

if($_GET['action'] == "commander")
{
checkout();
}


if(isset($_GET['id']))
{  //si l'id est defini on appel addtocart avec la valeur du id 
addToCart($_GET['id']);
}

if($_GET['action'] == "vider")
{   //si le parametre a pour valeur vider on appel la fonction empty
emptyCart();
}

if(isset($_GET['nom']) && isset($_GET['email']) && isset($_GET['adresse']) && isset($_GET['Payement'])) 
{  //si ces Get son defini on appel les deux fonction et on redirge la page vers le store.
checkout( $_GET['nom'], $_GET['adresse'], $_GET['email'], $_GET['payer par'] );
emptyCart();
header("location: index.php?action=index.php");
}

?>
