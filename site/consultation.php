<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Consultation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Consultation" />
    <meta name="keywords" content="HTML, CSS" />
    <meta http-equiv="refresh" content="300">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
    <header>
    	<h1>Consultation</h1>
    	<p>Ici, vous pouvez visualiser les dernières mesures efféctuée sur chaques salles.</p>
    </header>
    	<?php
    		include ("mysql.php");
    		
    		/* $requete = " SELECT * FROM `Mesure` ORDER BY `date` DESC, `horaire` DESC INNER JOIN Capteur ON Mesure.Nom_capt = Capteur.Nom_capt;"; */
    			$requete = " SELECT * FROM `Capteur` INNER JOIN Mesure ON Capteur.Nom_capt = Mesure.Nom_capt ORDER BY Mesure.date DESC, Mesure.horaire DESC LIMIT 4;";
    		$resultat = mysqli_query($id_bd, $requete)
    			or die("Ex&eacute;cution de la requete impossible");
    		
    		mysqli_close($id_bd);
    
    		    echo '<table>';
    			echo '<thead>';
    			echo '<tr>';
    			echo '<th> Horaire </th>';
    			echo '<th> date </th>';
    			echo '<th> Salle </th>';
    			echo '<th> mesure </th>';
    			echo '<th> unité </th>';
    			echo '</tr>';
    			echo '</thead>';
				while($ligne=mysqli_fetch_array($resultat))
				{
					extract($ligne);
					echo '<tr>';
					echo "<th> $ligne[6] </th>";
					echo "<th> $ligne[5] </th>";
					echo "<th> $ligne[3] </th>";
					echo "<th> $ligne[7] </th>";
					echo "<th> $ligne[2] </th>";
					echo '</tr>';
				}
				echo '</table>';
    
    	
   		?>
    <footer>
    
    </footer>

</body>
</html>
