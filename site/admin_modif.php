<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:login_error.php");
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title> Modification de la table <?php echo $type ?> </title>
		<link rel="stylesheet" type="text/css" href="./styles/style.css" />
	</head>

	<body>
		<?php
			$type=$_POST['type'];
		?>
		<section> 
			<br />
			<form action="modif.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend> Table à modifier : <?php echo $type ?> </legend>
					<label for="type"><strong> Que voulez-vous faire ? </strong></label>
					<input type="hidden" name="table" value="<?php echo $type ?>" id ="type" />
					<br />
					<input type="radio" name="supprimer" value="Supprimer" id ="choix" />
					<label for="choix"> Supprimer une ligne </label>
					<br />
					<input type="radio" name="ajouter" value="Ajouter" id ="choix" />
					<label for="choix"> Ajouter une ligne </label>
					<br />
					
					<label for="ligne"> <strong> Quelle ligne modifier ? </strong> </label>
					<select id="ligne" name="ligne">
				
				<?php
						/* Accès à la base */
						include ("mysql.php");

						/* Sélection de la table choisie précédemment à l'aide de l'argument type */
						$requete = "SELECT * FROM `$type`";
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
								echo "<option value=\"$ligne[0]\"> $ligne[0] </option>";
							 }
						 } 
					?>
					
				</select>
				
				</fieldset>
				
				<br /> 
				
				<div class="valid">
					<input type="submit" value="Enregistrez" />
				</div>
				
			</form>
		</section>
		
		<footer>
			<p><a href="index.php">Retour à la page d'accueil</a></p>
			<p><a href="admin_choix_table.html">Retour au choix de la table</a></p>
		</footer>
		
	</body>
</html>
