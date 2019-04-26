<?php
require 'C:/xampp/htdocs/eyezone/core/classpanier.php';
$panier=creationPanier();
$refe=$_GET['refe'];
$pos=array_search($refe,$_SESSION['panier']['refeProduit']);
$qte=$_SESSION['panier']['qteProduit'][$pos];
$qte--;
modifierQTeArticle($refe,$qte);
header('Location: panier.php');  
?>