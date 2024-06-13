<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Accueil" />
    <meta name="keywords" content="HTML, CSS" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
</head>

<body>
    <header>
	<h1> Accueil </h1> 
	<p> Bienvenue sur notre site Web de SAE 23 ! </p>
    </header>
    
    <section>
    
    <h2> Objectif du site </h2>
        
    <p> Dans le prolongement de la sae 15, qui était individuelle, cette SAE correspond à une solution plus large que dutraitement de données simple. </p>
    
    <p> Lors de la SAE 23, "Mettre en place une solution informatique pour l'entreprise", il nous a été demandé de développer une solution informatique ayant pour but de centraliser des données issues de capteurs. Plus que cela, nous devions aussi offrir une interface homme-machine (IHM) qui devait permettre à un utilisateur de pouvoir effectuer des modifications sur la base de données. </p>
    
    <p> Les compétences mobilisées lors de cette SAE correspondent à : </p>
    <ul>
    	<li> Savoir programmer des scripts en Bash </li>
    	<li> Utilisation et gestion de conteneurs </li>
    	<li> Ecrire un site Web dynamique (et donc utilisation du HTML5, CSS3 et de PHP) </li>
    	<li> Documenter les codes en anglais </li>
    	<li> Utiliser les mécanismes de gestion de projet (Trello, Crontab, Drive partagé) </li>
    	<li> Utiliser un environnement propice au travail collaboratif (avec GitHub) </li>
    </ul>
    
    </section>
    
    
    <section>
    
    <h2> Affichage des bâtiments gérés </h2>
    
    <?php
    
    include ("mysql.php");
    
    $requete = "SELECT `ID_bat`, `nom` FROM `Batiment` ORDER BY `ID_bat`";
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
    
    <p> Attention : Pour des raisons de sécurité, nous avons choisi de ne pas afficher le nom des gestionnaires des bâtiments. </p>
    
    </section>
    
    
    <section>
    
    <h2> Affichage des salles équipées </h2>
    
    <?php
    
    include ("mysql.php");
    
    $requete = "SELECT * FROM `Salle` ORDER BY `ID_bat`";
	$resultat = mysqli_query($id_bd, $requete)
		or die("Ex&eacute;cution de la requete impossible");
	
	mysqli_close($id_bd);
    
    /*Affichage de la liste des salles*/
    
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th> Nom de salle </th>';
    echo '<th> Type de salle </th>';
    echo "<th> Capacité d'accueil de la salle </th>";
    echo '</tr>';
    echo '</thead>';
	while($ligne=mysqli_fetch_array($resultat))
	{
		extract($ligne);
		echo '<tr>';
		echo "<th> $ligne[0] </th>";
		echo "<th> $ligne[1] </th>";
		echo "<th> $ligne[2] personnes </th>";
		echo '</tr>';
	}
	echo '</table>';
    
    ?>
    
    </section>
    
    
    <footer>
    
    <hr />
    
    <p><a href="admin_formulaire.html"> Gestion de la base de données </a> (accès restreint) </p>
    <p><a href="gestion_authentification.html"> Gestion des capteurs </a> (accès restreint) </p>
    <p><a href="consultation.php"> Consultation des dernières valeurs </a></p>
    <p><a href="gestion_projet.html"> Gestion de projet </a></p>
    <p><a href="mentions.html"> Mentions légales </a></p>
    
    </footer>

</body>
</html>
