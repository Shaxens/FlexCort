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
        echo 'utilisateurManager INITIALISE','<br>';
    }

    // METHODES
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        try
        {
            $sql = "INSERT INTO UTILISATEUR(nom, prenom, mail, mdp) VALUES (?, ?, ?, ?)";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $utilisateur->getNom(), PDO::PARAM_STR);
            $req->bindValue(2, $utilisateur->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(3, $utilisateur->getMail(), PDO::PARAM_STR);
            $req->bindValue(4, $utilisateur->getMdp(), PDO::PARAM_STR);
            $req->execute();

            echo $utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' ajouté avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR addUtilisateur'.$e->getMessage();
        }
    }

    public function getUtilisateur(string $mail): Utilisateur|int
    {
        try
        {
            $sql = "SELECT mail, mdp, nom, prenom FROM UTILISATEUR WHERE UTILISATEUR.mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $mail, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_OBJ);

            return new Utilisateur($resultat->nom, $resultat->prenom, $resultat->mail, $resultat->mdp);
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getUtilisateur'.$e->getMessage();
            return -1;
        }
    }

    public function deleteUtilisateur(Utilisateur $utilisateur)
    {

    }
}