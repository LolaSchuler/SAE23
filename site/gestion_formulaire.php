<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SAE23 - Espace Gestionnaire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />						<!-- Pour bien gérer le RWD -->
    <meta name="author" content="CTL" />
    <meta name="description" content="Espace Gestionnaire" />
    <meta name="keywords" content="HTML, CSS" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300&display=swap" rel="stylesheet">		<!-- Pour avoir Lexend si on veut.... -->
    <link rel="stylesheet" type="text/css" href="./styles/style1.css" media="screen" />
</head>

<body>
    <header>
		<nav>
			<ul>
				<li><a href="./index.html">Accueil</a></li>
				<li><a href="./consultation.html">Consultation</a></li>
				<li><a href="./admin_authentification.html">Espace Administrateur</a></li>
				<li><a href="./gestion_authentification.html">Espace Gestionnaires</a></li>
			</ul>
		</nav>
    </header>

	<h1>Espace Gestionnaire</h1>

	<p>
		Veuillez choisir un capteur ainsi qu'une durée :
	</p>

	<form name="gestion_choix" action="./gestion_affichage.html" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Choix</legend>

			<?php
				<p>
					/* Accès à la base */
					include ("connexion_sql.php");

					/* Sélectionner tous les capteurs de la table capteur qui appartiennent au bâtiment du gestionnaire*/
					$requete = "SELECT * FROM `Type` ORDER BY `CodeType`"
					$resultat = mysqli_query($id_bd, $requete)
						or die ("Execution de la requête impossible : $requete");
					mysqli_close($id_bd);

					$i = true ;
					while($ligne=mysqli_fetch_array($resultat))
						{
							extract($ligne);
							if ($i)
								{
									echo '<label for="capteur">Capteur : </label>';
									echo '<select id="capteur" name="capteur">';
									echo '<option value="NOM DE LA COLONNE A CHANGER ATTENTION" selected="selected">NOM DE LA COLONNE A CHANGER ATTENTION</option>';
									$i=false;
								}
							else
								{
									echo '<option value="NOM DE LA COLONNE A CHANGER ATTENTION">NOM DE LA COLONNE A CHANGER ATTENTION</option>';
								}
						}
					echo '</select>';

				</p>
			?>

		</fieldset>
		<p>
			<input type="submit" value="Faites votre choix" />
		</p>
	</form>

    <footer>
    </footer>

</body>
</html>
