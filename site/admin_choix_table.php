<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Choix de la table à modifier</title>
		<link rel="stylesheet" type="text/css" href="./styles/style.css" />
	</head>

	<body>
		<section>
			<br />
			<form action="admin_modif.php" method="post" enctype="multipart/form-data">
				<fieldset class="gauche">
					<legend>Choisissez la table à modifier</legend>
						<input type="radio" name="type" value="Batiment" id ="Batiment" checked="checked" />
						<label for="Batiment"><strong> Table "Bâtiment" </strong></label><br />
						<input type="radio" name="type" value="Capteur" id ="Capteur" />
						<label for="Capteur"><strong> Table "Capteur" </strong></label><br />
						<input type="radio" name="type" value="Salle" id ="Salle" />
						<label for="Salle"><strong> Table "Salle" </strong></label><br />
				</fieldset>
				<div class="valid">
					<input type="submit" value="Faites votre choix" />
				</div>
			</form>
		</section>
		
    <hr />
    
    <p><a href="admin_formulaire.html"> Gestion de la base de données </a> (accès restreint) </p>
    <p><a href="gestion_authentification.html"> Gestion des capteurs </a> (accès restreint) </p>
    <p><a href="consultation.php"> Consultation des dernières valeurs </a></p>
    <p><a href="gestion_projet.html"> Gestion de projet </a></p>
    <p><a href="mentions.html"> Mentions légales </a></p>
    
    </footer>
		
	</body>
</html>
