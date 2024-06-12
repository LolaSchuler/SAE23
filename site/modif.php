<?php

	$supp=$_POST['supprimer'];
	$ajout=$_POST['ajouter'];
	$ligne=$_POST['ligne'];
	$table=$_POST['table'];
	

	// Script d'exécution de la requête de modification de table

		/* Accès à la base */
		include ("mysql.php");
		
		if ($ajout!=0)
		 {
			$requete1 = "INSERT INTO `$table` (`ID_bat`, `nom`, `login_gest`, `MotPasse_gest`) VALUES ('', '', '', '')";
			$resultat1 = mysqli_query($id_bd, $requete1)
				or die("Execution de la requete impossible : $requete");
		}
		else 
		{
			$requete2 = "SELECT * FROM `$table`";
			$resultat2 = mysqli_query($id_bd, $requete2)
				or die("Execution de la requete impossible : $requete");
		}
		

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
