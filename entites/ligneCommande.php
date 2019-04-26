<?php 
 class ligneCommande
 {
 	private $quantite;
 	private $prix;
 	private $idCommande;
 	private $refe;

 	public function __construct($quantite,$prix,$idCommande,$refe)
{   
	$this->quantite=$quantite;
	$this->prix=$prix;
	$this->idCommande=$idCommande;
	$this->refe=$refe;
}
	public function get_quantite(){return $this->quantite;}
	public function get_prix(){return $this->prix;}
	public function get_idCommande(){return $this->idCommande;}
	public function get_refe(){return $this->refe;}
 }
?>