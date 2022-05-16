<?php

require_once "Bdd.php";
require_once __DIR__ . './../utils/DateSql.php';
include __DIR__ . './../entity/Forfait.php';

class ForfaitManager
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
            echo 'Erreur initilalisation ForfaitManager -> ' . $e->getMessage();
        }
    }

    // METHODES
    public function creerListeForfaitFormatJson(): string|int
    {

        try
        {
            $sql = "SELECT * FROM FORFAIT";

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
            echo 'ERREUR getAllForfait'.$e->getMessage();
            return -1;
        }
    }

    public function getForfaitById(int $idForfait): Forfait|int
    {
        try
        {
            $sql = "SELECT idForfait, nomForfait, descriptionForfait, dureeForfait, prix FROM FORFAIT WHERE FORFAIT.idForfait = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idForfait, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_OBJ);

            return new Forfait($resultat->idForfait, $resultat->nomForfait, $resultat->descriptionForfait, $resultat->dureeForfait, $resultat->prix);
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getForfaitById'.$e->getMessage();
            return -1;
        }
    }

    public function getAllForfait(): array|int
    {
        $tableau[] = array();
        $index = 0;
        try
        {
            $sql = "SELECT * FROM FORFAIT";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();


            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                $tableau[$index] = new Forfait($resultat->idForfait, $resultat->nomForfait, $resultat->descriptionForfait, $resultat->dureeForfait, $resultat->prix);
                $index +=1;
            }

            return $tableau;
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllForfait'.$e->getMessage();
            return -1;
        }
    }

    public function createForfait(int $idForfait, string $nomForfait, string $descriptionForfait, int $dureeForfait, int $prix)
    {
        try
        {
            $sql = "INSERT INTO FORFAIT(idForfait, nomForfait, descriptionForfait, dureeForfait, prix) VALUES (?, ?, ?, ?, ?)";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idForfait, PDO::PARAM_INT);
            $req->bindValue(2, $nomForfait, PDO::PARAM_STR);
            $req->bindValue(3, $descriptionForfait, PDO::PARAM_STR);
            $req->bindValue(4, $dureeForfait, PDO::PARAM_INT);
            $req->bindValue(5, $prix, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            echo 'ERREUR ajout a la base de donnee :' . $e->getMessage();
        }
    }

    public function deleteForfait(int $idForfait)
    {
        try
        {
            $sql = "DELETE FROM FORFAIT WHERE idForfait = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idForfait, PDO::PARAM_INT);
            $req->execute();

        }
        catch (PDOException $e)
        {
            echo 'ERREUR deleteForfait'.$e->getMessage();
        }
    }

}