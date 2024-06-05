<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Consultation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Consultation" />
    <meta name="keywords" content="HTML, CSS" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style1.css" media="screen" />
</head>

<body>
    <header>
    	<h1>Consultation</h1>
    	<p>Ici, vous pouvez visualiser les dernières mesures de chaque capteur.</p>
    </header>
    	<?php
    		include ("mysql.php");
    		
    		$requete = " SELECT * FROM `Mesure` ";
    		$resultat = mysql_query($id_bd, $requete)
    			or die("Ex&eacute;cution de la requete impossible");
    		
    		mysqli_close($id_bd);
    		
    		
    <footer>
    
    </footer>

</body>
</html>
