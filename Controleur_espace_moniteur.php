<?php
session_start();
include ("../modeles/Modele.php");
include ("../modeles/Modele_extend.php");
include ('Controleur_Class/Controleur_class_candidat.php');
include ('Controleur_Class/Controleur_class_vehicule.php');
include ('Controleur_Class/Controleur_class_lecon.php');
include ('Controleur_Class/Controleur_class_moniteur.php');
include ('Controleur_Class/Controleur_class_planning.php');
include ('Controleur_Class/Controleur_class_vueplanning.php');

$unModel = new Modele("localhost", "auto_ecole_ppe1", "root", "");
$unCandidat = new candidat();
$style = "";	
$chaineLecon = "";
//****************** Partie d'affichage des leçons *********************************//

	$unModel->renseigner("vueplanning", "mailclient");
	$resultatLecon = $unModel->selectAll();
	$chaineLecon = "<table class='table table-striped'>
	<tr><td> Nom du candidat</td><td>Nom du moniteur</><td>Modele de la voiture</td><td>Date de la leçon</td><td>Heure de la leçon</td><td>Etat du planning</td></tr>";				
	foreach ($resultatLecon as $key => $value) 	
	{				
		$uneViewPlanning = new VuePlanning();
		$uneViewPlanning->renseigner($value);

		$chaineLecon .= "<tr>".$uneViewPlanning->afficher();
		$chaineLecon .="<td>"
 				 	 ."<a href='Controleur_planning_candidat.php?action=1'><span class='glyphicon glyphicon-ok'></span>"
 				 	 ."<a href='Controleur_planning_candidat.php?action=2'><span class='glyphicon glyphicon-remove'></span>"
					 ."</td></tr>";
	}
	$chaineLecon .= "</table>";	
//********************************************************************************************//

	$choix = $_GET['action'];
	switch ($choix)
	{
		case 1:
			
			break;
		case 2:
			
			break;
		
	}



if(isset($_GET['session']))
{	
	session_destroy();
}

include ("../Vues/Vue_espacemoniteur.html");

		
		
		