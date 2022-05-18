<?php
require_once "Bdd.php";
include __DIR__ . './../entity/Utilisateur.php';

class UtilisateurManager {
    // ATTRIBUTS
    private Bdd $connexionBdd;

    // CONSTRUCTEUR
    public function __construct()
    {
        try {
            $this->connexionBdd = new Bdd;

        } catch (PDOException $e)
        {
            echo 'Erreur initilalisation utilisateur manager -> ' . $e->getMessage();
        }

    }

    // METHODES
    public function createUtilisateur(Utilisateur $utilisateur)
    {
        try
        {
            $sql = "INSERT INTO UTILISATEUR(Nom, Prenom, Mail, Mdp) VALUES (?, ?, ?, ?)";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $utilisateur->getNom(), PDO::PARAM_STR);
            $req->bindValue(2, $utilisateur->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(3, $utilisateur->getMail(), PDO::PARAM_STR);
            $req->bindValue(4, $utilisateur->getMdp(), PDO::PARAM_STR);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo 'ERREUR addUtilisateur'.$e->getMessage();
        }
    }

    public function creerUtilisateurFormatJson(string $mail)
    {
        $sql = "SELECT Nom, Prenom, Mail, Mdp, EstAdmin FROM UTILISATEUR WHERE UTILISATEUR.mail = ?";

        $req = $this->connexionBdd->preparerRequete($sql);
        $req->bindValue(1, $mail, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        return json_encode($resultat);
    }

    public function getUtilisateur(string $mail): Utilisateur|int
    {
        try
        {
            $sql = "SELECT Nom, Prenom, Mail, Mdp, EstAdmin FROM UTILISATEUR WHERE UTILISATEUR.mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $mail, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_OBJ);

            return new Utilisateur($resultat->Nom, $resultat->Prenom, $resultat->Mail, $resultat->Mdp, $resultat->EstAdmin);
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getUtilisateur'.$e->getMessage();
            return -1;
        }
    }

    public function getAllUtilisateur(): int|array
    {
        $listeUtilisateur[] = array();
        $index = 0;
        try
        {
            $sql = "SELECT * FROM UTILISATEUR";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();

            //tant qu‘il y a des lignes en BDD
            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                //on ajoute l’entité à un tableau d’ingrédients
                $listeUtilisateur[$index] = new Utilisateur($resultat->Nom, $resultat->Prenom, $resultat->Mail, $resultat->Mdp, $resultat->EstAdmin);
                $index +=1;
            }
            return $listeUtilisateur;
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllUtilisateur'.$e->getMessage();
            return -1;
        }
    }

    public function deleteUtilisateur(Utilisateur $utilisateur)
    {
        try
        {
            $sql = "DELETE FROM UTILISATEUR WHERE Mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $utilisateur->getMail(), PDO::PARAM_STR);
            $req->execute();
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
            $sql = "UPDATE UTILISATEUR SET Mail = ? WHERE Mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauMail, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();
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
            $sql = "UPDATE UTILISATEUR SET Nom = ? WHERE Mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauNom, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();
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
            $sql = "UPDATE UTILISATEUR SET Prenom = ? WHERE Mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauPrenom, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();
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
            $sql = "UPDATE UTILISATEUR SET Mdp = ? WHERE Mail = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $nouveauMdp, PDO::PARAM_STR);
            $req->bindValue(2, $mail, PDO::PARAM_STR);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteUtilisateur'.$e->getMessage();
        }
    }
}