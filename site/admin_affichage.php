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
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
    <header>
    <h1> Administration de la base </h1>
    <h2> Affichage de la table </h2>
    <p> La table a bien été modifiée ! </p>
    </header>
    
    <section>
    
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
    
    /*Affichage de la liste des bâtiments*/
    
    echo '<table>';
    echo '<tr class="titre">';
    
	while ($ligne2=mysqli_fetch_array($resultat2))
	{
		extract($ligne2);
		echo "<th> $ligne2[0] </th>";
	}
	
	echo '</tr>';
	
	
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
    <p><a href="admin_choix_table.html"> Modifier une autre table </a></p>

    </section>

	<hr/>

	<footer>
		<p><a href="index.php"> Retour à la page d'accueil </a></p>
		<p><a href="admin_formulaire.html"> Gestion de la base de données </a> (accès restreint) </p>
		<p><a href="gestion_authentification.html"> Gestion des capteurs </a> (accès restreint) </p>
		<p><a href="consultation.php"> Consultation des dernières valeurs </a></p>
		<p><a href="gestion_projet.html"> Gestion de projet </a></p>
		<p><a href="mentions.html"> Mentions légales </a></p>
    </footer>

</body>
</html>
