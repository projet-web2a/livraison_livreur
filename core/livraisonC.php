<?php

require_once 'C:/xampp/htdocs/eyezone/config.php';
//include "../entity/livraison.php";
class livraisonC
{
    function get_last_code()
    {
        $sql="SELECT * FROM livraison ORDER by idLivraison DESC limit 1";
        $db =Config::getConnexion();
        try{
            $liste=$db->query($sql);
            $donnes = $liste->fetch();
            return $donnes;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterlivraison($livraison){
  
        $sql="INSERT INTO livraison (adresseLivraison,nom_ville,num_tel,dateLivraison,username,idCommande) values ( :adresseLivraison,:nom_ville,:num_tel,:dateLivraison,:username,:idCommande)";
        $db =Config::getConnexion();

        try{
            //$req=$db->prepare($sql);


            $adresseLivraison=$livraison->getadresseLivraison();
            $nom_ville=$livraison->getnom_ville();
            $num_tel=$livraison->getnum_tel();
            $dateLivraison=$livraison->getdateLivraison();
            $username=$livraison->getusername();
            $idCommande=$livraison->getidCommande();
            $req=$db->prepare($sql);
            $req->bindValue(':adresseLivraison',$adresseLivraison);
            $req->bindValue(':nom_ville',$nom_ville);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':dateLivraison',$dateLivraison);

            $req->bindValue(':username',$username);
            $req->bindValue(':idCommande',$idCommande);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherlivraison(){
        $sql="SElECT * From livraison";
        $db =Config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
     function recherche($search_value)
    {
        $sql="SELECT * FROM livraison where  idLivraison like '$search_value' or adresseLivraison like '%$search_value%' or nom_ville like '%$search_value%' or num_tel like '$search_value' or dateLivraison like '%$search_value%' or username like '%$search_value%' or idLivreur like '$search_value' or idCommande like '$search_value'";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function trier($par)
    {
        $sql="SELECT * FROM livraison order by $par ";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
  /*  function afficherlivraison_livreur($rre)
    {
        $sql="SELECT * from livraison where  livreur='$rre' and affectation=0";
        $db = Connexion::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherlivraisonforone($rre,$date){

        $sql="SELECT * from livraison where nom='$rre' and date_livraison >='$date'";

        $db =Connexion::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherlivraisonforonetous($rre){

        $sql="SELECT * from livraison where nom='$rre' ";
        $db =Connexion::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
*/
    function supprimerlivraison($idLivraison)
    {
        $sql="DELETE FROM livraison where idLivraison= :idLivraison";
       $db =Config::getConnexion();

        $req=$db->prepare($sql);
        $req->bindValue(':idLivraison',$idLivraison);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

 /*   function modifierlivraison_livreur($idLivraison){
        $sql="UPDATE livraison SET affectation='1' where idLivraison= :idLivraison";
       $db =Connexion::getConnexion();

        $req=$db->prepare($sql);
        $req->bindValue(':code_Livraison',$code_Livraison);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
*/
  /*  function modifier_code_livre ($code_Livraison,$code_livre)
    {
        $sql="UPDATE livraison SET code_livre=:code_livre where code_Livraison=:code_Livraison";
       $db =Connexion::getConnexion();
        $req=$db->prepare($sql);

        $req->bindValue(':code_livre',$code_livre);
        $req->bindValue(':code_Livraison',$code_Livraison);

        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }*/

  /*  function modifierlivraison($livraison,$code_Livraison){
        $sql="UPDATE livraison SET code_Livraison=:code_Livraisonn, nom=:nom,prenom=:prenom,adresse_ligne_1=:adresse_ligne_1,adresse_ligne_2=:adresse_ligne_2,ville=:ville,mail=:mail,num_tel=:num_tel,code_livre=:code_livre,date_livraison=:date_livraison,affectation=:affectation ,livreur=:livreur ,prix=:prix WHERE code_Livraison=:code_Livraison";
        $db =Connexion::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        global $db;
        try{
            $req=$db->prepare($sql);


            $code_Livraisonn=$livraison->getcode_Livraison();
            $nom=$livraison->getnom();
            $prenom=$livraison->getprenom();
            $adresse_ligne_1=$livraison->getadresse_ligne_1();
            $adresse_ligne_2=$livraison->getadresse_ligne_2();

            $ville=$livraison->getville();
            $mail=$livraison->getmail();
            $num_tel=$livraison->getnum_tel();
            $code_livre=$livraison->getcode_livre();

            $date_livraison=$livraison->getdate_livraison();
            $affectation=$livraison->getaffectation();
            $livreur=$livraison->getlivreur();
            $prix=$livraison->getprix();

            $datas = array(':code_Livraisonn'=>$code_Livraisonn, ':code_Livraison'=>$code_Livraison, ':nom'=>$nom,':prenom'=>$prenom,':adresse_ligne_1'=>$adresse_ligne_1,':adresse_ligne_2'=>$adresse_ligne_2,':ville'=>$ville,':mail'=>$mail,':num_tel'=>$num_tel,':code_livre'=>$code_livre,':date_livraison'=>$date_livraison,':affectation'=>$affectation ,':livreur'=>$livreur ,':prix'=>$prix);

            $req->bindValue(':code_Livraisonn',$code_Livraisonn);
            $req->bindValue(':code_Livraison',$code_Livraison);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':adresse_ligne_1',$adresse_ligne_1);
            $req->bindValue(':adresse_ligne_2',$adresse_ligne_2);

            $req->bindValue(':ville',$ville);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':code_livre',$code_livre);

            $req->bindValue(':date_livraison',$date_livraison);
            $req->bindValue(':affectation',$affectation);
            $req->bindValue(':livreur',$livreur);
            $req->bindValue(':prix',$prix);


            $req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }*/

    function recupererlivraison($idLivraison){
        $sql="SELECT * from livraison where nom=$ idLivraison";
        $db =Config::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   /* function recupererprix($region){

        $sql="SELECT * FROM prix WHERE `region`='".$region."'";
       $db =Connexion::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }*/

    function recupererLivreur($cin){
        $sql="SELECT * from livreur where cin=$cin";
        $db =Cofig::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    /*function affecterlivraison($livreur,$livraison)
    {

        $db=configuration::getConnexion();
        $sql="INSERT INTO livraison(id) values(:id)";
        try{
            $req=$db->prepare($sql);
            $id=$livreur->getcin();
            $req->bindvalue('id',$id);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }*/
}
?>