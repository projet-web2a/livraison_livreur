<?php 
require 'C:/xampp/htdocs/eyezone/config.php';
	class commandeC
	{
      public function recupererDernierCmd()
      {
         
        $sql="SELECT * FROM commande WHERE idCommande=(SELECT MAX(idCommande) FROM commande)";
       $db=config::getConnexion();
        $result= $db->query($sql);
        return $result;
      }
   
  
      public function ajouterCommande($commande)
      {
        $sql="INSERT INTO `commande` (`dateCommande`,`etat`,`username`,`prixTotal`) VALUES (:DATECOMMANDE,:ETAT,:username,:PRIXTOTAL);";
          $db = Config::getConnexion();
          $req=$db->prepare($sql);
          $req->bindValue(':DATECOMMANDE',$commande->get_dateCommande());
          $req->bindValue(':ETAT',$commande->get_etat());
           $req->bindValue(':username',$commande->get_username());
           $req->bindValue(':PRIXTOTAL',$commande->get_prixTotal());
          
          $req->execute();
      }
    
      public function validerCommande($idCommande)
      {
         $sql="UPDATE commande SET etat='valide' WHERE idCommande=:idCommande";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $req->bindValue(':idCommande',$idCommande);
        $req->execute();
   }
catch (Exception $e)
   {
  echo " Erreur ! ".$e->getMessage();
   }
      }

      public function chercherCommande($par,$valeur)
      {
          $sql="SELECT *from commande  where $par='$valeur' ";
          $db = config::getConnexion();
          try{
            $result=$db->query($sql);
            

            $result->execute();
            $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
                  return $listcommandes;
          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          }
      }
      public function trier($par)
      {
        $sql="SELECT * FROM commande order by $par ;";
          $db = config::getConnexion();
          try{
          $result=$db->query($sql);

        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;

          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          } 
      }
      public function afficherCommande()
      {
        $db = config::getConnexion();
      $sql ="SELECT * FROM commande ";

        $result =$db->query($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;
      }
      public function afficher_ProduitsCommande($idCommande)
      {
        $db = config::getConnexion();
      $sql ="SELECT  P.refe , P.mar , P.prix , L.quantiteCommandee from produit P join lignecommande L  ON P.refe=L.refe  and L.idCommande=:idCommande ";

        $req=$db->prepare($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $req->bindValue(':idCommande',$idCommande);
        $req->execute();
        $listproduit= $req->fetchALL(PDO::FETCH_OBJ);
        return $listproduit;
      }
         public function SupprimerCommande($idCommande)
      {
          $sql="DELETE from commande  where idCommande=$idCommande ";
          $db = config::getConnexion();
          try{
            $result=$db->query($sql);
            $result->execute();
          
          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          }
      }

  
	}

?>
