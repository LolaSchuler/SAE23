<?php
	session_start();
	$_SESSION["mdp"]=$_REQUEST["mdp"];  // Password retrieval
	$motpasse=$_SESSION["mdp"];
	$_SESSION["login"]=$_REQUEST["login"]; // Login retrieval
	$username=$_SESSION["login"];
	$_SESSION["auth"]=FALSE;

	// Authentication data verification script using the "administration" table
	
	if(empty($username) & empty($motpasse))
		header("Location:erreur_login.php");
	elseif(empty($username) | empty($motpasse))
		header("Location:erreur_login.php");
	else
     {
		include ("mysql.php");

		$requete = "SELECT `login_admin`, `MotPasse_admin` FROM `Administration`";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");
 
 		/* Comparison of data entered with what is present in the table*/
		$ligne = mysqli_fetch_row($resultat);
		if ($username==$ligne[0])
		 {
			if ($motpasse==$ligne[1])
		 	{
				$_SESSION["auth"]=TRUE;
            	mysqli_close($id_bd);
				echo "<script type='text/javascript'>document.location.replace('admin_choix_table.php');</script>";
		 	}
		}
		else	/* Destruction of session-related variables and data*/
		 {
			$_SESSION = array();
            session_destroy();
            unset($_SESSION);
            mysqli_close($id_bd);
            echo "<script type='text/javascript'>document.location.replace('erreur_login.php');</script>";
		 }
     } 
 ?>
