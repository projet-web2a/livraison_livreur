<?php
  
  class LigneCommandeC
  {
  	public function ajouterLigneCommande($ligneCommande)
{   
	$sql="INSERT INTO `lignecommande` (`quantiteCommandee`,`prixUnitaire`,`idCommande`,`refe`) VALUES (:QUANTITE,:PRIX,:IDCOMMANDE,:refe);";
	
          $db = Config::getConnexion();

          $req=$db->prepare($sql);
          $req->bindValue(':QUANTITE',$ligneCommande->get_quantite());
          $req->bindValue(':PRIX',$ligneCommande->get_prix());
          $req->bindValue(':IDCOMMANDE',$ligneCommande->get_idCommande());
          $req->bindValue(':refe',$ligneCommande->get_refe());
          $req->execute();
	}
 
	public function affichertout($idCommande,$db)
    { $sql="select * from lignecommande L left join produit P on L.idProduit=P.idProduit where L.idCommande=$idCommande";
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
  	
  }
?>