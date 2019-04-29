<?php 

    include '../../entites/commande.php';
    include '../../core/commandeC.php';
    include '../../entites/ligneCommande.php';
        include '../../entites/livraison.php';

    include '../../core/ligneCommandeC.php';
    include_once("../../core/classpanier.php");
    include "../../core/livraisonC.php";

    require_once '../../core/lib/phpmailer/PHPMailerAutoLoad.php';
    $panier=creationPanier();

/*
    if(isset($_POST['ajouterCommande']))
    {*/   //$idUtilisateur=$_SESSION['idUtilisateur'];
        $username="hanehene";
        $dateCommande= date("Y-m-d");
        $prixTotal=MontantGlobal();
        $etat='en cours';
        $nbArticles=count($_SESSION['panier']['refeProduit']);
        $test=true;
        //controle stock
  /*       for ($i=0; $i < $nbArticles ; $i++) 
      { 
         $pc=new produitC();
         $liste=$pc->rechercherProduit($_SESSION['panier']['idProduit'][$i],$db);
        foreach ($liste as $row)
        {
        $stock=$row['quantite'];          
        }
        $qteProduit=$_SESSION['panier']['qteProduit'][$i];
        if($stock>=$qteProduit)
         {$newqtite=$stock-$_SESSION['panier']['qteProduit'][$i];
         $pc->modifierQuantite($_SESSION['panier']['idProduit'][$i],$newqtite,$db);}
         else
            { $test=false;
                
        header("Location: panier.php?erreurC=n&l=".$_SESSION['panier']['libelleProduit'][$i]."&stock=".$stock);
        
            }
      } //controle stock bitte*/
      if($test==true)
     
        
        {$commande =new Commande($username,$dateCommande,$prixTotal,$etat);
                $cc= new CommandeC();
                
                 
                $cc->ajouterCommande($commande);
                $result=$cc->recupererDernierCmd();
                foreach ($result as $value) 
                {
                    /*var_dump($value);
                    die();*/
                     $idCommande=$value['idCommande'];
                }
        
              $ldcc=new LigneCommandeC();
              
              for($i=0; $i<$nbArticles;$i++)
              { $qteProduit=$_SESSION['panier']['qteProduit'][$i];
                $prixProduit=$_SESSION['panier']['prixProduit'][$i];
                $refeProduit=$_SESSION['panier']['refeProduit'][$i];
        
                $ldc=new LigneCommande($qteProduit,$prixProduit,$idCommande,$refeProduit);
                $ldcc->ajouterLigneCommande($ldc);
              }
        
                      
            supprimePanier();
       
    if (isset($_POST['Adresse']) && isset($_POST['tel']) && isset($_POST['ville']))
    {
      
            $livraison = new livraison($_POST['Adresse'],$_POST['ville'],$_POST['tel'],date('Y-m-d'),$username,$idCommande);
            $l = new livraisonC();
            $l->ajouterlivraison($livraison);

    }
                 header('Location: panier.php');
        }
    
?>

   
   
