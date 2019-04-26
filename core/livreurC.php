<?php

require_once 'C:/xampp/htdocs/eyezone/config.php';

class livreurC
{
    function ajouterLivreur($livreur){
        $sql="INSERT INTO livreur (nblivraison,prenom,nom,mail,num_tel,cin) values
          (:nblivraison,:prenom,:nom,:mail,:num_tel,:cin)";
        
        $db =Config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$livreur->getnom();
            $prenom=$livreur->getprenom();
            $mail=$livreur->getmail();
            $num_tel=$livreur->getnum_tel();
            $nblivraison=$livreur->getnblivraison();
            $cin=$livreur->getcin();
          


            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':nblivraison',$nblivraison);
            $req->bindValue(':cin',$cin);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherLivreur(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From livreur";
        $db =Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function afficherVille(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From Ville";
        $db =Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function AffecterVilleLivreur($idLivreur,$nom_ville){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
       $sql="INSERT INTO livraison_ville (idLivreur,nom_ville) values(:idLivreur,:nom_ville)";        
       $db =Config::getConnexion();
        try{
            $req=$db->prepare($sql);
     
          


            $req->bindValue(':idLivreur',$idLivreur);
            $req->bindValue(':nom_ville',$nom_ville);
        
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function AffecterLivreurLivraison($idLivreur,$idLivraison){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
       $sql="UPDATE livraison set idLivreur=:idLivreur WHERE idLivraison=:idLivraison";        
       $db =Config::getConnexion();
        try{
            $req=$db->prepare($sql);
     
          


            $req->bindValue(':idLivreur',$idLivreur);
            $req->bindValue(':idLivraison',$idLivraison);
        
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

        function AfficherLivreurDisponible($nom_ville){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
       $sql=" SELECT distinct L.idLivreur ,L.nom, L.prenom ,L.num_tel, P.nom_ville from livreur L join livraison_ville P ON L.idLivreur=P.idLivreur where P.nom_ville=:nom_ville";
        $db =Config::getConnexion();
        try{
            
        $req=$db->prepare($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $req->bindValue(':nom_ville',$nom_ville);
        $req->execute();
       $list= $req->fetchALL(PDO::FETCH_OBJ);
        return $list;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


       function afficherVilleLivreur($idLivreur)
       {
        $sql="SElECT distinct * From livraison_ville where idLivreur=$idLivreur";
        $db =Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




    function supprimerLivreur($cin){
        $sql="DELETE FROM livreur where idLivreur= :idLivreur";
        $db = Config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idLivreur',$idLivreur);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierLivreur($livreur,$idLivreur){
        $sql="UPDATE livreur SET idLivreur=:idLivreur, nom=:nom,prenom=:prenom,mail=:mail,num_tel=:num_tel,nblivraison=:nblivraison WHERE idLivreur=:idLivreur";
        //$sql="INSERT INTO employe (cin,nom,prenon,nbHeurs,tarifHeur) values (:cin, :nom,:prenom,:nbH,:tarifH)";
        //$sql="INSERT INTO laivraison (code_Livraison,nom,prenom,adresse_ligne_1,adresse_ligne_2,ville,mail,num_tel,code_livre) values (:code_Livraison, :nom,:prenom,:adresse_ligne_1,:adresse_ligne_2,:ville,:mail,:num_tel,:code_livre)";

        $db = Config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $cin=$livreur->getcin();
            $nom=$livreur->getnom();
            $prenom=$livreur->getprenom();
            $mail=$livreur->getmail();
            $num_tel=$livreur->getnum_tel();
            $nblivraison=$livreur->getnblivraison();
            $idLivreurr=$livreur->getidLivreur();

            $datas = array(':idLivreurr'=>$idLivreur,':idLivreur'=>$idLivreu, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':mail'=>$mail,':num_tel'=>$num_tel,':nblivraison'=>$nblivraison);
            $req->bindValue(':idLivreurr',$idLivreurr);
            $req->bindValue(':idLivreur',$idLivreur);
            $req->bindValue(':cin',$cin);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':nblivraison',$nblivraison);

            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }


    function recupererLivreur($idLivreur){
        $sql="SELECT * from livreur where idLivreur=$idLivreur";
        $db = Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

  /*  function recupererLaivraison($code_Livraison){
        $sql="SELECT * from livraison where code_Livraison=$code_Livraison";
        $db = Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }*/

//this is  to google map

/*
    public function getcollegesblanklating(){

        $sql ="SELECT * FROM livreur WHERE lat IS null AND lng IS null LIMIT 1";
        $db = Config::getConnexion();
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    public function getallcollg(){

        $sql ="SELECT * FROM livreur";
        $db = Config::getConnexion();
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function updatecolegeswithlant(){

        $sql ="UPDATE  livreur SET lat =:lat AND lng =:lng WHERE id =:id";
        $db = Config::getConnexion();

        $stmt= $db->prepare($sql);

        $stmt->bindParam(':lat',$this->lat);
        $stmt->bindParam(':lng',$this->lng);
        $stmt->bindParam(':id',$this->id);

        if($stmt->execute()){
            return true;
        }
        else
        {
            return false;
        }

    } */

}