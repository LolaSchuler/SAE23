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

	<table>
		<caption>
			Visualisation Gestionnaire - Bâtiment entier
		</caption>
		<tr>
				<th>Salle</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Mesure (en ppm)</th>
		</tr>

		<?php
			$username=$_SESSION['login'];
			/* Accès à la base */
			include ("mysql.php");

			$requete = "SELECT Salle.Nom_salle, Mesure.date, Mesure.horaire, Mesure.valeur FROM Mesure INNER JOIN Capteur ON Capteur.Nom_capt = Mesure.Nom_capt INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' ORDER BY Mesure.date DESC, Mesure.horaire DESC ;";

			$resultat = mysqli_query($id_bd, $requete)
					or die ("Ex&eacute;cution de la requête impossible : $requete");
			mysqli_close($id_bd);

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
		?>
	</table>

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
