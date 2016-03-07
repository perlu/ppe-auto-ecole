<?php
class ValidationLecon extends DemandeLecon
{
	
	private $id_demande;

	public function __construct()
	{
		$this->id_demande = 0;
		parent :: __construct();
				
	}

	public function renseigner($tab)
	{		
		$this->id_demande = $tab['id_demande'];
		parent::renseigner($tab);
		
		
	}
	
	public function serialiser()
	{
		
		return $tab['id_demande'] = $this->id_demande
				.parent::serialiser();
	}

	public function afficherLecon()
	{
		
		return 	"<td>".$this->id_demande."</td>".parent::afficherLecon();				
	}

	public function getid_demande()
	{
		return $this->id_demande;
	}
	

	
}