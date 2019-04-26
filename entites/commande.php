<?php 
class commande
{
	private  $username;
	private  $dateCommande;
	private  $prixTotal;
	private  $etat;

public function __construct($username,$dateCommande,$prixTotal,$etat)
{
	$this->username=$username;
	$this->dateCommande=$dateCommande;
	$this->prixTotal=$prixTotal;
	$this->etat=$etat;
}
	public function get_username(){return $this->username;}
	public function get_dateCommande(){return $this->dateCommande;}
	public function get_prixTotal(){return $this->prixTotal;}
	public function get_etat(){return $this->etat;}
}

?>