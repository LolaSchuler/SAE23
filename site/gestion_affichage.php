<?php
	// Démarrage de la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Gestionnaire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Gestionnaire" />
    <meta name="keywords" content="HTML, CSS" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style1.css" media="screen" />
</head>

<body>
    <header>
		<nav>
			<ul>
				<li><a href="./index.html">Accueil</a></li>
				<li><a href="./consultation.html">Consultation</a></li>
				<li><a href="./admin_authentification.html">Espace Administrateur</a></li>
				<li><a href="./gestion_authentification.html">Espace Gestionnaires</a></li>
			</ul>
		</nav>
    </header>

	<h1>Espace Gestionnaire</h1>

	<table>
		<caption>
			Visualisation Gestionnaire
		</caption>
		<tr>
				<th>Salle</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Mesure (en ppm)</th>
		</tr>

		<tr>
			<td></td>
			<td></td>
		</tr>

		<?php
			$username=$_SESSION['login'];
			/* Accès à la base */
			include ("mysql.php");

			$j=$_POST['duree'];
			$capteur=$_POST['capteur'];

			$requete = "SELECT Salle.Nom_salle, Mesure.date, Mesure.horaire, Mesure.valeur FROM Mesure INNER JOIN Capteur ON Capteur.Nom_capt = Mesure.Nom_capt INNER JOIN Salle ON Salle.Nom_salle = Capteur.Nom_salle INNER JOIN Batiment ON Batiment.ID_bat = Salle.ID_bat WHERE Batiment.login_gest = '$username' AND Mesure.date >= DATE_ADD(CURDATE(), INTERVAL -$j DAY) AND Mesure.Nom_capt = '$capteur' ORDER BY Mesure.date, Mesure.horaire ;";

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
    
    <footer>

    </footer>

</body>
</html>
