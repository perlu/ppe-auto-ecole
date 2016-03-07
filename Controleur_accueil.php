<?php
include ("../Modeles/Modele.php");
include ('Controleur_class/Controleur_class_commentaires.php');

$unModel = new Modele("localhost", "auto_ecole_ppe1", "root", "");
$unModel->renseigner("commentaires","id_comm");

	if(isset($_POST["envoyer"]))
	{
		$unCommentaire = new Commentaires();
		$unCommentaire->renseigner($_POST);
		$tab = $unCommentaire->serialiser();		
		$unModel->insert($tab);
	
	
			$titremail = "Commentaire partie INDEX";
			$titremailReceveur = "TESTE";
			$adresseMailReceveur = $_POST["email"];
			$messageMail = $_POST["message"];
			include("Controleur_mail.php");			
	}
	
	include("../Vues/Vue_index.html");
?>