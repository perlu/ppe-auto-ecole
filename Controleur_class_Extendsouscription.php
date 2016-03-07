<?php
class ExtendSouscription extends Souscription
{
	 
	private $idsouscription;


	public function __construct()
	{	
			
		parent :: __construct();
		$this->idsouscription = "";


	}

	public function renseigner($tab)
	{	
		
		$this->idsouscription = $tab['idsouscription'];
		parent::renseigner($tab);
	}
	
	public function serialiser()
	{	
		
		$tab['idsouscription'] = $this->idsouscription
				.parent::serialiser();	
			
		return $tab;
	}

	public function afficher()
	{
		return 	"<td>".$this->idsouscription."</td>".parent::afficher();		
	}

	public function lister()
	{
		return 	"<td>".$this->idsouscription."</td>".parent::afficherLecon();
	}
	
	public function getIdSouscription()
	{
		return $this->idsouscription;
	}

	
}