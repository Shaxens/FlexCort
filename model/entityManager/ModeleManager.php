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
            echo 'modeleManager INITIALISE','<br>';
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
            $sql = "SELECT idModele, pseudo, dateNaissance FROM MODELE WHERE MODELE.idModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idModele, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_OBJ);

            return new Modele($resultat->idModele, $resultat->pseudo, $resultat->dateNaissance);
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

            //tant qu‘il y a des lignes en BDD
            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                //on ajoute l’entité à un tableau d’ingrédients
                $listeModele[$index] = new Modele($resultat->idModele, $resultat->pseudo, $resultat->dateNaissance);
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

    public function createModele(String $pseudo, int $annee, int $mois, int $jour)
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
    }

    public function deleteModele(int $idModele)
    {
        try
        {
            $sql = "DELETE FROM MODELE WHERE idModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idModele, PDO::PARAM_INT);
            $req->execute();

            echo 'suppression du modele reussi';
        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteModele'.$e->getMessage();
        }
    }
}