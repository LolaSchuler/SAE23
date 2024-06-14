<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
  	 	<title>SAE23 - Espace Administrateur</title>
   	 	<meta charset="utf-8">
   	 	<meta name="viewport" content="width=device-width, initial-scale=1" />
   	 	<meta name="author" content="CTL" />
   	 	<meta name="description" content="Espace Administrateur" />
    	<meta name="keywords" content="HTML, CSS" />
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>


	<body>
	
		<header>
			<h1> Espace administrateur </h1>
		</header>
		<br />

		<section>

			<form action="admin_modif.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Choisissez la table à modifier</legend>
						<input type="radio" name="type" value="Batiment" id ="Batiment" checked="checked" />
						<label for="Batiment"> Table "Bâtiment" </label><br />
						<input type="radio" name="type" value="Capteur" id ="Capteur" />
						<label for="Capteur"> Table "Capteur" </label><br />
						<input type="radio" name="type" value="Salle" id ="Salle" />
						<label for="Salle"> Table "Salle" </label><br />
				</fieldset>
				<div>
					<input type="submit" value="Faites votre choix" />
				</div>
			</form>
		</section>
		
    	<hr />
    
<footer>
	<nav>
		<ul>
			<li><a href="index.php"> Retour à la page d'accueil </a></li>
			<li><a href="admin_formulaire.html"> Espace administrateur </a> (accès restreint) </li>
			<li><a href="gestion_authentification.html"> Espace gestionnaire </a> (accès restreint) </li>
			<li><a href="consultation.php"> Consultation des dernières valeurs </a></li>
			<li><a href="gestion_projet.html"> Gestion de projet </a></li>
			<li><a href="mentions.html"> Mentions légales </a></li>
		</ul>
</footer>
		
</body>
</html>
