<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");
		
	$type=$_POST['type'];
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title> Modification de la table <?php echo $type ?> </title>
		<link rel="stylesheet" type="text/css" href="./styles/style.css" />
	</head>

	<body>
	
	<header>
	<h1> Table à modifier : <?php echo $type ?> </h1>
	</header>
	
		<section> 
			<br />
			<form action="modif.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend> Supprimer une ligne </legend>
					<label for="type"><strong> Souhaitez-vous supprimer une ligne ? </strong></label>
					<input type="hidden" name="table" value="<?php echo $type ?>" id ="type" />
					<br />
					<input type="radio" name="supprimer" value="1" id ="supprimer" />
					<label for="supprimer"> Oui </label>
					<input type="radio" name="supprimer" value="0" id ="supprimer" checked />
					<label for="supprimer"> Non </label>
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
				
				<fieldset>
					<legend> Ajouter une ligne </legend>
						<label for="ajout"><strong> Voulez-vous ajouter une ligne ? </strong></label>
						<input type="hidden" name="ajout" id ="ajout" />
						<input type="radio" name="ajouter" value="1" id ="ajouter" />
						<label for="ajouter"> Oui </label>
						<input type="radio" name="ajouter" value="0" id ="ajouter" checked />
						<label for="ajouter"> Non </label>
						
						<?php
							/* Accès à la base */
							include ("mysql.php");
	
							/* Sélection de la table choisie précédemment à l'aide de l'argument type */
							$requete2 = "DESCRIBE `$type`";
							$resultat2 = mysqli_query($id_bd, $requete2)
								or die("Ex&eacute;cution de la requete impossible");
							mysqli_close($id_bd);
							
							$ligne2=mysqli_fetch_array($resultat2);
							extract($ligne2);
							$_SESSION['titre']=$ligne2[0];
							echo "<p>
										<label for \"valeur1\"> Valeur pour le champ \"$ligne2[0]\" : </label>
										<input type=\"text\" name=\"valeur1\" id=\"valeur1\" />	
									</p>";
							
							$j=true;		
							while($ligne2=mysqli_fetch_array($resultat2))
						 	{
								extract($ligne2);
								echo "<br />";
								if ($j)
							 	{
									echo "<p>
											<label for \"$ligne2[0]\"> Valeur pour le champ \"$ligne2[0]\" : </label>
											<input type=\"text\" name=\"$ligne2[0]\" id=\"$ligne2[0]\" />
										</p>";	/* A REVOIR */
							 	}
							 }
						?>
				
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
