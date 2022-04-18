<?php
include "Bdd.php";
include "Utilisateur.php";

class UtilisateurManager {
    // ATTRIBUTS
    private $connexionBdd;

    // CONSTRUCTEUR
    public function __construct()
    {
        $this->setConnexionBdd();
    }

    // SETTERS
    public function setConnexionBdd()
    {
        $this->connexionBdd = new Bdd;
    }

    // METHODES
    public function add(Utilisateur $utilisateur)
    {
        echo "On va ajouter l'utilisateur : ", $utilisateur->getPrenom(), "<br>";
        $req = $this->connexionBdd->prepare('INSERT INTO UTILISATEUR(nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)');

        $req->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':mail', $utilisateur->getMail(), PDO::PARAM_STR);
        $req->bindValue(':mdp', $utilisateur->getMdp(), PDO::PARAM_STR);

        $req->execute();
        echo "On ajoute l'utilisateur : ", $utilisateur->getPrenom(), "<br>";
    }
}