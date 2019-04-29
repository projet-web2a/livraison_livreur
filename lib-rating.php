<?php

class Ratings {
 
function afficherRating($rating)
{
  echo "mail:".$rating->getmail()."<br>";
  echo "categorie:".$rating->getcategorie()."<br>";
  echo "message:".$rating->getmessage()."<br>";
}
  function save ($stars){
    $sql = "REPLACE INTO `rating` (`mail`, `categorie`,`rate`,`message`) VALUES (:mail,:categorie,:rate,:message)";

      $db = config::getConnexion();
        $req=$db->prepare($sql);
/*
        $mail=$rating->getmail();
        $categorie=$rating->getcategorie();
        $message=$rating->getmessage();
*/
		    $req->bindValue(':mail',"ggr");
        $req->bindValue(':categorie',"fff");
        $req->bindValue(':message',"ddd");
        $req->bindValue(':rate',$stars);
    
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
  }

}

?>