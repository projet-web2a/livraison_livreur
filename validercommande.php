<?php
require 'C:/xampp/htdocs/eyezone/core/commandeC.php';

$id=$_GET['id'];
$cc=new commandeC();
$cc->validerCommande($id);
header('Location: commande.php');

?>