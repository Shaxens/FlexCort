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
            $server = 'devbdd.iutmetz.univ-lorraine.fr';
            $db = 'oury16u_projetPhp';
            $user = 'oury16u_appli';
            $pass = '32124584';

            $connectionBdd = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
            $connectionBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo 'Connexion à la base de données établie';
            $this->bdd = $connectionBdd;
        } 
        catch(PDOException $e)
        {
            echo 'Echec de la connexion : '.$e->getMessage();
        }
    }
}