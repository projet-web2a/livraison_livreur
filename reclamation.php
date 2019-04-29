<?php
/**
 * 
 */
class reclamation 
{
private $id_reclamation ;
private $nom;
private $prenom;
private $refe;
private $message;
private $date_reclamation;
	
	function __construct($nom,$prenom,$refe,$message,$date_reclamation)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->refe=$refe;
		$this->message=$message;
		$this->date_reclamation=$date_reclamation;
    }
    function get_nom()
    {
        return $this->nom;
    }
     function get_prenom()
    {
        return $this->prenom;
    }
 function get_refe()
    {
    return $this->refe;
    }
     function get_message()
    {
    return $this->message;
    } 
    function get_date_reclamation()
    {
        return $this->date_reclamation;
    }

} 
?>