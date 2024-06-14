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
		<h2> Table à modifier : <?php echo $type ?> </h2>
	</header>
	
	<section> 
		<br />
		<form action="admin_exec_modif.php" method="post" enctype="multipart/form-data">
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
							or ("Location:erreur_execution.php");
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
							or die("Location:erreur_execution.php");
						mysqli_close($id_bd);
						
						$ligne2=mysqli_fetch_array($resultat2);
						$_SESSION['titre']=$ligne2[0];
						
						$j=0;
							
						$k=true;
						while ($ligne3=mysqli_fetch_array($resultat2))
						{
							extract($ligne3);
							if ($k)
							{
								$j=$j+1;
								$valeur="valeur".$j;
								echo "<br />";
								echo "<p>
										<label for \"$valeur\"> Valeur pour le champ \"$ligne3[0]\" : </label>
										<input type=\"text\" name=\"$valeur\" id=\"$valeur\" />
									</p>";
							}
						 }
							 
							 //$_SESSION['titre']=$ligne2[0];
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
