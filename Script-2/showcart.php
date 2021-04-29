<?php

require_once("cart.php");
$cart = findCart();

?>
<table border="1">
    <tr>
        <td>Livre</td><td>Quantiter</td><td colspan="2">Prix</td>
    </tr>
    <tr>
        <td colspan="2"></td><td>Each</td><td>Total</td>
    </tr>
    <?php foreach($cart['lineitems'] as &$value) { // Parcours notre panier pour affichier les informations via notre ligne de commande de notre panier  ?>
        <tr>
            <td><?php echo $value['book']; ?></td><td><?php echo $value['quantity']; ?></td>
            <td><?php echo $value['price']. " $";  ?></td> <td><?php echo ($value['quantity'] * $value['price']). " $"; ?></td>
        </tr>
    <?php } ?>
        <tr>
            <td>TOTAL :</td>
            <td colspan="3"><?php echo cartTotalPrice(). " $"; //Total de tous les livres inscrit dans notre tableau ?></td> 
        </tr>
</table><br>
<button><a href="index.php?action=supprimer">Vider le panier</a></button><button><a href="index.php?action=commander">Commander</a></button>

<!-- Notre boutton supperimer --> <!-- + le boutton commander qui ramene sur la page authentifications -->

