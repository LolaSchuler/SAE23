<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Administrateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Administrateur" />
    <meta name="keywords" content="HTML, CSS" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
    <header>
    <h1> Affichage de la table </h1>
    <p> La table a bien été modifiée ! </p>
    </header>
    
    <section>
    
    <?php 
    /* A modifier avec des variables */
    
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
    
    /*Affichage de la liste des bâtiments*/
    
    echo '<table>';
    echo '<tr>';
    
    $k=true;
	while ($ligne2=mysqli_fetch_array($resultat2))
	{
		extract($ligne2);
		if ($k)
		{
			echo "<th> $ligne2[0] </th>";
		}
	}
	
	echo '</tr>';
	
	
	while($ligne=mysqli_fetch_array($resultat))
	{
		extract($ligne);
		echo '<tr>';
		echo "<th> $ligne[0] </th>";
		echo "<th> $ligne[1] </th>";
		echo "<th> $ligne[2] </th>";
		echo "<th> $ligne[3] </th>";
		echo '</tr>';
	}
	echo '</table>';
    
    ?>
    
    </section>
    
    <footer>
    
    <p><a href="index.php"> Retour à la page d'accueil </a></p>
    <p><a href="admin_choix_table.html"> Modifier une autre table </a></p>
    
    </footer>

</body>
</html>
