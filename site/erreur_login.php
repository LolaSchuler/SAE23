<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    	<title>Identification erron&eacute;e</title>
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

	<!-- Authentication error page -->

	<body>
		<?php 
			$_SESSION = array(); // Resets the SESSION table
			session_destroy();   // Destroys the session
			unset($_SESSION);    // Destroys the SESSION table
		?>

		<section>
			<br />

			<h1>Accès administration et gestion : </h1>
			<p><strong> /!\ Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es /!\ </strong></p>
			<br />
			<p> Mot de passe non saisi ou erron&eacute; !!!</p>
			<br />
			<hr />
		</section>
		<footer>
			<p><a href="index.php">Retour à la page d'accueil </a></p>
			<p><a href="admin_formulaire.html">Retour à l'authentification (Espace Administrateur) </a></p>
			<p><a href="gestion_authentification.html">Retour à l'authentification (Espace Gestionnaire) </a></p>
		</footer>
	</body>
</html>
