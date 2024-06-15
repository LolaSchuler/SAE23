<?php
	// Session start
	session_start();
	$_SESSION["mdp"]=$_REQUEST["mdp"];  // Gets the password from the form on the previous page
	$motpasse=$_SESSION["mdp"];
	$_SESSION["login"]=$_REQUEST["login"]; // Gets the login from the form on the previous page
	$username=$_SESSION["login"]; // Stores the username used as a login in the SESSION array for future use
	$_SESSION["auth"]=FALSE; // Sets the authorized authentication value at FALSE

	// Script that verifies that the user who's trying to log in is referenced in the database

	// Verification that all of the fields in the form were filled
	if(empty($username) & empty($motpasse))
		header("Location:erreur_login.php");
	elseif(empty($username) | empty($motpasse))
		header("Location:erreur_login.php");

	else
     {
		/* Access to the database */
		include ("mysql.php");

		// SQL request to extract the authorized login and password from the database
		$requete = "SELECT `login_gest`, `MotPasse_gest` FROM `Batiment`";
		$resultat = mysqli_query($id_bd, $requete)
			or ("Location:erreur_execution.php");

		// Goes through the SQL results to see if the login and password that were entered are authorized
		while($ligne = mysqli_fetch_row($resultat))
		foreach ($ligne as $cle => $valeur)
			{
				if ($username==$ligne[0])
				 	{
						if ($motpasse==$ligne[1])
		 				{
							$_SESSION["auth"]=TRUE;		
            				mysqli_close($id_bd);
							$_SESSION["login"]=$username;
							header("Location: ./gestion_formulaire.php");
  							exit();
		 				}
					}
			}

		// If the login and password that were entered aren't authorized, closes the session and redirects the user to an error page
		$_SESSION = array(); // Réinitialisation du tableau de session
        session_destroy();   // Destruction de la session
        unset($_SESSION);    // Destruction du tableau de session
        mysqli_close($id_bd);
        echo "<script type='text/javascript'>document.location.replace('erreur_login.php');</script>";

     } 
 ?>
