<?php
session_start();
include ("../modeles/Modele.php");
include ("../modeles/Modele_extend.php");
include ('Controleur_Class/Controleur_class_candidat.php');
include ('Controleur_Class/Controleur_class_vehicule.php');
include ('Controleur_Class/Controleur_class_lecon.php');
include ('Controleur_Class/Controleur_class_demandelecon.php');
include ('Controleur_Class/Controleur_class_DemandeLeconClient.php');
include ('Controleur_Class/Controleur_class_moniteur.php');
include ('Controleur_Class/Controleur_class_planning.php');
include ('Controleur_Class/Controleur_class_vueplanning.php');

$unModelExtend = new ModelExtend("localhost", "auto_ecole_ppe1", "root", "");
$unPlanning = new Planning();
$uneDemandeClient = new DemandeLeconClient();
$uneViewPlanning = new VuePlanning();
$style=null;
$chaineLecon = "";
$email = $_SESSION['mail'];
//****************** Partie d'affichage des leçons *********************************//

	$unModelExtend->renseigner("vueplanning", "mailclient");
	$resultatLecon = $unModelExtend->selectwhere($email);

	$chaineLecon = "<table class='table table-striped'>
	<tr><td>Mail du candidat </td><td> Nom du candidat</td><td>Nom du moniteur</><td>Modele de la voiture</td><td>Date de la leçon</td><td>Heure de la leçon</td><td>Etat du planning</td></tr>";				
	foreach ($resultatLecon as $value) 	
	{	
		$uneViewPlanning->renseigner($value);
		$chaineLecon .="<tr>".$uneViewPlanning->afficher()."</tr>";
	}
		$chaineLecon .= "</table>";	
//************************************INSERT DE NOUVELLE LECON********************************************//
	
		if(isset($_POST['soumettre']))
		{
			$dateDuJour = date("y-m-d");
			$aujourdhui = new DateTime($dateDuJour);
			$dateDemande = new DateTime($_POST['datelecon']);
			if( $dateDemande < $aujourdhui || $dateDemande == $aujourdhui)
			{
			    echo "Date de demande de leçon impossible";
			}
			else
			{
				$uneDemandeClient->renseigner($_POST);
				$tab = $uneDemandeClient->serialiser();							
				$tab['mailclient'] = $_SESSION['mail'];			
				$unModelExtend->renseigner("demandelecon", "id_demande");
				$unModelExtend->insert($tab);				
			}	
			
		}

/*****************************************AFFICHAGE DES DEMANDE DE LECON PAR RAPPORT AU MAIL************************************************/
			$unModelExtend->renseigner("demandelecon", "mailclient");
			$resultatLeçon = $unModelExtend->selectwhere($email);

			$chaineLeçon = "<table class='table table-striped'>
			<tr><td><b>Date Demande</b></td><td><b>Heure Demande</b></td><td><b>Mail Demandeur</b></td><td><b>Etat demande</b></td></tr>";				
			foreach ($resultatLeçon as $key => $value) 
			{				
				
				$uneDemandeClient->renseigner($value);

				if($uneDemandeClient->getetat() == "valider")
				{
					$style ="class='success'" ;					
				}
				else if ($uneDemandeClient->getetat() == "Occupé")
				{
					$style ="class='danger'";
				}
				else if ($uneDemandeClient->getetat() == "En attente")
				{
					$style ="class='info'";
				}
				else 
				{
					$style ="";
				}

				$chaineLeçon .= "<tr ".$style.">".$uneDemandeClient->afficherLecon()."</tr>";				
			}	
			$chaineLeçon .= "</table>";



if(isset($_GET['session']))
{	
	session_destroy();
}

include ("../Vues/Vue_espaceclient.html");

		
		
		