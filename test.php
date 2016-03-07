<?php
include ('Controleur_Class/Controleur_class_FormSouscription.php');
include ('Controleur_Class/Controleur_class_souscription.php');
include ("../Modeles/Modele.php");
	include ("../Modeles/Modele_extend.php");
$unModele = new Modele("localhost", "auto_ecole_ppe1", "root", "");
$unModelextend = new ModelExtend("localhost", "auto_ecole_ppe1", "root", "");
$unesouscription = new Souscription();
$id = "1";
$titre = "Formulaire d'ajout de candidat par souscription.";
$action="test.php";
$nomInput1 = "VALIDER";
$nomInput2 = "ANNULER";
$unModelextend->renseigner("demandesouscription","idsouscription");
			$tabSouscription = $unModelextend->selectwhere($id);
			
			

			foreach ($tabSouscription as $value) 
			{
				
				$unesouscription->renseigner($value);
				
				
				
			}
			
$unFormSouscription = new FormSouscription($titre,$action, $unesouscription->getnom(), $unesouscription->getPrenom(), $unesouscription->getadresse(), $unesouscription->getdatedenaissance(), $unesouscription->gettelephone(), $unesouscription->getmail(), $unesouscription->gettypedemandeur(), $nomInput1, $nomInput2);

$test = $unFormSouscription->afficherFormulaire();


echo $test;
if(isset($_POST["test"]))
{
	echo "je suis dans lke if";
}