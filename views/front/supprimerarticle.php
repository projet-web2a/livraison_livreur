<?php
require 'C:/xampp/htdocs/eyezone/core/classpanier.php';

$refe=$_GET['refe'];
supprimerArticle($refe);
header('Location: panier.php');  
?>