<?php
class Souscription
{
	 
	protected $nom; 
	protected $prenom;
	protected $adresse;
	protected $datedenaissance;
	protected $telephone;
	protected $mail; 
	protected $datedemande;  	
	protected $typedemandeur;
	protected $typepermis;
	protected $etatsous;


	public function __construct()
	{	
			
		$this->nom = "";
		$this->prenom = "";
		$this->adresse = "";
		$this->datedenaissance = 0;
		$this->telephone = "";
		$this->mail = "";
		$this->datedemande = 0;		
		$this->typedemandeur = "";
		$this->typepermis = "";
		$this->etatsous = "";

	}

	public function renseigner($tab)
	{	
		
		$this->nom = $tab['nom'];
		$this->prenom = $tab['prenom'];
		$this->adresse = $tab['adresse'];
		$this->datedenaissance = $tab['datedenaissance'];
		$this->telephone = $tab['telephone'];
		$this->mail = $tab['mail'];
		$this->datedemande = $tab['datedemande'];		
		$this->typedemandeur = $tab['typedemandeur'];
		$this->typepermis = $tab['typepermis'];
		$this->etatsous = $tab['etatsous'];
	}
	
	public function serialiser()
	{	
		
		$tab['nom'] = $this->nom;
		$tab['prenom'] = $this->prenom;
		$tab['adresse'] = $this->adresse;
		$tab['datedenaissance'] = $this->datedenaissance;
		$tab['telephone'] = $this->telephone;
		$tab['mail'] = $this->mail;
		$tab['datedemande'] = $this->datedemande;		
		$tab['typedemandeur'] = $this->typedemandeur;
		$tab['typepermis'] = $this->typepermis;	
		$tab['etatsous'] = $this->etatsous;
			
		return $tab;
	}

	public function afficher()
	{
		return 	"<td>".$this->nom."</td>
				.<td>".$this->prenom."</td>
				.<td>".$this->adresse."</td>
				.<td>".$this->datedenaissance."</td>
				.<td>".$this->telephone."</td>
				.<td>".$this->mail."</td>
				.<td>".$this->datedemande."</td>				
				.<td>".$this->typedemandeur."</td>
				.<td>".$this->typepermis."</td>
				.<td>".$this->etatsous."</td>";		
	}

	public function lister(){
			$tab = $this->serialiser();
			$chaine="";
			foreach ($tab as $cle => $valeur) {
				$chaine .= "<br/>".$cle." : ".$valeur;
			}
			return $chaine;
		}
	
	public function getIdSouscription()
	{
		return $this->idsouscription;
	}

	public function setIdSouscription($idsouscription)
	{
		$this->idsouscription = $idsouscription;
	}

	public function getnom()
	{
		return $this->nom;
	}

	public function setnom($nom)
	{
		$this->nom = $nom;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}

	public function getadresse()
	{
		return $this->adresse;
	}

	public function setadresse($adresse)
	{
		$this->adresse = $adresse;
	}

	public function getdatedenaissance()
	{
		return $this->datedenaissance;
	}

	public function setdatedenaissance($datedenaissance)
	{
		$this->datedenaissance = $datedenaissance;
	}

	public function gettelephone()
	{
		return $this->telephone;
	}

	public function settelephone($telephone)
	{
		$this->telephone = $telephone;
	}

	public function getmail()
	{
		return $this->mail;
	}

	public function setmail($mail)
	{
		$this->mail = $mail;
	}

	public function getdatedemande()
	{
		return $this->datedemande;
	}

	public function setdatedemande($datedemande)
	{
		$this->datedemande = $datedemande;
	}

	public function gettypedemandeur()
	{
		return $this->typedemandeur;
	}

	public function settypedemandeur($typedemandeur)
	{
		$this->typedemandeur = $typedemandeur;
	}
	public function gettypepermis()
	{
		return $this->typepermis;
	}

	public function settypepermis($typepermis)
	{
		$this->typepermis = $typepermis;
	}
	public function getetatsous()
	{
		return $this->etatsous;
	}

	public function setetatsous($etatsous)
	{
		$this->etatsous = $etatsous;
	}
}