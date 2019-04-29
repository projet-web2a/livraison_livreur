<?php
require_once 'C:/xampp/htdocs/eyezone/config.php';
function creationPanier(){
   if (!isset($_SESSION))
      {
         session_start();
      }
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['refeProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['marProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}
function ajouterArticle($refeProduit,$qteProduit,$prixProduit,$marProduit){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($refeProduit,  $_SESSION['panier']['refeProduit']);
     
      if ($positionProduit !== false)
      {  
            $_SESSION['panier']['qteProduit'][$positionProduit]+= $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['refeProduit'],$refeProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
          array_push( $_SESSION['panier']['marProduit'],$marProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

function supprimerArticle($refeProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['refeProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['marProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i=0; $i < count($_SESSION['panier']['refeProduit']); $i++)
      {
         if ($_SESSION['panier']['refeProduit'][$i] !== $refeProduit)
         {
            array_push( $tmp['refeProduit'],$_SESSION['panier']['refeProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp['marProduit'],$_SESSION['panier']['marProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] = $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function recupererProduit($refe){
      $sql="SELECT * from produit where refe=$refe";
      $db = config::getConnexion();
      try{
      $req=$db->prepare($sql);
       $req->execute();
      $produit= $req->fetchALL(PDO::FETCH_OBJ);
      return $produit;
      }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
     }
function recupererProduitduPannier(){
      
       $refes=array_values($_SESSION['panier']['refeProduit']);

      $ids = join("','",$refes);   
      $sql="SELECT * from produit where refe IN ('$ids') ";
      $db = config::getConnexion();
      try{
      $req=$db->prepare($sql);
       $req->execute();
      $produit= $req->fetchALL(PDO::FETCH_OBJ);
      return $produit;
      }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

}
function modifierQTeArticle($refeProduit,$qteProduit){
   //Si le panier éxiste
   
   if (creationPanier() && !isVerrouille())
   { 
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         $positionProduit = array_search($refeProduit,$_SESSION['panier']['refeProduit']);
         if ($positionProduit !== false)
         {  
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($refeProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['refeProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['refeProduit']);
   else
   return 0;

}



function supprimePanier(){
   unset($_SESSION['panier']);
}


/**
 * 
 */
/*
class panier 
{
   
   function __construct()
   {if (!isset($_SESSION))
      {
         session_start();
      }
     
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['idProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

   
   function ajouterArticle($libelleProduit,$qteProduit,$prixProduit,$idProduit){

   //Si le panier existe
   //if (creationPanier() && !isVerrouille())
   //{
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
     
      if ($positionProduit !== false)
      {  
            $_SESSION['panier']['qteProduit'][$positionProduit]+= $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
          array_push( $_SESSION['panier']['idProduit'],$idProduit);
      }
  // }
  // else
  // echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}


}
*/




?>