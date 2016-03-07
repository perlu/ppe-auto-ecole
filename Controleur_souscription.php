<?php
include ("../Modeles/Modele.php");
include ("../Modeles/Modele_extend.php");
include ("Controleur_Class/Controleur_class_souscription.php");
$uneSouscription = new Souscription();
$unModele = new Modele("localhost", "auto_ecole_ppe1", "root", "");
$unModelextend = new ModelExtend("localhost", "auto_ecole_ppe1", "root", "");

	if(isset($_GET["type"]))
	{
			if($_GET["type"] == "basic")
		{
			$type = "Basic";
		}
		else if($_GET["type"] == "pro")
		{
			$type = "Pro";
		}
		else if($_GET["type"] == "premium")
		{
			$type = "Premium";
		}	
		




		$variable = "<form class='form-horizontal'  role='form' method='post' action='Controleur_souscription.php'>
		              <div class='col-sm-2'>
		         </div></br>
		         <div class='col-sm-2'>
		         </div> 
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='nom'>Nom :</label>
		            <div class='col-sm-4'>
		            <input pattern='[A-Za-z]{2,20}' type='text' name='nom' class='form-control' id='nom' required>
		            </div>
		          </div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='prenom'>Prenom :</label>
		            <div class='col-sm-4'>
		            <input pattern='[A-Za-z]{2,20}' type='text' name='prenom' class='form-control' id='prenom'  required>
		            </div>
		          </div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='adresse'>Adresse :</label>
		            <div class='col-sm-4'>
		            <input type='text' name='adresse' class='form-control' id='adresse' required>
		            </div>
		          </div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='datedenaissance'>Date de naissance :</label>
		            <div class='col-sm-4'>
		            <input pattern='(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19|20)\d\d' type='date' name='datedenaissance' class='form-control' id='datedenaissance' required></div>       
		          </div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='telephone'>N° Telephone :</label>
		            <div class='col-sm-4'>
		            <input pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' type='tel'    name='telephone' class='form-control' id='telephone' required>
		          </div></div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='mail'>Adresse Mail :</label>
		            <div class='col-sm-4'>
		            <input pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' type='mail' name='mail' class='form-control' id='mail'  required>
		          </div>
		          </div>
		          <div class='col-sm-2'>
		         </div>
		           <div class='col-sm-2'>
		         </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='datedemande'</label>
		            <div class='col-sm-4'>
		            <input type='hidden' name='datedemande' class='form-control' id='datedemande' required>
		          </div>
		          </div>
		           <div class='col-sm-2'>
		         </div>
		         <div class='form-group'>            
		                    <label class='control-label col-sm-2' for='type'>Vous etes?</label>
		                     <div class='col-sm-4'>
			                      <select class='form-control' id='sel1' name='typedemandeur'>
			                        <option value='etudiant'>Etudiant</option>
			                        <option value='salarier'>Salarier</option>                        
			                      </select>
		                  	  </div>
		          </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='typepermis'</label>
		            <div class='col-sm-4'>
		            <input type='hidden' value='".$type."' name='typepermis' class='form-control' id='typepermis' required>
		          </div>
		          </div>
		          <div class='form-group'>
		            <label class='control-label col-sm-2' for='etatsous'</label>
		            <div class='col-sm-4'>
		            <input type='hidden' name='etatsous' value='En attente'class='form-control' id='etatsous' required>
		          </div>
		          </div>
		          <button type='submit' name='souscrire' class='btn btn-default'>Souscrire</button>
		          <button type='reset' name='annuler' class='btn btn-default'>Annuler</button>

		          </form></br>
		      </div>";
	}

if (isset($_POST['souscrire']))
 {
 		
 	$unModelextend->renseigner("demandesouscription","idsouscription");
 	$uneSouscription->renseigner($_POST);
 	$tabSouscritpion = $uneSouscription->serialiser();

 	$tabSouscritpion['datedemande'] = date("Y-m-d"); 		
 	
 	$unModelextend->insert($tabSouscritpion);
}

include ("../Vues/Vue_souscription.html");
