<?php
/**
* Victor Bridet
*/
class FormSouscription 
{
	private $titre;
	private $action;
	private $valueNom;
	private $valuePrenom;
	private $valueAdresse;
	private $valuedatenaissance;
	private $valueTelephone;
	private $valueMail;
	private $valueTypeCandidat;
	private $nomInput1;
	private $nomInput2;
	
	public function __construct($titre, $action, $Input1, $Input2)
	{
		$this->titre = $titre;
		$this->action = $action;
		$this->valueNom = "";
		$this->valuePrenom = "";
		$this->valueAdresse = "";
		$this->valuedatenaissance = "";
		$this->valueTelephone = "";
		$this->valueMail = "";
		$this->valueTypeCandidat = "";
		$this->nomInput1 = $Input1;
		$this->nomInput2 = $Input2;		
	}

	public function renseigner($tab)
	{
		
		$this->valueNom = $tab['valueNom'];
		$this->valuePrenom = $tab['valuePrenom'];
		$this->valueAdresse = $tab['valueAdresse'];
		$this->valuedatenaissance = $tab['valuedatenaissance'];	
		$this->valueTelephone = $tab['valueTelephone'];
		$this->valueMail = $tab['valueMail'];
		$this->valueTypeCandidat = $tab['valueTypeCandidat'];		
				
	}
	
	public function afficherFormulaire()
	{
		return $FomrCandSuscription ="<h2>".$this->titre."</h2></br>
								<form class='form-horizontal' role='form' method='post' action='".$this->action."'>
							    <div class='col-sm-2'>
									</div>										
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='Nom'>Nom :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='nomclient' class='form-control' id='nomclient' value='".$this->valueNom."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='prenom'>Prenom :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='prenomclient' class='form-control' id='prenomclient' value='".$this->valuePrenom."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='adresse'>Adresse :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='adresseclient' class='form-control' id='adresseclient' value='".$this->valueAdresse."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='datedenaissanceclient'>Date de naissance :</label>
							      <div class='col-sm-4'>
							      <input type='date' name='datedenaissanceclient' class='form-control' id='datedenaissanceclient' value='".$this->valuedatenaissance."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='telephoneclient'>Numero Telephone :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='telephoneclient' class='form-control' id='telephoneclient' value='".$this->valueTelephone."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>
							      <label class='control-label col-sm-2' for='mailclient'>Adresse mail :</label>
							      <div class='col-sm-4'>
							      <input type='text' name='mailclient' class='form-control' id='mailclient' value='".$this->valueMail."'>
							    </div></div>
							    <div class='col-sm-2'>
									</div>								
							    <div class='form-group'>							      
							      <div class='col-sm-4'>
							      <input type='hidden' name='dateinscriptionclient' class='form-control' id='dateinscriptionclient' value=''>
							    </div></div>
							    <div class='col-sm-2'>
									</div>	
									
								   <div class='form-group'>								   	
				                    <label for='sel1' class='control-label col-sm-2'>Mode de facturation :</label>
				                    	<div class='col-sm-4'>
					                      <select class='form-control' id='sel1' name='modefacturation'>
					                        <option value='cheque'>Chèque</option>
					                        <option value='especes'>Espèces</option>
					                        <option value='cb'>Carte bleu</option>	                       
					                      </select>
	                 				 	</div>
	                 				 </div>

								 <div class='col-sm-2'>
								 </div>
							    <div class='form-group'>
								  <label class='control-label col-sm-2' for='typecandidat'> Type du candidat:</label>
								  <div class='col-sm-4'>
								  <input class='form-control' id='typecandidat' name='typecandidat' required value='".$this->valueTypeCandidat."'>
								</div></div>
								<div class='col-sm-2'>
								 </div>
								<div class='form-group'>
								  <label class='control-label col-sm-2' for='mdpcandidat'> Mdp candidat :</label>
								  <div class='col-sm-4'>
								  <input class='form-control' id='mdpcandidat' name='mdpcandidat' required value=''>
								</div></div></br>							    
							    <button type='submit' name='inserer'  class='btn btn-default'>".$this->nomInput1."</button>
							    <button type='reset' name='annuler'  class='btn btn-default'>".$this->nomInput2."</button>
							  </form></br>";	
	}
}
