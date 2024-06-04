<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:login_error.php");
?>

<!DOCTYPE html>
<!-- PAS FINI
Programme originel: choix_type.php
Description: Affiche pour sélection la liste des types de pièces proposées, à partir de la table Type
-->
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Choix de la table à modifier</title>
		<link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	</head>

	<body>
		<section>
			<br />
			<form action="admin_batiment.php" method="post" enctype="multipart/form-data"> <!-- Reprendre script nouvellepiece.php -->
				<fieldset class="gauche">
					<legend>Choisissez la table à modifier</legend>
					<?php
						/* Accès à la base */
						include ("mysql.php");

						/* Sélection des différents bâtiments présents dans la table Batiment */
						$requete = "SELECT * FROM `Batiment` ORDER BY `ID_bat`";
						$resultat = mysqli_query($id_bd, $requete)
							or die("Ex&eacute;cution de la requete impossible");
						mysqli_close($id_bd);

						$i=true;		
						while($ligne=mysqli_fetch_array($resultat))
						 {
							extract($ligne);
							echo "<br />";
							if ($i)
							 {
								echo '<input type="radio" name="type" value="'.$CodeType.'" id ="'.$CodeType.'" checked="checked" /> ' ;
								/* CodeType = valeur définie dans admin_batiment.php */
								echo '<label for="'.$CodeType.'"><strong>'.$LibelleType.'</strong></label><br />';
								$i=false;
							 }
							else
							 {
								echo '<input type="radio" name="type" value="'.$CodeType.'" id ="'.$CodeType.'" /> ' ;
								echo '<label for="'.$CodeType.'"><strong>'.$LibelleType.'</strong></label><br />';
							 }  
						 } 
					?>
				</fieldset>
				<div class="valid">
					<input type="submit" value="Faites votre choix" />
				</div>
			</form>
		</section>
	</body>
</html>
