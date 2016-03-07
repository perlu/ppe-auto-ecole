<?php
class ExtendsCandidat extends Candidat
{
	
	private $numclient;

	public function __construct()
	{
		$this->numclient = 0;
		parent :: __construct();
				
	}

	public function renseigner($tab)
	{		

		$this->numclient = $tab['numclient'];
		parent::renseigner($tab);
		
		
	}
	
	public function serialiser()
	{
		
		return $tab['numclient'] = $this->numclient
				.parent::serialiser();
	}

	public function afficher()
	{
		
		return 	"<td>".$this->numclient."</td>".parent::afficher();				
	}

	public function getnumClient()
	{
		return $this->numclient;
	}
	

	
}