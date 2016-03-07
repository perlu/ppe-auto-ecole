<?php
session_start();
include ("../Modeles/Modele.php");
include ("../Modeles/Modele_extend.php");
include ('Controleur_class/Controleur_class_moniteur.php');
include ('Controleur_class/Controleur_class_VueConnexionMoniteur.php');
include ('../Vues/Vue_connexion.html');
$unModel = new Modele("localhost", "auto_ecole_ppe1", "root", "");
$unModelextend = new ModelExtend("localhost", "auto_ecole_ppe1", "root", "");

if(isset($_POST['connexion']))
{	
	$typemail = "";
	$mdpTable = "";
	$mail = $_POST['mail'];		
	$mdp = $_POST['mdp'];
	/**********************************************************CONNEXION CANDIDAT********************************************************/	
	if($_POST['categorie'] == 'Candidat')
	{
		try
		{	
			$typemail = "mailclient";
			$mdpTable = "mdpcandidat";
			$unModelextend->renseigner("candidat","numclient");
			$resultat = $unModelextend->selectwhereconnexion($mdpTable, $typemail, $mail);						
			if($resultat == false)
			{
				echo "Requette non effectuée.<br/>";
			}			
			
			foreach ($resultat as $key => $value)
			{
				if($value == $mdp)
				{
					$_SESSION['mail'] = $mail;
					header('Location: Controleur_espace_candidat.php');	
				}								
			}
		}
		catch(EXEPTION $e)
		{
			echo "ERREUR :".$e;
		}
	}
	/**********************************************************CONNEXION MONITEUR********************************************************/	
	else if($_POST['categorie'] == 'Moniteur')
	{
		$typemail = "mailmoniteur";
		$mdpTable = "mdpmoniteur";
		$unModelextend->renseigner("moniteur","nummoniteur");
		try
		{
			$resultat = $unModelextend->selectwhereconnexion($mdpTable, $typemail, $mail);			
			if($resultat == false)
			{
				echo "Requette non effectuée.<br/>";
			}			
			foreach ($resultat as $key => $value)
			{
				if($value == $mdp)
				{
					$_SESSION['mail'] = $mail;
					header('Location: Controleur_espace_moniteur.php');	
				}				
			}
		}
		catch(EXEPTION $Se)
		{
			echo "Erreur :".$e;
		}
	}
/**********************************************************CONNEXION ADMIN********************************************************/	
	else if($_POST['categorie'] == 'Administration')
	{
		$typemail = "mailadmin";
		$mdpTable = "mdpadmin";
		$unModelextend->renseigner("admin","numadmin");
		try
		{
			$resultat = $unModelextend->selectwhereconnexion($mdpTable, $typemail, $mail);
			
			if($resultat == false)
			{
				echo "Requette non effectuée.<br/>";
			}
			else
			{	
				foreach ($resultat as $key => $value)
				{
					
					if($value == $mdp)
					{

						$_SESSION['mail'] = $mail;
						header('Location: Controleur_espace_admin.php?form=0');	
					}				
				}	
			}
		}
		catch(EXEPTION $Se)
		{
			echo "Erreur :".$e;
		}
	}	
}
?>
