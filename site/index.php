<!DOCTYPE html>
<html lang="fr">
	<head>
    	<title>SAE23 - Accueil</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="CTL" />
    	<meta name="description" content="Accueil" />
    	<meta name="keywords" content="HTML, CSS" />
    	<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
	</head>

	<body>
    	<header>
			<h1> Accueil </h1> 
			<p> Bienvenue sur notre site Web de SAE 23 ! </p>
    	</header>
    
    	<section>
    
    		<h2> Objectif du site </h2>
        
    		<p> Dans le prolongement de la sae 15, qui était individuelle, cette SAE correspond à une solution plus large que du simple traitement de données. </p>
    
    		<p> Lors de la SAE 23, "Mettre en place une solution informatique pour l'entreprise", il nous a été demandé de développer une solution informatique ayant pour but de centraliser des données issues de capteurs. Plus que cela, nous devions aussi offrir une interface homme-machine (IHM) qui devait permettre à un utilisateur de pouvoir effectuer des modifications sur la base de données. </p>

			<br/>

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
    
    		<table>
    			<tr class="titre">
    				<th> Bâtiment </th>
    				<th> Nom du bâtiment </th>
    			</tr>
    
    			<?php
    
    				include ("mysql.php");
    
    				$requete = "SELECT `ID_bat`, `nom` FROM `Batiment` ORDER BY `ID_bat`";
					$resultat = mysqli_query($id_bd, $requete)
						or die("Ex&eacute;cution de la requete impossible");
	
					mysqli_close($id_bd);
    
    				/*Affichage de la liste des bâtiments*/
    
					while($ligne=mysqli_fetch_array($resultat))
						{
							extract($ligne);
							echo '<tr>';
							echo "<th> $ligne[0] </th>";
							echo "<th> $ligne[1] </th>";
							echo '</tr>';
						}
    
    			?>
    
    		</table>
    
    		<p> Attention : Pour des raisons de sécurité, nous avons choisi de ne pas afficher le nom des gestionnaires des bâtiments. </p>
    
    	</section>
    
    
    	<section>
    
    		<h2> Affichage des salles équipées </h2>
        
    		<table>
    			<tr class="titre">
    			<th> Nom de salle </th>
    			<th> Type de salle </th>
    			<th> Capacité de la salle </th>
    			</tr>
    
    			<?php
    
    				include ("mysql.php");
    
    				$requete = "SELECT * FROM `Salle` ORDER BY `ID_bat`";
					$resultat = mysqli_query($id_bd, $requete)
						or die("Ex&eacute;cution de la requete impossible");
	
					mysqli_close($id_bd);
    
    				/*Affichage de la liste des salles*/

					while($ligne=mysqli_fetch_array($resultat))
						{
							extract($ligne);
							echo '<tr>';
							echo "<th> $ligne[0] </th>";
							echo "<th> $ligne[1] </th>";
							echo "<th> $ligne[2] personnes </th>";
							echo '</tr>';
						}
    
    			?>
    
    		</table>
    	</section>
    
    	<hr />

		<footer>
			<nav>
				<ul>
					<li><a href="admin_formulaire.html"> Espace Administration </a> (accès restreint) </li>
					<li><a href="gestion_authentification.html"> Espace gestionnaire </a> (accès restreint) </li>
					<li><a href="consultation.php"> Consultation des dernières valeurs </a></li>
					<li><a href="gestion_projet.html"> Gestion de projet </a></li>
					<li><a href="mentions.html"> Mentions légales </a></li>
				</ul>
			</nav>
    	</footer>

	</body>
</html>
