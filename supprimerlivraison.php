<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 29/03/2019
 * Time: 00:46
 */
require 'C:/xampp/htdocs/eyezone/core/livraisonC.php';

$livraison = new livraisonC();
$livraison->supprimerlivraison($_GET['id']);
header('Location: livraison.php');
?>




