<?php
	session_start();
	include ("../Modeles/Modele.php");
	include ("../Modeles/Modele_extend.php");
	include ("Controleur_Class/Controleur_class_candidat.php");
	include ('Controleur_Class/Controleur_class_vehicule.php');
	include ('Controleur_Class/Controleur_class_lecon.php');
	include ('Controleur_Class/Controleur_class_demandelecon.php');
	include ('Controleur_Class/Controleur_class_Validationlecon.php');
	include ('Controleur_Class/Controleur_class_souscription.php');
	include ('Controleur_Class/Controleur_class_Extendsouscription.php');
	include ('Controleur_Class/Controleur_class_ExtendsCandidat.php');	
	include ('Controleur_Class/Controleur_class_moniteur.php');
	include ('Controleur_Class/Controleur_class_planning.php');
	include ('Controleur_Class/Controleur_class_FormSouscription.php');
	include ('Controleur_Class/Controleur_class_vueplanning.php');
	$unModele = new Modele("localhost", "auto_ecole_ppe1", "root", "");
	$unModelextend = new ModelExtend("localhost", "auto_ecole_ppe1", "root", "");
	$uneViewDemandeClient = new Validationlecon();	
	$uneSouscriptionExtend = new ExtendSouscription();
	$unCandidat = new Candidat();
	$unCandidatExtends = new ExtendsCandidat();
	$uneLecon = new Lecon();

	
			$modif = "";
			$chaine = "";
			$nouvelleLecon ="";
			$notifmod=null;
			$notifsupp=null;
			$notif=null;
			$etat1=null;
			$style=null;




//*****************************"Liste des candidats"**********************************************//

			$unModelextend->renseigner("candidat","numclient");	
			$resultats = $unModelextend->selectAll();
			$Chaine="<table class='table table-striped'>
					<tr><td><strong> Numero Candidat </strong></td><td><strong>Nom Candidat</strong></td><td><strong> Prenom Candidat</strong></td><td><strong>Adresse Candidat</strong></td>
					<td><strong>Date de naissance</strong></td><td><strong>Telephone Candidat</strong></td><td><strong>Mail Candidat</strong></td><td><strong>Date d'inscription</strong></td>
					<td><strong>Mode de facturation</strong></td><td><strong>Catégorie</strong></td><td><strong>Mdp candidat</strong></td><td><strong>Actions</strong></td></tr>";

			foreach ($resultats as $unresultat) 
			{
				
				$unCandidatExtends->renseigner($unresultat);
				
				$Chaine.="<tr>".$unCandidatExtends->afficher();
				$Chaine.="<td>"
					."<a href='Controleur_espace_admin.php?action=1&id=".$unCandidatExtends->getNumClient()."'><span class='glyphicon glyphicon-remove'></span>"
					."<a href='Controleur_espace_admin.php?action=2&id=".$unCandidatExtends->getNumClient()."'><span class='glyphicon glyphicon-eye-open'></span>"
					."<a href='Controleur_espace_admin.php?action=3&id=".$unCandidatExtends->getNumClient()."'><span class='glyphicon glyphicon-edit'></span>"
					."</td></tr>";
			}
			
			$Chaine.= "</table>";

			



//*******************************"modification d'un candidat"*******************************//


			 	if(isset($_POST["modifier"]))
				{
					$unModelextend->renseigner("candidat","numclient");													
					$unCandidatExtends->renseigner($_POST);				
					$tab = $unCandidatExtends->serialiser();						
					$unModelextend->update($tab, $unCandidatExtends->getNumClient());
					$notifmod = "Le candidat a été modifié avec succès !!";
				}	

/****************************************AFFICHAGE DES SOUSCRIPTIONS*************************************************/
			$unModelextend->renseigner("demandesouscription","idsouscription");
			$tabSouscription = $unModelextend->selectAll();
			
			$Souscription="<table class='table table-striped'>
					<tr><td><strong> Id souscription </strong></td><td><strong>Nom</strong></td><td><strong> Prenom</strong></td><td><strong>Adresse</strong></td>
					<td><strong>Date de naissance</strong></td><td><strong>Telephone</strong></td><td><strong>Mail</strong></td><td><strong>Date demande</strong></td>
					<td><strong>Type du demandeur</strong></td><td><strong>Type de permis</strong></td><td><strong>Etat souscription</strong></td><td><strong>Action</strong></td></tr>";

			foreach ($tabSouscription as $value) 
			{
				
				$uneSouscriptionExtend->renseigner($value);
				
				if($uneSouscriptionExtend->getetatsous() == "En attente")
				{
					$styleSous ="class='info'" ;
				}
				if($uneSouscriptionExtend->getetatsous() == "Valider")
				{
					$styleSous ="class='success'" ;
				}
				if($uneSouscriptionExtend->getetatsous() == "Refuser")
				{
					$styleSous ="class='danger'" ;
				}
				$Souscription.="<tr ".$styleSous.">".$uneSouscriptionExtend->afficher();
				$Souscription.="<td>"
					."<a href='Controleur_espace_admin.php?action=8&id=".$uneSouscriptionExtend->getIdSouscription()."&form=1'><span class='glyphicon glyphicon-ok'></span>"
					."<a href='Controleur_espace_admin.php?action=9&id=".$uneSouscriptionExtend->getIdSouscription()."&form=0'><span class='glyphicon glyphicon-remove'></span></td></tr>";
			}
			$Souscription.= "</table>";

//*****************************SWITCH CASE ACTION************************************************//			
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];
				$id = $_GET['id'];

				switch ($action) 
				{
					case 1:						
						$tab1 = $unModele->selectwhere($id);												
						$unCandidat->renseigner($tab1);
						$tab2 = $unCandidat->serialiser();

						$unModele->renseigner("archivecandidat","numcandidat");
						$unModele->insert($tab2);

						$unModele->renseigner("candidat","numclient");
						$unModele->delete($id);

						$notifsupp = "Le candidat a été supprimé avec succès !!";
						header('Location: Controleur_espace_admin.php');
						break;
					case 2:
						$uneResultat = $unModele->selectwhere($id);
						
						$unCandidat->renseigner($unresultat);
						$chaine .= "</br><strong>Infos du Candidat choisi</strong> <br/>";
						$chaine .= $unCandidat->lister();
						break;
					case 3:
						$unModelextend->renseigner("candidat","numclient");			
						$uneModifCandidat = $unModelextend->selectwhere($id);	
						
						$unCandidatExtends->renseigner($uneModifCandidat);
						$modif ="<h2>Modidfication d'un candidat</h2></br>
								<form class='form-horizontal' role='form' method='post' action='Controleur_espace_admin.php'>
								<div class='col-sm-2'>
									</div>		
									<div class='form-group'>
							      <div class='col-sm-4'>
							      <input type='hidden' name='numclient' class='form-control' id='numclient' value='".$unCandidatExtends->getNumClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>										
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='Nom'>Nom :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='nomclient' class='form-control' id='nomclient' value='".$unCandidatExtends->getNomClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='prenom'>Prenom :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='prenomclient' class='form-control' id='prenomclient' value='".$unCandidatExtends->getPrenomClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='adresse'>Adresse :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='adresseclient' class='form-control' id='adresseclient' value='".$unCandidatExtends->getAdresseClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='datedenaissanceclient'>Date de naissance :</label>
							      <div class='col-sm-4'>
							      <input type='date' name='datedenaissanceclient' class='form-control' id='datedenaissanceclient' value='".$unCandidatExtends->getDateDeNaissanceClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='telephoneclient'>Numero Telephone :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='telephoneclient' class='form-control' id='telephoneclient' value='".$unCandidatExtends->getTelephoneClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='mailclient'>Adresse mail :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='mailclient' class='form-control' id='mailclient' value='".$unCandidatExtends->getMailClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='dateinscriptionclient'>Date d'inscription :</label>
							      <div class='col-sm-4'>
							      <input type='date' name='dateinscriptionclient' class='form-control' id='dateinscriptionclient' value='".$unCandidatExtends->getDateInscriptionClient()."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							  	  <label class='control-label col-sm-2' for='sel1'>Mode de facturation :</label>
							  	  <div class='col-sm-4'>
							   	  <input class='form-control' name='modefacturation' id='modefacturation' required value='".$unCandidatExtends->getModeFacturation()."'>
								</div></div>
								 <div class='col-sm-2'>
								 </div>
							    <div class='form-group'>
								  <label class='control-label col-sm-2' for='typecandidat'> Type du candidat:</label>
								  <div class='col-sm-4'>
								  <input class='form-control' id='typecandidat' name='typecandidat' required value='".$unCandidatExtends->getTypeCandidat()."'>
								</div></div></br>
							    
							    <button type='submit' name='modifier' class='btn btn-default'>Modifier</button>
							    <button type='reset' name='annuler' class='btn btn-default'>Annuler</button>
							  </form>";
						break;	


					case 4:

						$unModelextend->renseigner("demandelecon","id_demande");
						$procedure = "verifMoniteur";
						$result = $unModelextend->appelprocedure($procedure);

						if(!empty($result))
						{
							$tab = array();
							$tab['etat']="Disponible";
							$unModele->update($tab, $id);
						}
						else if (empty($result))
						{
							$tab = array();
							$tab['etat']="Occupé";
							$unModele->update($tab, $id);
						}
							
					break;

					case 5:

					$unModelextend->renseigner("demandelecon","id_demande");
					$tabResultat = $unModelextend->selectwhere($id);
					
					foreach ($tabResultat as $key => $value)
					 {
					 	$uneViewDemandeClient->renseigner($value);
					 	if($uneViewDemandeClient->getetat() == "Disponible")
					 	{
					 		$tab = array();
							$tab['etat']="Valider";
							$unModelextend->update($tab, $id);
							$nom = "inserNewLecon";								
							$unModelextend->appelProcedureArg($nom, $uneViewDemandeClient->getDateLecon(), 
					 		$uneViewDemandeClient->getHeureLecon());
							
					 	}
					 	else if ($uneViewDemandeClient->getetat() == "Occuper")
						{	
							echo "Impossible de valider cette leçon, plage horraire non disponible !";
						}
						else if($uneViewDemandeClient->getetat() == "En attente")
						{
							echo "Veuillez d'abord vérifier la disponibilité de la leçon avant de la valider !";
						}
					 }
					break;

					case 6:
						

					
					break;	
					case 7:
					break;

					case 8:

					$unModelextend->renseigner("demandesouscription","idsouscription");
					$tabSouscription = $unModelextend->selectwhere($id);
					$uneSouscriptionExtend->renseigner($tabSouscription);
					
					break;

					case 9:

					$unModelextend->renseigner("demandesouscription","idsouscription");
					$tabSousA = $unModelextend->selectwhere($id);
					
					foreach ($tabSousA as $key => $value)
					{
					 	$uneSouscriptionExtend->renseigner($value);
					 	if($uneSouscriptionExtend->getetatsous() == "En attente")
					 	{

					 		$tab = array();
							$tab['etatsous']="Refuser";
							$unModelextend->update($tab, $id);
						}
					}	
					
													
					break;								
					case 10:

					break;																
				}
			}


//****************************************"INSERTION CANDIDAT"*********************************//
		if(isset($_GET["form"]))
		{
			if($_GET["form"] == 0)
			{
		     	$titre = "Ajouter un candidat";
		     	$action = "Controleur_espace_admin.php";
		     	$nomInput1 = "Inserer";
		     	$nomInput2 = "Annuler";
		     	$unFormSouscription = new FormSouscription($titre, $action, $nomInput1, $nomInput2);     	
				$formInscCand = $unFormSouscription->afficherFormulaire();				
			}
			else if($_GET["form"] == 1)
			{

				$unModelextend->renseigner("demandesouscription","idsouscription");
					$tabSousC = $unModelextend->selectwhere($id);
					$uneSouscriptionExtend->renseigner($tabSousC);
				$titre = "Ajouter un candidat";
		     	$action = "Controleur_espace_admin.php";
		     	$nomInput1 = "Inserer";
		     	$nomInput2 = "Annuler";
				$tabValForm = [
					
					"valueNom" => $uneSouscriptionExtend->getnom(),
					"valuePrenom" => $uneSouscriptionExtend->getPrenom(),
					"valueAdresse" => $uneSouscriptionExtend->getadresse(),
					"valuedatenaissance" => $uneSouscriptionExtend->getdatedenaissance(),
					"valueTelephone" => $uneSouscriptionExtend->gettelephone(),
					"valueMail" => $uneSouscriptionExtend->getmail(),
					"valueTypeCandidat" => $uneSouscriptionExtend->gettypedemandeur(),
				];
		     	$unFormSouscription = new FormSouscription($titre, $action, $nomInput1, $nomInput2);     	
		     	$unFormSouscription->renseigner($tabValForm);
				$formInscCand = $unFormSouscription->afficherFormulaire();	
				
			}
		}
		else
		{
		     	$titre = "Ajouter un candidat";
		     	$action = "Controleur_espace_admin.php";
		     	$nomInput1 = "Inserer";
		     	$nomInput2 = "Annuler";
		     	$unFormSouscription = new FormSouscription($titre, $action, $nomInput1, $nomInput2);     	
				$formInscCand = $unFormSouscription->afficherFormulaire();				
		}
		
	if(isset($_POST['inserer']))
	{

		
		$champ1 = 'nomclient';
		$champ2 = 'mailclient';
		$valeur1 = $_POST['nomclient'];
		$valeur2 = $_POST['mailclient'];
		
		
		$unModelextend->renseigner("candidat","numclient");				
		$resultat = $unModelextend->selectwhereici($champ1, $champ2, $valeur1, $valeur2);
		
				if (!$resultat) 
				{					
					$unCandidat->renseigner($_POST);
					$tab = $unCandidat->serialiser();
					$tab['dateinscriptionclient'] = date("Y-m-d");
					$unModelextend->insert($tab);				
					$notif= "Nouveau candidat ajouté avec succès !!";
					$etat1 = 1;
					header('Location: Controleur_espace_admin.php');
				}
				else
				{
					$notif= "Erreur ce candidat est déjà inscris !!";
					$etat1 = 0;
				}

	}


//***************************liste demande lecons*************************************************//


			$unModele->renseigner("demandelecon", "id_demande");
			$resultatLeçon = $unModele->selectAll();
			$chaineLeçon = "<table class='table '>
			<tr><td>Id Demande</><td>Date Demande</td><td>Heure Demande</td><td>Mail Demandeur</td><td>Etat demande</td><td>Actions</td></tr>";				
			foreach ($resultatLeçon as $key => $value) 
			{				
				
				$uneViewDemandeClient->renseigner($value);
				if($uneViewDemandeClient->getetat() == "Disponible")
				{
					$style ="class='info'" ;
				}
				else if ($uneViewDemandeClient->getetat() == "Occuper")
				{
					$style ="class='danger'";
				}
				else if ($uneViewDemandeClient->getetat() == "Valider")
				{
					$style ="class='success'";
				}
				else 
				{
					$style ="";
				}

				$chaineLeçon .= "<tr ".$style.">".$uneViewDemandeClient->afficherLecon();
				$chaineLeçon .=	"<td>"
					."<a href='Controleur_espace_admin.php?action=4&id=".$uneViewDemandeClient	->getid_demande()."'><span class='glyphicon glyphicon-check'></span>"
					."<a href='Controleur_espace_admin.php?action=5&id=".$uneViewDemandeClient->getid_demande()."'><span class='glyphicon glyphicon-ok'></span>"
					."<a href='Controleur_espace_admin.php?action=6&id=".$uneViewDemandeClient->getid_demande()."'><span class='glyphicon glyphicon-remove'></span>"
					."</td></tr>";
			}	
			$chaineLeçon .= "</table>";




//***************************************AJOUT LECONS**********************************************//
			



//***************************************DECONNEXION***********************************************//

			if(isset($_GET["deconnexion"]))
			{
				session_unset();
				session_destroy();
				header('Location: ../Vues/Vue_index.html');
			}



	include ('../Vues/Vue_espaceadmin.html');

	?>	


