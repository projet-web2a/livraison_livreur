<?PHP
require "ratewi.php";
class ratingC {
function afficherrating ($rating){
		echo "mail: ".$rating->getmail()."<br>";
		echo "categorie: ".$rating->getcategorie()."<br>";
		echo "rate: ".$rating->getrate()."<br>";
		echo "message: ".$rating->getmessage()."<br>";

	}

	function ajouterrating($rating){
		$sql="insert into rating (mail,categorie,rate,message) values (:mail,:categorie,:rate,:message)";
		$db = ratewi::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$mail=$rating->getmail();
        $categorie=$rating->getcategorie();
        $rate=$rating->getrate();
        $message=$rating->getmessage();

        $req->bindValue(':mail',$mail);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':rate',$rate);
		$req->bindValue(':message',$message);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherratings(){
		$sql="SElECT * From rating";
		$db = ratewi::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerrating($id_rating){
		$sql="DELETE FROM rating where id_rating= :id_rating";
		$db = ratewi::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_rating',$id_rating);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierrating($rating,$id_rating){
		$sql="UPDATE rating SET mail=:mail, categorie=:categorie, rate=:rate,message=:message WHERE id_rating=:id_rating";
		
		$db = ratewi::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

        $mail=$rating->getmail();
		$categorie=$rating->getcategorie();
        $rate=$rating->getrate();
        $message=$rating->getmessage();


		$datas = array(':id_rating'=>$id_rating,':mail'=>$mail,':categorie'=>$categorie, ':rate'=>$rate, ':message'=>$message);

		$req->bindValue(':id_rating',$id_rating);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':rate',$rate);
		$req->bindValue(':message',$message);


		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}

	function recupererrating($id_rating){

		$sql="SELECT * from rating where id_rating=$id_rating";
		$db = ratewi::getConnexion();

		try{
			echo "please";
		$liste=$db->query($sql);
		return $liste;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function nombre(){

		$sql="select count(id_rating) as count from rating";
		$db = ratewi::getConnexion();

		try{
		$baba=$db->query($sql);
		return $baba;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	/*
	function rechercherListecompetitions($nom){
		$sql="SELECT * from competition where nom=$nom";
		$db = ratewi::getConnexion();
		$req=$db->prepare($sql);
		try{

		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
*/
}

?>