<?php

/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 31/03/2019
 * Time: 22:40
 */
include "C:/xampp/htdocs/EyeZone/core/livreurC.php";
include "C:/xampp/htdocs/EyeZone/entites/livreur.php";
	include "Nexmo/src/NexmoMessage.php" ;


	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('233fad24','MDGwoBLamLhA1rrl');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '21653274814', 'EYEZONE', 'Le livreur a ete ajouté' );

	// Step 3: Display an overview of the message

	

	// Done!

if (isset($_POST['nom']))
{
$livreur = new livreur(0,$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'],$_POST['cin']);
$l = new livreurC();
$l->ajouterLivreur($livreur);
$nexmo_sms->displayOverview($info);
header('Location: afficherlivreur.php');
}
?>