<?php


class livreur
{

    private $nblivraison;
    private $prenom;
    private $nom;
    private $mail;
    private $num_tel;
    private $cin;
    


    function __construct($nblivraison,$prenom,$nom,$mail,$num_tel,$cin)
    {

        $this->nblivraison=$nblivraison;
        $this->prenom=$prenom;
        $this->num_tel=$num_tel;
        $this->nom=$nom;
        $this->mail=$mail;
        $this->cin=$cin;
    }
     
   
    function getcin(){
        return $this->cin;
    }
    function getnom(){
        return $this->nom;
    }
    function getprenom(){
        return $this->prenom;
    }
    function getmail(){
        return $this->mail;
    }
    function getnum_tel(){
        return $this->num_tel;
    }
    function getnblivraison(){
        return $this->nblivraison;
    }
  
    function setcin($cin){
        $this->cin=$cin;
    }
    function setnom($nom){
        $this->nom=$nom;
    }
    function setprenom($prenom){
        $this->prenom=$prenom;
    }
    function setmail($mail){
        $this->mail=$mail;
    }
    function setnum_tel($num_tel){
        $this->num_tel=$num_tel;
    }
    function setnblivraison($nbivraison){
        $this->nblivraison=$nblivraison;
    }
    function setidLivreur($idLivreur){
        $this->idLivreur=$idLivreur;
    }
  
}