<?php
	// Session start
	session_start();
	// Verifies that there is indeed an ongoing session ; if not, redirects the user to an error page
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    	<title>SAE23 - Espace Gestionnaire</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="CTL" />
    	<meta name="description" content="Espace Gestionnaire" />
    	<meta name="keywords" content="HTML, CSS" />
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>

	<!-- Form for the building manager to choose the sensor whose measurements he wants to see and for what duration -->

	<body>
		<h1>Espace Gestionnaire</h1>


		<form name="gestion_choix" action="./gestion_affichage.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Veuillez choisir un capteur ainsi qu'une durée :</legend>

				<?php
					// To get the login used in the authentication form which was stocked in the session
					$username=$_SESSION["login"];

					/* Access to the database */
					include ("mysql.php");

					echo '<p>';
					/* SQL request to get the list of all the sensors located in the manager's building */
					$requete = "SELECT Capteur.Nom_capt, Capteur.Nom_salle, Salle.ID_bat, Batiment.login_gest FROM Capteur INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' ;";
					$resultat = mysqli_query($id_bd, $requete)
						or ("Location:erreur_execution.php");
					mysqli_close($id_bd);

					// Gets each sensor from the SQL request's result and creates a dropdown list option for each of them
					$i = true ;
					while($ligne=mysqli_fetch_array($resultat))
						{
							extract($ligne);
							if ($i)
								{
									echo '<label for="capteur">Capteur : </label>';
									echo '<select id="'.$Nom_capt.'" name="capteur">';
									echo '<option value="'.$Nom_capt.'" selected="selected">'.$Nom_capt.' (salle '.$Nom_salle.')</option>';
									$i=false;
								}
							else
								{
									echo '<option value="'.$Nom_capt.'">'.$Nom_capt.' (salle '.$Nom_salle.')</option>';
								}
						}
					echo '</select>';
					echo '</p>';
				?>

				<!-- Buttons to let the Building Manager choose the duration for which he wishes to review the data from the sensor -->
				<p>
					Durée  :
					<input type="radio" name="duree" value="1" id="1_jour" checked/><label for="1_jour">1 jour</label>
					<input type="radio" name="duree" value="5" id="5_jours" /><label for="5_jours">5 jours</label>
					<input type="radio" name="duree" value="10" id="10_jours" /><label for="10_jours">10 jours</label>
				</p>
				
			</fieldset>
			<p>
				<input type="submit" value="Faites votre choix" />
			</p>
		</form>

		<!-- Link to get to the page which shows all of the data for the whole building in one big table -->
		<p>
			Ou bien peut-être préfèreriez-vous visualiser l'ensemble de votre bâtiment ? Si c'est le cas, <a href="./gestion_bat_entier.php">veuillez cliquer ici !</a>
		</p>

    	<hr />
    
		<footer>
			<nav>
				<ul>
					<li><a href="index.php"> Retour à la page d'accueil </a></li>
					<li><a href="admin_formulaire.html"> Espace Administration </a> (accès restreint) </li>
					<li><a href="gestion_authentification.html"> Espace Gestionnaire</a> (accès restreint) </li>
					<li><a href="consultation.php"> Consultation des dernières valeurs </a></li>
					<li><a href="gestion_projet.html"> Gestion de projet </a></li>
					<li><a href="mentions.html"> Mentions légales </a></li>
				</ul>
			</nav>
    	</footer>

	</body>
</html>
