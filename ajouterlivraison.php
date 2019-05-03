<?php
include "C:/xampp/htdocs/eyezone/core/livraisonC.php";
include "C:/xampp/htdocs/eyezone/entites/livreur.php";

include "Nexmo/src/NexmoMessage.php" ;


	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('233fad24','MDGwoBLamLhA1rrl');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '21653274814', 'EYEZONE', 'Le livreur a ete ajouté' );
$livraison= new livraison('address',$_POST['nom_ville'],$_POST['num_tel'],$_POST['dateLivraison'],$_POST['username'],$_POST['idCommande']);

$l = new livraisonC();
$l->ajouterlivraison($livraison);
$nexmo_sms->displayOverview($info);


$to='noursoffelgil98@gmail.com';
$sujet='la vie est belle';
$text='test';
//$text=$_POST['name'].$_POST['prenom'].$_POST['Landmark'].$_POST['Landmark1'].$_POST['Town'].$_POST['mail'].$_POST['tel'].'5'.date('Y-m-d').'4'.'4'.'400';
mail($to,$sujet,$text);

header('Location: checkout.php');
