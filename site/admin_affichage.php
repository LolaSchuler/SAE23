<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Administrateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Administrateur" />
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

    <h2> Affichage de la table </h2>
    <p> La table a bien été modifiée ! </p>
    
    <?php 
    
    	session_start();
		if ($_SESSION["auth"]!=TRUE)
			header("Location:erreur_login.php");
			
		$titre=$_SESSION['titre'];
		$table=$_SESSION['table'];
			
    	include ("mysql.php");
    	
    	$requete = "SELECT * FROM `$table`"; 
		$resultat = mysqli_query($id_bd, $requete)
			or die("Ex&eacute;cution de la requete impossible");
		
		$requete2 = "DESCRIBE `$table`";
		$resultat2 = mysqli_query($id_bd, $requete2)
			or ("Location:erreur_execution.php");
		
		mysqli_close($id_bd);
    	
   		/*Display of the columns' name of the table just modified*/
    	
    	echo '<table>';
    	echo '<tr class="titre">';
    	
		while ($ligne2=mysqli_fetch_array($resultat2))
		{
			extract($ligne2);
			echo "<th> $ligne2[0] </th>";
		}
		
		echo '</tr>';
		
		/*Display of the rows of the table just modified*/
		
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
    	
    ?>
    <p><a href="admin_choix_table.php"> Modifier une autre table </a></p>

    </section>

	<hr/>

	<footer>
		<nav>
			<ul>
				<li><a href="index.php"> Retour à la page d'accueil </a></li>
				<li><a href="gestion_authentification.html"> Espace gestionnaire </a> (accès restreint) </li>
				<li><a href="consultation.php"> Consultation des dernières valeurs </a></li>
				<li><a href="gestion_projet.html"> Gestion de projet </a></li>
				<li><a href="mentions.html"> Mentions légales </a></li>
			</ul>
		</nav>
    </footer>

</body>
</html>
