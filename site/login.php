<?php
	session_start();
	$_SESSION["mdp"]=$_REQUEST["mdp"];  // Récupération du mot de passe 
	$motdep=$_SESSION["mdp"];
	$_SESSION["auth"]=FALSE;

	// Script de vérification du mot de passe d'administration, en utilisant la table Administration

	if(empty($motdep))
		header("Location:login_error.php");
	else
     {
		/* Accès à la base */
		include ("mysql.php");

		//$requete1 = "SELECT `login_admin` FROM `Administration`";
		$requete = "SELECT `MotPasse_admin` FROM `Administration`";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete1 ; $requete2");

		$ligne = mysqli_fetch_row($resultat);
		if ($motdep==$ligne[0])
		 {
			$_SESSION["auth"]=TRUE;		
            mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('admin_choix_table.php');</script>";
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
