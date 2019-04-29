<?PHP
include "../entities/rating.php";
include "../core/ratingC.php";

include "C:/xampp/htdocs/EyeZone/entites/rating.php";
include "C:/xampp/htdocs/EyeZone/core/ratingC.php";



if (isset($_POST['mail']) and isset($_POST['categorie']) and isset($_POST['rate']) and isset($_POST['message']))
{
$rating1=new rating($_POST['id_rating'],$_POST['mail'],$_POST['categorie'],$_POST['rate'],$_POST['message']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$rating1C=new ratingC();
$rating1C->ajouterrating($rating1);

//header('Location: afficherrating.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>