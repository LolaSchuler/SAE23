<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    	<title>Requête erron&eacute;e</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="CTL" />
    	<meta name="description" content="Espace Administrateur" />
    	<meta name="keywords" content="HTML, CSS" />
    	<link rel="preconnect" href="https://fonts.googleapis.com">
   		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>

	<!-- SQL request error page -->

	<body>
		<section>

			<h1>Administration de la base : </h1>
			<p><strong> /!\ Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es /!\ </strong></p>
			<br />
			<p> Requête impossible !! <p>
			<p> Merci de refaire votre requête : <a href="admin_choix_table.php"> Retour </a></p>
			<br />
			<hr />
		</section>

		<footer>
			<p><a href="index.php">Retour à la page d'accueil </a></p>
		</footer>
		
	</body>
</html>
