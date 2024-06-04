<?php
	// Démarrage de la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Identification erron&eacute;e</title>
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
		<!-- Affichage entete -->
		<?php 
			$_SESSION = array(); // Réinitialisation du tableau de session
			session_destroy();   // Destruction de la session
			unset($_SESSION);    // Destruction du tableau de session
		?>

<section>
<br />

	<h1>Administration de la base : </h1>
	<p><strong> /!\ Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es /!\ </strong></p>
			<br />
			<p class="erreur">Mot de passe non saisi ou erron&eacute; !!!</p>
			<br />
			<hr />
		</section>
		<footer>
			<p><a href="catalogue.php">Retour au catalogue</a></p>
			<p><a href="admin_formulaire.html">Retour à l'identification</a></p>
		</footer>
	</body>
</html>
