<?php
require 'C:/xampp/htdocs/eyezone/core/classpanier.php';

$panier=creationPanier();
$refe=$_GET['refe'];
$result=recupererProduit($refe);
foreach($result as $produit) {
          $refe= $produit->refe; 
            $mar=$produit->mar;
            $prix=$produit->prix;
             $quantite=1;
          } 

ajouterArticle($refe,$quantite,$prix,$mar);
  //$refes=array_keys($_SESSION['panier']['idProduit']);
     // var_dump($refes);
     // var_dump($_SESSION['panier']['idProduit']);
//var_dump($_SESSION);
             header('Location: index.php');

//die('le produit a bien ete ajouter dans le panier <a href="index.php"> retourner </a>');


?>