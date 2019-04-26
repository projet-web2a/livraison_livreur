<?php

class livraison
{

    private $adresseLivraison;
    private $nom_ville;
    private $num_tel;
    private $dateLivraison;
    private $username;
    private $idCommande;
    private $idLivreur;


    function __construct($adresseLivraison,$nom_ville,$num_tel,$dateLivraison,$username,$idCommande,$idLivreur)
    {

        $this->adresseLivraison=$adresseLivraison;
        $this->nom_ville=$nom_ville;
        $this->num_tel=$num_tel;
        $this->dateLivraison=$dateLivraison;
        $this->username=$username;
        $this->idCommande=$idCommande;
        $this->idLivreur=$idLivreur;


    }

    function getadresseLivraison(){
        return $this->adresseLivraison;
    }
    function getnom_ville(){
        return $this->nom_ville;
    }
    function getdateLivraison(){
        return $this->dateLivraison;
    }
    function getnum_tel(){
        return $this->num_tel;
    }
    function getidCommande(){
        return $this->idCommande;
    }

    function getusername(){
        return $this->username;
    }
    function setadresseLivraison($adresseLivraison){
        $this->adresseLivraison=$adresseLivraiso;
    }
    function setnom_ville($nom_ville){
        $this->nom_ville=$nom_ville;
    }
    function setdateLivraison($dateLivraison){
        $this->dateLivraison=$dateLivraison;
    }
    function setnum_tel($num_tel){
        $this->num_tel=$num_tel;
    }
    function setidCommande($idCommande){
        $this->idCommande=$idCommande;
    }
    function setusername($username){
        $this->username=$username;
    }

}