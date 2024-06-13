<?php
	session_start();
	$_SESSION["mdp"]=$_REQUEST["mdp"];  // Récupération du mot de passe 
	$motpasse=$_SESSION["mdp"];
	$_SESSION["login"]=$_REQUEST["login"]; // Récupération du compte
	$username=$_SESSION["login"];
	$_SESSION["auth"]=FALSE;

	// Script de vérification du mot de passe d'administration, en utilisant la table Administration

	if(empty($username) & empty($motpasse))
		header("Location:erreur_login.php");
	else
     {
		/* Accès à la base */
		include ("mysql.php");

		$requete = "SELECT `login_admin`, `MotPasse_admin` FROM `Administration`";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");

		$ligne = mysqli_fetch_row($resultat);
		if ($username==$ligne[0])
		 {
			if ($motpasse==$ligne[1])
		 	{
				$_SESSION["auth"]=TRUE;		
            	mysqli_close($id_bd);
				echo "<script type='text/javascript'>document.location.replace('admin_choix_table.html');</script>";
		 	}
		}
		else
		 {
			$_SESSION = array(); // Réinitialisation du tableau de session
            session_destroy();   // Destruction de la session
            unset($_SESSION);    // Destruction du tableau de session
            mysqli_close($id_bd);
            echo "<script type='text/javascript'>document.location.replace('erreur_login.php');</script>";
		 }
     } 
 ?>