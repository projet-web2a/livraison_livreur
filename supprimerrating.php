<?PHP

include "C:/xampp/htdocs/EyeZone/core/ratingC.php";

$ratingC=new ratingC();
if (isset($_POST["id_rating"])){
	$ratingC->supprimerrating($_POST["id_rating"]);
	//header('Location: index.php');
}

?>