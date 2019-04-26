<?php

require 'C:/xampp/htdocs/eyezone/core/commandeC.php';

$id=$_GET['id'];
$cc=new commandeC();
$cc->SupprimerCommande($id);
header('Location: commande.php');  
?>