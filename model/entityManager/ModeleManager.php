<?php

require_once "Bdd.php";
require_once __DIR__ . './../utils/DateSql.php';
include __DIR__ . './../entity/Modele.php';

class ModeleManager
{
    // ATTRIBUTS
    private Bdd $connexionBdd;

    // CONSTRUCTEUR
    public function __construct()
    {
        try {
            $this->connexionBdd = new Bdd;
        } catch (PDOException $e)
        {
            echo 'Erreur initilalisation modelManager -> ' . $e->getMessage();
        }
    }

    // METHODES

    public function getModeleById(int $idModele): Modele|int
    {
        try
        {
            $sql = "SELECT IdModele, Pseudo, DateNaissance, DescriptionModele FROM MODELE WHERE MODELE.IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idModele, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_OBJ);

            return new Modele($resultat->IdModele, $resultat->Pseudo, $resultat->DateNaissance, $resultat->DescriptionModele);
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getModele'.$e->getMessage();
            return -1;
        }
    }

    public function getAllModele(): int|array
    {
        $listeModele[] = array();
        $index = 0;
        try
        {
            $sql = "SELECT * FROM MODELE";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();

            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                $listeModele[$index] = new Modele($resultat->IdModele, $resultat->Pseudo, $resultat->DateNaissance, $resultat->DescriptionModele);
                $index +=1;
            }

            return $listeModele;
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllModele'.$e->getMessage();
            return -1;
        }
    }

    /*public function createModele(String $pseudo, int $annee, int $mois, int $jour)
    {
        try
        {
            $date = DateSql::creerDateFormatSqlValide($annee, $mois, $jour);
            $sql = "INSERT INTO MODELE(pseudo, dateNaissance) VALUES (?, ?)";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $pseudo, PDO::PARAM_STR);
            $req->bindValue(2, $date, PDO::PARAM_STR);
            $req->execute();

            echo $pseudo. ' née le '. $date. ' ajouté avec succès';
        } catch (PDOException $e) {
            echo 'ERREUR ajout a la base de donnee :'.$e->getMessage();
        } catch (InvalidArgumentException $iae)
        {
            echo 'ERREUR creation date de naissance :'.$iae->getMessage();
        }
    }*/  // A MODIFIER

    public function deleteModele(int $idModele)
    {
        try
        {
            $sql = "DELETE FROM MODELE WHERE IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idModele, PDO::PARAM_INT);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteModele'.$e->getMessage();
        }
    }

    public function updateIdModele(int $idModele, int $newIdModele)
    {
        try
        {
            $sql = "UPDATE MODELE SET IdModele = ? WHERE IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $newIdModele, PDO::PARAM_INT);
            $req->bindValue(2, $idModele, PDO::PARAM_INT);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo ' ERREUR de updateIdModele '.$e->getMessage();
        }
    }

    public function updatePseudoModele(int $idModele, string $newPseudoModele)
    {
        try
        {
            $sql = "UPDATE MODELE SET Pseudo = ? WHERE IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $newPseudoModele, PDO::PARAM_STR);
            $req->bindValue(2, $idModele, PDO::PARAM_INT);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo ' ERREUR updatePseudoModele '.$e->getMessage();
        }
    }

    public function updateDescriptionModele(int $idModele, string $newDescriptionModele)
    {
        try
        {
            $sql = "UPDATE MODELE SET DescriptionModele = ? WHERE IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $newDescriptionModele, PDO::PARAM_STR);
            $req->bindValue(2, $idModele, PDO::PARAM_INT);
            $req->execute();
        }
        catch (PDOException $e)
        {
            echo ' ERREUR updatePseudoModele '.$e->getMessage();
        }
    }

    public function creerListeModeleFormatJson(): string|int
    {

        try
        {
            $sql = "SELECT * FROM MODELE";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();
            $tableau = [];

            //tant qu‘il y a des lignes en BDD
            while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
                $tableau[] = $resultat;
            }

            return json_encode($tableau);
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllModele'.$e->getMessage();
            return -1;
        }
    }
}