<?php
	
	session_start();
	if ($_SESSION["auth"]!=TRUE)
		header("Location:erreur_login.php");

	// Variable retrieval

	$_SESSION['table']=$_POST['table'];
	$table=$_SESSION['table'];
	
	$supp=$_POST['supprimer'];
	$ligne=$_POST['ligne'];
	
	$ajout=$_POST['ajouter'];
	$valeur1=$_POST['valeur1'];
	$valeur2=$_POST['valeur2'];
	$valeur3=$_POST['valeur3'];
	$valeur4=$_POST['valeur4'];
	
	$titre=$_SESSION['titre'];
	

	// Table modification request execution scripts

		include ("mysql.php");
		
		/* Test to know which option has been previously chosen and act accordingly*/
		if ($ajout==1)
		 {
			switch ($table)
			{
			case "Batiment":
				$requete1 = "INSERT INTO `$table` (`ID_bat`, `nom`, `login_gest`, `MotPasse_gest`) 
							VALUES ('$valeur1', '$valeur2', '$valeur3', '$valeur4')";
				$resultat = mysqli_query($id_bd, $requete1)
					or ("Location:erreur_execution.php");
				echo "<script type='text/javascript'>document.location.replace('admin_affichage.php');</script>";
				break;
			case "Capteur":
				$requete1 = "INSERT INTO `$table` (`Nom_capt`, `Type`, `Unite`, `Nom_salle`) 
							VALUES ('$valeur1', '$valeur2', '$valeur3', '$valeur4')";
				$resultat = mysqli_query($id_bd, $requete1)
					or ("Location:erreur_execution.php");
				echo "<script type='text/javascript'>document.location.replace('admin_affichage.php');</script>";
				break;
			case "Salle":
				$requete1 = "INSERT INTO `$table` (`Nom_salle`, `Type`, `CapaciteAccueil`, `ID_bat`) 
							VALUES ('$valeur1', '$valeur2', '$valeur3', '$valeur4')";
				$resultat = mysqli_query($id_bd, $requete1)
					or ("Location:erreur_execution.php");
				echo "<script type='text/javascript'>document.location.replace('admin_affichage.php');</script>";
				break;
			}
		}
		elseif ($supp==1)
		{
			$requete2 = "DELETE FROM `sae23`.`$table` WHERE `$table`.`$titre` = '$ligne'";
			$resultat = mysqli_query($id_bd, $requete2)
				or ("Location:erreur_execution.php");
			echo "<script type='text/javascript'>document.location.replace('admin_affichage.php');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>document.location.replace('admin_choix_table.php');</script>";
		}
		
 ?>
