<!DOCTYPE html>
<html lang="fr">
	<head>
    	<title>SAE23 - Espace Consultation</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="CTL" />
    	<meta name="description" content="Espace Consultation" />
    	<meta name="keywords" content="HTML, CSS" />
    	<meta http-equiv="refresh" content="300">
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>

	<body>

    	<h1>Consultation</h1>
    	<p>Ici, vous pouvez visualiser les dernières mesures effectuée sur chaque salle.</p>
    	<?php
    		include ("mysql.php");
    		
    				/* SQL REQUEST */
    			$requete = " SELECT * FROM `Capteur` INNER JOIN Mesure ON Capteur.Nom_capt = Mesure.Nom_capt ORDER BY Mesure.date DESC, Mesure.horaire DESC LIMIT 4;";
    		$resultat = mysqli_query($id_bd, $requete)
    			or die("Ex&eacute;cution de la requete impossible");
    		
    		mysqli_close($id_bd);
    			 	/* Creation of the table */
    		    echo '<table>';
    			echo '<thead>';
    			echo '<tr class="titre">';
    			echo '<th> Horaire </th>';
    			echo '<th> Date </th>';
    			echo '<th> Salle </th>';
    			echo '<th> Mesure </th>';
    			echo '<th> Unité </th>';
    			echo '</tr>';
    			echo '</thead>';
				while($ligne=mysqli_fetch_array($resultat))
				{
				
					/* Extracting every row */
					extract($ligne);
					
					/* Measures insertion in the table */
					echo '<tr>';
					echo "<td> $ligne[6] </td>";
					echo "<td> $ligne[5] </td>";
					echo "<td> $ligne[3] </td>";
					echo "<td> $ligne[7] </td>";
					echo "<td> $ligne[2] </td>";
					echo '</tr>';
				}
				echo '</table>';
    	
   		?>

		<p> Vous pouvez acceder au dashboard node-red en clicquant <a href="http://localhost:1880/ui/#!/0?socketid=B13ipgP7KA3L2twRAAAB"> ici </a> </p>
		<p> Vous pouvez aussi acceder au grafan en clicquant <a href="http://localhost:3000"> ici </a>

    	<hr />

		<footer>
			<nav>
				<ul>
					<li><a href="admin_formulaire.html"> Espace Administration </a> (accès restreint) </li>
					<li><a href="gestion_authentification.html"> Espace gestionnaire </a> (accès restreint) </li>
					<li><a href="consultation.php"> Consultation des dernières valeurs </a></li>
					<li><a href="gestion_projet.html"> Gestion de projet </a></li>
					<li><a href="mentions.html"> Mentions légales </a></li>
				</ul>
			</nav>
    	</footer>

	</body>
</html>
