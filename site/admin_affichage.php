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
    <h1> Affichage de la table <h1>
    <p> La table a bien été modifiée ! </p>
    </header>
    
    <section>
    
    <?php
    
    include ("mysql.php");
    
    $requete = "SELECT * FROM `Batiment`"; 
    /*Comment faire pour afficher la table qui vient d'être modifiée sans créer 20 scripts ? */
	$resultat = mysqli_query($id_bd, $requete)
		or die("Ex&eacute;cution de la requete impossible");
	
	mysqli_close($id_bd);
    
    /*Affichage de la liste des bâtiments*/
    
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th> Bâtiment </th>';
    echo '<th> Nom du bâtiment </th>';
    echo '</tr>';
    echo '</thead>';
	while($ligne=mysqli_fetch_array($resultat))
	{
		extract($ligne);
		echo '<tr>';
		echo "<th> $ligne[0] </th>";
		echo "<th> $ligne[1] </th>";
		echo '</tr>';
	}
	echo '</table>';
    
    ?>
    
    </section>
    
    <footer>
    
    <p><a href="index.php"> Retour à la page d'accueil </a></p>
    
    </footer>

</body>
</html>
