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

            $this->bdd = $connectionBdd;
        } 
        catch(PDOException $e)
        {
            echo '<br>', '>>>>>>>>>>>>', '<br>', 'Echec de la connexion : ', '<br>'.$e->getMessage(),'<br>', '<<<<<<<<<<<<', '<br>';
        }
    }

    // METHOD
    public function preparerRequete($sql): bool|PDOStatement
    {
        return $this->bdd->prepare($sql);
    }
}