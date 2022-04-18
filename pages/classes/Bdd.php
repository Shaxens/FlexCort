<?php
class Bdd {
    // ATTRIBUTS
    private PDO $bdd;

    // CONSTRUCTEUR
    public function __construct(){
        $this->setBdd();
    }

    // SETTERS
    public function setBdd()
    {
        try
        {
            $connectionBdd = new PDO('mysql:host=devbdd.iutmetz.univ-lorraine.fr;dbname=oury16u_projetPhp', 'oury16u_appli', '32124584', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->bdd = $connectionBdd;
        } 
        catch(Exception $e) 
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}