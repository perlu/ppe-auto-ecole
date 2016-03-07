<?php
class DemandeLecon
{
	protected  $datelecon, $heurelecon, $mailclient, $etat;

	public function __construct()
	{
	
		$this->datelecon = 0;
		$this->heurelecon = 0;
		$this->mailclient = "";
		$this->etat = "";
	}

	public function renseigner($tab)
	{
		
		$this->datelecon = $tab['datelecon'];
		$this->heurelecon = $tab['heurelecon'];
		$this->mailclient = $tab['mailclient'];
		$this->etat = $tab['etat'];
	}
	
	public function serialiser()
	{
		
		$tab['datelecon'] = $this->datelecon;
		$tab['heurelecon'] = $this->heurelecon;
		$tab['mailclient'] = $this->mailclient;
		$tab['etat'] = $this->etat;		
		return $tab;
	}

	public function afficherLecon()
	{
		return 
				"<td>".$this->datelecon."</td>
				.<td>".$this->heurelecon."</td>
				.<td>".$this->mailclient."</td>
				.<td>".$this->etat."</td>";				
	}


	public function getDateLecon()
	{
		return $this->datelecon;
	}

	public function setDateLecon($datelecon)
	{
		$this->datelecon = $datelecon;
	}

	public function getHeureLecon()
	{
		return $this->heurelecon;
	}

	public function setHeureLecon($heurelecon)
	{
		$this->heurelecon = $heurelecon;
	}

	public function getmailclient()
	{
		return $this->mailclient;
	}

	public function setmailclient($mailclient)
	{
		$this->mailclient = $mailclient;
	}

	public function getetat()
	{
		return $this->etat;
	}

	public function setetat($etat)
	{
		$this->etat = $etat;
	}
}