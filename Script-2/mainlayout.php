<html>
<head>
       <title>La librairie d'In'Tech INFO</title>
</head>
<body>

<style>
	
</style>

<table border="1" cellspacing="0" cellpadding="5px" width="100%"> <!-- Le tableau en lui meme qui sera afficher toutes au long de la naviguation du site -->
	<tr>
		<td colspan="2" align="center" style="background-color: #cccccc">
			<h1 style="background-color: #cccccc; margin: 0px;padding:0px">La librairie d'In'Tech INFO</h1>  <!-- titre de la librairie -->
			<p>
				Nous sommes le <?php echo date("d/m/y"); ?> et il est <?php echo strftime("%H:%M:%S"); //Affochage de la date et l'heure actuelle ?><br/>				
			</p>
		</td>
	</tr>
	<tr>
		<td  valign="top" style="background-color: cyan" width="100px">
			<a href="index.php?action=index.php"><?php echo ucfirst("accueil"); ?></a><br /> <!-- ucfirst() Mets le premier caractere d'un mot en majuscule -->
			<a href="index.php?action=questions.php"><?php echo ucfirst("questions"); ?></a><br />
			<a href="index.php?action=showcart.php"><?php echo ucfirst("showcart"); ?></a><br />
			<a href="index.php?action=news.php"><?php echo ucfirst("nouveaut�s"); ?></a><br /> 
			<a href="index.php?action=contact.php"><?php echo ucfirst("contact"); ?></a><br />
			<a href="index.php?action=about.php"><?php echo ucfirst("a propos"); ?></a><br />
			<a href="index.php?action=debug.php"><?php echo ucfirst("debug"); ?></a><br/> <!-- La partie naviguation qui sera placé sur la gauche de notre librairie elle affichera suivant des lien "<a href>" nos fichier et leur contenu-->
		</td>
		<td>
			<?php include($content_for_layout); //L'affichage de nos fichier suivant l'action qui aura été faites ?>	
		</td>
	</tr>
</table>

</body>
</html>

