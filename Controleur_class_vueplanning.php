<?php
class VuePlanning
{
	private $mailclient, $nomclient, $nommoniteur, $model, $datelecon, $heurelecon, $etatplanning;

	public function __construct()
	{
		$this->mailclient = "";
		$this->nomclient = "";
		$this->nommoniteur = "";
		$this->model = "";
		$this->datelecon = 0;
		$this->heurelecon = 0;
		$this->etatplanning = "";
		
	}

	public function renseigner($tab)
	{
		$this->mailclient = $tab['mailclient'];
		$this->nomclient = $tab['nomclient'];
		$this->nommoniteur = $tab['nommoniteur'];
		$this->model = $tab['model'];
		$this->datelecon = $tab['datelecon'];
		$this->heurelecon = $tab['heurelecon'];
		$this->etatplanning = $tab['etatplanning'];			
	}
	
	public function serialiser()
	{
		$tab['mailclient'] = $this->mailclient;
		$tab['nomclient'] = $this->nomclient;
		$tab['nommoniteur'] = $this->nommoniteur;
		$tab['model'] = $this->model;
		$tab['datelecon'] = $this->datelecon;
		$tab['heurelecon'] = $this->heurelecon;
		$tab['etatplanning'] = $this->etatplanning;
		return $tab;
	}

	public function afficher()
	{
		return 	"<td>".$this->mailclient."</td>
				.<td>".$this->nomclient."</td>
				.<td>".$this->nommoniteur."</td>
				.<td>".$this->model."</td>
				.<td>".$this->datelecon."</td>
				.<td>".$this->heurelecon."</td>
				.<td>".$this->etatplanning."</td>";				
	}

	public function getNomClient()
	{
		return $this->nomclient;
	}

	public function setNomClient($nomclient)
	{
		$this->nomclient = $nomclient;
	}

	public function getNomMoniteur()
	{
		return $this->nommoniteur;
	}

	public function setNomMoniteur($nommoniteur)
	{
		$this->nommoniteur = $nommoniteur;
	}

	public function getModel()
	{
		return $this->model;
	}

	public function setModel($model)
	{
		$this->model = $model;
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

	public function getTarifHeure()
	{
		return $this->tarifheure;
	}

	public function setTarifHeure($tarifheure)
	{
		$this->tarifheure = $tarifheure;
	}

	public function getEtatPlanning()
	{
		return $this->etatplanning;
	}

	public function setEtatPlanning($etatplanning)
	{
		$this->etatplanning = $etatplanning;
	}
}