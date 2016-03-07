<?php
class Candidat
{
	
	protected $nomclient; 
	protected $prenomclient;
	protected $adresseclient;
	protected $datedenaissanceclient;
	protected $telephoneclient;
	protected $mailclient; 
	protected $dateinscriptionclient;  
	protected $modefacturation;
	protected $typecandidat;
	protected $mdpcandidat;

	public function __construct()
	{	
		
		$this->nomclient = "";
		$this->prenomclient = "";
		$this->adresseclient = "";
		$this->datedenaissanceclient = 0;
		$this->telephoneclient = "";
		$this->mailclient = "";
		$this->dateinscriptionclient = 0;
		$this->modefacturation = "";
		$this->typecandidat = "";
		$this->mdpcandidat = "";

	}

	public function renseigner($tab)
	{	

		
		$this->nomclient = $tab['nomclient'];
		$this->prenomclient = $tab['prenomclient'];
		$this->adresseclient = $tab['adresseclient'];
		$this->datedenaissanceclient = $tab['datedenaissanceclient'];
		$this->telephoneclient = $tab['telephoneclient'];
		$this->mailclient = $tab['mailclient'];
		$this->dateinscriptionclient = $tab['dateinscriptionclient'];
		$this->modefacturation = $tab['modefacturation'];
		$this->typecandidat = $tab['typecandidat'];
		$this->mdpcandidat = $tab['mdpcandidat'];
	}
	
	public function serialiser()
	{	
			
		$tab['nomclient'] = $this->nomclient;
		$tab['prenomclient'] = $this->prenomclient;
		$tab['adresseclient'] = $this->adresseclient;
		$tab['datedenaissanceclient'] = $this->datedenaissanceclient;
		$tab['telephoneclient'] = $this->telephoneclient;
		$tab['mailclient'] = $this->mailclient;
		$tab['dateinscriptionclient'] = $this->dateinscriptionclient;
		$tab['modefacturation'] = $this->modefacturation;
		$tab['typecandidat'] = $this->typecandidat;	
		$tab['mdpcandidat'] = $this->mdpcandidat;	
			
		return $tab;
	}

	public function afficher()
	{
		return ".<td>".$this->nomclient."</td>
				.<td>".$this->prenomclient."</td>
				.<td>".$this->adresseclient."</td>
				.<td>".$this->datedenaissanceclient."</td>
				.<td>".$this->telephoneclient."</td>
				.<td>".$this->mailclient."</td>
				.<td>".$this->dateinscriptionclient."</td>
				.<td>".$this->modefacturation."</td>
				.<td>".$this->typecandidat."</td>
				.<td>".$this->mdpcandidat."</td>";		
	}

	public function lister(){
			$tab = $this->serialiser();
			$chaine="";
			foreach ($tab as $cle => $valeur) {
				$chaine .= "<br/>".$cle." : ".$valeur;
			}
			return $chaine;
		}
	
	public function getnumClient()
	{
		return $this->numclient;
	}

	public function setnumclient($numclient)
	{
		$this->numclient = $numclient;
	}

	public function getNomClient()
	{
		return $this->nomclient;
	}

	public function setNomClient($nomclient)
	{
		$this->nomclient = $nomclient;
	}

	public function getPrenomClient()
	{
		return $this->prenomclient;
	}

	public function setPrenomClient($prenomclient)
	{
		$this->prenomclient = $prenomclient;
	}

	public function getAdresseClient()
	{
		return $this->adresseclient;
	}

	public function setAdresseClient($adresseclient)
	{
		$this->adresseclient = $adresseclient;
	}

	public function getDateDeNaissanceClient()
	{
		return $this->datedenaissanceclient;
	}

	public function setDateDeNaissanceClient($datedenaissanceclient)
	{
		$this->datedenaissanceclient = $datedenaissanceclient;
	}

	public function getTelephoneClient()
	{
		return $this->telephoneclient;
	}

	public function setTelephoneClient($telephoneclient)
	{
		$this->telephoneclient = $telephoneclient;
	}

	public function getMailClient()
	{
		return $this->mailclient;
	}

	public function setMailClient($mailclient)
	{
		$this->mailclient = $mailclient;
	}

	public function getDateInscriptionClient()
	{
		return $this->dateinscriptionclient;
	}

	public function setDateInscriptionClient($dateinscriptionclient)
	{
		$this->dateinscriptionclient = $dateinscriptionclient;
	}

	public function getModeFacturation()
	{
		return $this->modefacturation;
	}

	public function setModeFacturation($modefacturation)
	{
		$this->modefacturation = $modefacturation;
	}

	public function getTypeCandidat()
	{
		return $this->typecandidat;
	}

	public function setTypeCandidat($typecandidat)
	{
		$this->typecandidat = $typecandidat;
	}
}