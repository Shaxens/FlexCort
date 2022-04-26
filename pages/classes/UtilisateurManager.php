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
    public function createUtilisateur(Utilisateur $utilisateur)
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

    /*public function getAllUtilisateur()
    {
        try
        {
            $listeUtilisateur = array();

            $sql = "SELECT mail FROM UTILISATEUR";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();
            $resultat = $req->fetchAll();

            foreach ($resultat as &$mail)
            {
                settype($mail,type: "string");
                $utilisateur = $this->getUtilisateur($mail);
                $listeUtilisateur.array_push($utilisateur);
                echo $utilisateur->getPrenom();
            }
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getUtilisateur'.$e->getMessage();
        }
    }*/

    public function deleteUtilisateur(Utilisateur $utilisateur)
    {
        try
        {
            $sql = "DELETE FROM UTILISATEUR WHERE mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $utilisateur->getMail(), PDO::PARAM_STR);
            $req->execute();

            echo $utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' supprimé avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }

    public function updateMailUtilisateur(string $mail, string $nouveauMail)
    {
        try
        {
            $sql = "UPDATE UTILISATEUR SET mail = ? WHERE mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauMail, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();

            $utilisateur = $this->getUtilisateur($nouveauMail);
            echo 'mail de ',$utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' modifié avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }

    public function updateNomUtilisateur(string $mail, string $nouveauNom)
    {
        try
        {
            $sql = "UPDATE UTILISATEUR SET nom = ? WHERE mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauNom, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();

            $utilisateur = $this->getUtilisateur($mail);
            echo 'nom de ',$utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' modifié avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }

    public function updatePrenomUtilisateur(string $mail, string $nouveauPrenom)
    {
        try
        {
            $sql = "UPDATE UTILISATEUR SET prenom = ? WHERE mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauPrenom, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();

            $utilisateur = $this->getUtilisateur($mail);
            echo 'prenom de ',$utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' modifié avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }

    public function updateMdpUtilisateur(string $mail, string $nouveauMdp)
    {
        try
        {
            $sql = "UPDATE UTILISATEUR SET mdp = ? WHERE mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauMdp, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();

            $utilisateur = $this->getUtilisateur($mail);
            echo 'mdp de ',$utilisateur->getNom(), ' ', $utilisateur->getPrenom(), ' modifié avec succès';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }
}