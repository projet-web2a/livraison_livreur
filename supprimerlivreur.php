<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 29/03/2019
 * Time: 00:46
 */
require 'C:/xampp/htdocs/eyezone/core/livreurC.php';
require 'C:/xampp/htdocs/eyezone/entites/livreur.php';
if(isset($_GET['id']))
{

$livreur = new livreurC();
  $nb=$livreur->getnbLivraison($_GET['id']);
foreach ($nb as $li) {$nombre=$li['nblivraison'];}
if ($nombre==0)
{


$livreur->supprimerLivreurVille($_GET['id']);
$livreur->supprimerLivreur($_GET['id']);
header('Location: afficherlivreur.php');

}
else

{
	/*echo '<script language="javascript">';
echo 'window.alert("Ce livreur ne peut pas être supprimé car il possède encore des livraisons à effectuer")';
echo '</script>'; */
header('Location: afficherlivreur.php?sup=1');


}

}


