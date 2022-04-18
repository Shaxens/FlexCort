<?php
include "Bdd.php";
include "Utilisateur.php";

class UtilisateurManager {
    // ATTRIBUTS
    private $connexionBdd;

    // CONSTRUCTEUR
    public function __construct()
    {
        $this->connexionBdd = new Bdd;
    }

    // METHODES
    public function add(Utilisateur $utilisateur)
    {
        try {
            echo '<br>', '...Ajout de l\'utilisateur ' , $utilisateur->getPrenom(), ' à la base de donné EN COURS... ';
            $sql = "INSERT INTO UTILISATEUR(nom, prenom, mail, mdp) VALUES (?, ?, ?, ?)";
            $req = $this->connexionBdd->preparerRequete($sql);
            echo 'requete préparée !';

            $req->bindValue(1, $utilisateur->getNom(), PDO::PARAM_STR);
            $req->bindValue(2, $utilisateur->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(3, $utilisateur->getMail(), PDO::PARAM_STR);
            $req->bindValue(4, $utilisateur->getMdp(), PDO::PARAM_STR);

            $req->execute();
            echo '<br>', ' ... Ajout de l\'utilisateur : ', $utilisateur->getPrenom(), ' TERMINE...';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR utilisateurManager->add(Utilisateur ',$utilisateur->getPrenom(),')','<br>'.$e->getMessage();
        }
    }
}