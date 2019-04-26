<?php

require 'C:/xampp/htdocs/eyezone/config.php';
class reclamationC 
{
	
function ajouter_reclamation($reclamation){
		$sql="insert into reclamation (nom,prenom,refe,message,date_reclamation) values (:nom, :prenom,:refe,:message,:date_reclamation)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$reclamation->get_nom();
        $prenom=$reclamation->get_prenom();
        $refe=$reclamation->get_refe();
        $message=$reclamation->get_message();
        $date_reclamation=$reclamation->get_date_reclamation();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':refe',$refe);
		$req->bindValue(':message',$message);
		$req->bindValue(':date_reclamation',$date_reclamation);
		
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	
}
}
?>