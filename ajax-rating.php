<?php
// INIT
require_once 'C:/xampp/htdocs/eyezone/config.php';
include "C:/xampp/htdocs/EyeZone/entites/rating.php";
include "C:/xampp/htdocs/EyeZone/core/lib-rating.php";




$rate = new Ratings();

// DUMMY USER SESSION
// REMOVE THIS IN YOUR OWN SYSTEM...


// HANDLE AJAX REQUESTS
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    echo "Invalid request";
    break;

  /* [SAVE RATING] */
  case "save":
  {
    $sql = "REPLACE INTO `rating` (`mail`, `categorie`,`rate`,`message`) VALUES (:mail,:categorie,:rate,:message)";

      $db = config::getConnexion();
        $req=$db->prepare($sql);

		$req->bindValue(':mail',$_POST['mail']);
        $req->bindValue(':categorie',$_POST['categorie']);
        $req->bindValue(':message',$_POST['message']);
        $req->bindValue(':rate',$_POST['rating']);
    
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
  break;      
  }
   /* echo $rate->save($_POST['rating']);*/

}
?>