<?php
	// Démarrage de la session
	session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
    <header>
    </header>

	<h1>Espace Gestionnaire</h1>


	<form name="gestion_choix" action="./gestion_affichage.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Veuillez choisir un capteur ainsi qu'une durée :</legend>

			<?php
				$username=$_GET['login'];
				$_SESSION['login'] = $username;
				/* Accès à la base */
				include ("mysql.php");

				echo '<p>';
				/* Sélectionner tous les capteurs de la table capteur qui appartiennent au bâtiment du gestionnaire*/
				$requete = "SELECT Capteur.Nom_capt, Capteur.Nom_salle, Salle.ID_bat, Batiment.login_gest FROM Capteur INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' ;";
				$resultat = mysqli_query($id_bd, $requete)
					or die ("Execution de la requête impossible : $requete");
				mysqli_close($id_bd);

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

	<aside>
		Ou bien peut-être préfèreriez-vous visualiser l'ensemble de votre bâtiment ? Si c'est le cas, <a href="./gestion_bat_entier.php">veuillez cliquer ici !</a>
	</aside>

    <hr />
    
	<footer>
		<p><a href="index.php"> Retour à la page d'accueil </a></p>
		<p><a href="admin_formulaire.html"> Gestion de la base de données </a> (accès restreint) </p>
		<p><a href="gestion_authentification.html"> Gestion des capteurs </a> (accès restreint) </p>
		<p><a href="consultation.php"> Consultation des dernières valeurs </a></p>
		<p><a href="gestion_projet.html"> Gestion de projet </a></p>
		<p><a href="mentions.html"> Mentions légales </a></p>
    </footer>

</body>
</html>
