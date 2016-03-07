<?php
class Commentaires
{
	private $id_comm, $nom, $email, $message;

	public function __construct()
	{
		$this->id_comm = 0;
		$this->nom = "";
		$this->email = "";
		$this->message = "";
	}

	public function renseigner($tab)
	{
		$this->id_comm = $tab['id_comm'];
		$this->nom = $tab['nom'];
		$this->email = $tab['email'];
		$this->message = $tab['message'];
	}
	
	public function serialiser()
	{
		$tab['id_comm'] = $this->id_comm;
		$tab['nom'] = $this->nom;
		$tab['email'] = $this->email;
		$tab['message'] = $this->message;		
		return $tab;
	}

	public function afficherCommentaire()
	{
		return "<tr><td>".$this->id_comm."</td>
				.<td>".$this->nom."</td>
				.<td>".$this->email."</td>
				.<td>".$this->message."</td></tr>";				
	}

	public function getIdcomm()
	{
		return $this->id_comm;
	}

	public function setIdcomm($id_comm)
	{
		$this->id_comm = $id_comm;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function setMessage($message)
	{
		$this->message = $message;
	}
}