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
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
   		<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>

	<!-- Page that shows the result of what the Building Manager chose to see on the last page -->

	<body>
			<h1>Espace Gestionnaire</h1>

			<table>
				<caption>
					Visualisation Gestionnaire
				</caption>
				<tr class="titre">
					<th>Salle</th>
					<th>Date</th>
					<th>Heure</th>
					<th>Mesure (en ppm)</th>
				</tr>

			<?php
				$username=$_SESSION['login'];
				/* Access to the database*/
				include ("mysql.php");

				// Gets the duration and the sensor that the Building Manager chose on the form
				$j=$_POST['duree'];
				$capteur=$_POST['capteur'];

				// SQL request to get the data the Building Manager asked for, depending on the sensor and the duration that he chose
				$requete = "SELECT Salle.Nom_salle, Mesure.date, Mesure.horaire, Mesure.valeur FROM Mesure INNER JOIN Capteur ON Capteur.Nom_capt = Mesure.Nom_capt INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' AND Mesure.date > DATE_SUB(CURDATE(), INTERVAL $j DAY) AND Mesure.Nom_capt = '$capteur' ORDER BY Mesure.date DESC, Mesure.horaire DESC ;";

				$resultat = mysqli_query($id_bd, $requete)
					or ("Location:erreur_execution.php");

				// Gets one line from the SQL request's result at a time and puts it in a table
				while($ligne=mysqli_fetch_array($resultat))
					{
						extract($ligne);
						echo '<tr>';
						echo "<td> $ligne[0] </td>";
						echo "<td> $ligne[1] </td>";
						echo "<td> $ligne[2] </td>";
						echo "<td> $ligne[3] </td>";
						echo '</tr>';
					}

			echo '</table>';
			echo '<p>';

			// SQL request to get the metrics on the data that is shown in the table
			$requete_metriques = "SELECT MAX(Mesure.valeur), MIN(Mesure.valeur), ROUND(AVG(Mesure.valeur), 2) FROM Mesure INNER JOIN Capteur ON Capteur.Nom_capt = Mesure.Nom_capt INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' AND Mesure.date >= DATE_ADD(CURDATE(), INTERVAL -$j DAY) AND Mesure.Nom_capt = '$capteur' ;";

			$resultat_metriques = mysqli_query($id_bd, $requete_metriques)
					or ("Location:erreur_execution.php");
			mysqli_close($id_bd);

			// Displays the result from the SQL metrics request
			$ligne_metriques = mysqli_fetch_row($resultat_metriques);
			echo '<ul>';
				echo '<li>Maximum : '.$ligne_metriques[0].' ppm</li>';
				echo '<br/>';
				echo '<li>Minimum : '.$ligne_metriques[1].' ppm</li>';
				echo '<br/>';
				echo '<li>Moyenne : '.$ligne_metriques[2].' ppm</li>';
			echo '</ul>';

			echo '</p>';

		?>

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
