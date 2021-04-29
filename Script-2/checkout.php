<?php
require_once("cart.php");
require_once("book.php");

if(isset($_GET['envoyer']))
{
    if (!empty($_GET['nom']) && !empty($_GET['email']) && !empty($_GET['adresse']))
    {
        $date = date('d/m/Y à H:i:s', time()+ 2*3600);
        $database = getPDO();
        checkout($database, $_GET['nom'], $_GET['email'], $_GET['adresse'], $date);
        header("Location: index.php?action=checkout.php");
    }
    else
    {
        $msgerror = "remplir tout les champs !";
    }
}

?>

<form method="GET" action="checkout.php">
    <label>Nom :</label><input type="text" name="nom"><br>
    <label>Email :</label><input type="email" name="email"><br>
    <label>Adresse :</label><input type="text" name="adresse"><br>
    <label>Payer par :</label><select name="payement">
        <option value="visa">VISA</option>
    </select><br>
    <input type="submit" name="envoyer" value="Commander">
</form>

