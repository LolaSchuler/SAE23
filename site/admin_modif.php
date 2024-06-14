<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");
		
	$type=$_POST['type'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Gestion de projet</title>
    <meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1" />
   	<meta name="author" content="CTL" />
   	<meta name="description" content="Gestion de projet" />
   	<meta name="keywords" content="HTML, CSS" />
   	<link rel="preconnect" href="https://fonts.googleapis.com">
   	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">
   	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
	
	<header>
		<h1> Espace administrateur </h1>
	</header>
	
	<section> 
		<br />
		<form action="admin_exec_modif.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Supprimer un(e) <?php echo $type ?> </legend>
				<label for="type"><strong> Souhaitez-vous effectuer cette action ? </strong></label>
				<input type="hidden" name="table" value="<?php echo $type ?>" id ="type" />
				<br />
				<input type="radio" name="supprimer" value="1" id ="supprimer" />
				<label for="supprimer"> Oui </label>
				<input type="radio" name="supprimer" value="0" id ="supprimer" checked />
				<label for="supprimer"> Non </label>
				<br />
				<label for="ligne"> <strong> Que voulez-vous supprimer ? </strong> </label>
				<select id="ligne" name="ligne">

				<?php
						/* Accès à la base */
						include ("mysql.php");

						/* Sélection de la table choisie précédemment à l'aide de l'argument type */
						$requete = "SELECT * FROM `$type`";
						$resultat = mysqli_query($id_bd, $requete)
							or ("Location:erreur_execution.php");
						mysqli_close($id_bd);

						while($ligne=mysqli_fetch_array($resultat))
						 {
							extract($ligne);
							echo "<br />";
							echo "<option value=\"$ligne[0]\"> $ligne[0] </option>";
						 } 
					?>
					
				</select>
				
			</fieldset>
				
			<fieldset>
				<legend> Ajouter un(e) <?php echo $type ?> </legend>
					<label for="ajout"> <strong> Souhaitez-vous effectuer cette action ? </strong> </label>
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
							or die("Location:erreur_execution.php");
						mysqli_close($id_bd);
						
						$j=0;
							
						while ($ligne2=mysqli_fetch_array($resultat2))
						{
							extract($ligne2);
							if ($j==0)
							{
								$_SESSION['titre']=$ligne2[0];
							}
							$j=$j+1;
							$valeur="valeur".$j;
							echo "<br />";
							echo "<p>
									<label for \"$valeur\"> Quel(le) $ligne2[0] : </label>
									<input type=\"text\" name=\"$valeur\" id=\"$valeur\" />
								</p>";
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
	<nav>
		<ul>
			<li><a href="index.php">Retour à la page d'accueil</a></li>
			<li><a href="admin_choix_table.php">Retour au choix de la table</a></li>
		</ul>
	</nav>
</footer>
		
</body>
</html>
