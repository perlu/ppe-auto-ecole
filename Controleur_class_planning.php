<?php
class Planning
{
	protected  $datelecon, $heurelecon, $etatplanning,$numclient,$numvehicule,$numlecon , $nummoniteur;
	public function __construct()
	{
		
		$this->datelecon = 0;
		$this->heurelecon = 0;
		$this->etatplanning = 0;
		$this->numclient = 0;
		$this->numvehicule = 0;
		$this->numlecon = 0;
		$this->nummoniteur = 0;	
						
	}

	public function renseigner($tab)
	{
		
		$this->datelecon = $tab['datelecon'];
		$this->heurelecon = $tab['heurelecon'];
		$this->etatplanning = $tab['etatplanning'];
		$this->numclient = $tab['numclient'];
		$this->numvehicule = $tab['numvehicule'];
		$this->numlecon = $tab['numlecon'];
		$this->nummoniteur = $tab['nummoniteur'];
	}
	
	public function serialiser()
	{
		
		$tab['datelecon'] = $this->datelecon;
		$tab['heurelecon'] = $this->heurelecon;
		$tab['etatplanning'] = $this->etatplanning;
		$tab['numclient'] = $this->numclient;
		$tab['numvehicule'] = $this->numvehicule;
		$tab['numlecon'] = $this->numlecon;
		$tab['nummoniteur'] = $this->nummoniteur;			
		return $tab;
	}

	public function afficherPlanning()
	{
		return 	"<td>".$this->datelecon."</td>
				.<td>".$this->heurelecon."</td>
				.<td>".$this->etatplanning."</td>
				.<td>".$this->numclient."</td>
				.<td>".$this->numvehicule."</td>
				.<td>".$this->numlecon."</td>				
				.<td>".$this->nummoniteur."</td></tr>";								
	}

	

	public function getDatelecon()
	{
		return $this->datelecon;
	}

	public function setDatelecon($datelecon)
	{
		$this->datelecon = $datelecon;
	}

	public function getHeureLecon()
	{
		return $this->heurelecon;
	}

	public function setHeureLecon($heurelecon)
	{
		$this->heurelecon = $heurelecon ;
	}

	public function getEtatPlanning()
	{
		return $this->etatplanning;
	}

	public function setEtatPlanning($etatplanning)
	{
		$this->etatplanning = $etatplanning ;
	}

	
}