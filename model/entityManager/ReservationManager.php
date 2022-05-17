<?php
require_once __DIR__ . './../utils/DateSql.php';
require_once __DIR__ . './../entity/Reservation.php';
require_once __DIR__ . './../entityManager/ForfaitManager.php';
require_once __DIR__ . './../entityManager/ModeleManager.php';
require_once __DIR__ . './../entityManager/UtilisateurManager.php';


class ReservationManager
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
    public function creerListeReservationFormatJson(): string|int
    {

        try
        {
            $sql = "SELECT * FROM RESERVATION";

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

    public function getAllReservation(): array|int
    {
        $tableau[] = [];
        $index = 0;
        try
        {
            $sql = "SELECT * FROM RESERVATION";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();

            while ($res = $req->fetch(PDO::FETCH_OBJ)) {
                $tableau[$index] = new Reservation($res->IdReservation, $res->IdUtilisateur, $res->IdModele, $res->IdForfait, $res->DateDebut, $res->DateFin);
            }

            return $tableau;
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllReservation'.$e->getMessage();
            return -1;
        }
    }

    public function getAllReservationByModele(int $idModele) : array | int
    {
        $tableau[] = array();
        $index = 0;
        try
        {
            $sql = "SELECT * FROM RESERVATION WHERE RESERVATION.IdModele = ?";

            $req = $this->connexionBdd->preparerRequete($sql);
            $req->bindValue(1, $idModele, PDO::PARAM_INT);
            $req->execute();

            while ($res = $req->fetch(PDO::FETCH_OBJ)) {
                $tableau[$index] = new Reservation($res->IdReservation, $res->IdUtilisateur, $res->IdModele, $res->IdForfait, $res->DateDebut, $res->DateFin);
                $index +=1;

            }
            return $tableau;
        }
        catch (PDOException $e)
        {
            echo 'ERREUR getAllReservation'.$e->getMessage();
            return -1;
        }
    }

    public function checkModelePresent(int $idModele): bool|int
    {
        try
        {
            $sql = "SELECT IdModele FROM RESERVATION";
            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();
            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                if ($resultat->IdModele == $idModele)
                {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            echo 'ERREUR generation ID : ' . $e->getMessage();
        }
        return -1;
    }

    public function checkDisponibiliteModele(int $idModele, int $idForfait, string $date) : bool
    {
        if (!$this->checkModelePresent($idModele)) // Si le modele n'a aucune reservation on est sur qu'il est disponible
        {
            return true;
        }
        else
        {
            $forfaitManager = new ForfaitManager();
            $forfaitVoulu = $forfaitManager->getForfaitById($idForfait);
            $tableauDateVoulu = DateSql::creerTableauDeDateConsecutive($date, $forfaitVoulu->getDureeForfait()); // On créé une liste de date(celles qui corresponde à la date de début et la durée du forfait voulu)
            $tableauReservationDuModele = $this->getAllReservationByModele($idModele); // On va filtrer les reservation ne concernant que le modele voulu

            $tableauIntervaleDateIndisponible = array(); // On va créer un tableau contenant les periodes(tableaux de dates) où le modele est indisponible
            $index = 0;

            foreach ($tableauReservationDuModele as $reservation)
            {
                $forfait = $forfaitManager->getForfaitById($reservation->getIdForfait()); // On récupere le forfait pour avoir sa durée puis un créé un tableaude date à partir du début de cette reservation
                $tableauIntervaleDateIndisponible[$index] = DateSql::creerTableauDeDateConsecutive($reservation->getDateDebut(), $forfait->getDureeForfait()); // Une fois créé on l'ajoute au tableau des periode indisponible pour ce modele
                $index += 1;
            }

            // Enfin on compare le tableau de dates voulu avec les dates indisponible du modele
            if (DateSql::estPresenteEnComparantDeuxTableau($tableauDateVoulu, $tableauIntervaleDateIndisponible))
            {
                return false; // On retourne false, le modele ne serait disponible pour toutes les dates
            }
            else{
                return true; // Aucun conflit entre les dates, le modele est disponible pour cette reservation
            }
        }
    }

    private function genererIdUnique() : int
    {
        $id = 0;
        try
        {
            $sql = "SELECT IdReservation FROM RESERVATION";
            $req = $this->connexionBdd->preparerRequete($sql);
            $req->execute();
            while ($resultat = $req->fetch(PDO::FETCH_OBJ)) {
                $id = $resultat->IdReservation + 1;
            }

            return $id;
            } catch (PDOException $e) {
            echo 'ERREUR generation ID : ' . $e->getMessage();
        }
        return -1;
    }

    public function creerReservation(int $idUtilisateur, int $idModele, int $idForfait, string $dateDebut) : Reservation | bool
    {
        $forfaitManager = new ForfaitManager();
        $forfait = $forfaitManager->getForfaitById($idForfait);
        $dateFin = DateSql::ajouterJourAUneDate($dateDebut,$forfait->getDureeForfait()-1);
        $idReservation = $this->genererIdUnique();

        if ($this->checkDisponibiliteModele($idModele, $idForfait, $dateDebut))
        {
            try
            {
                $sql = "INSERT INTO RESERVATION(IdReservation, IdUtilisateur, IdModele, IdForfait, DateDebut, DateFin) VALUES (?, ?, ?, ?, ?, ?)";

                $req = $this->connexionBdd->preparerRequete($sql);
                $req->bindValue(1, $idReservation, PDO::PARAM_INT);
                $req->bindValue(2, $idUtilisateur, PDO::PARAM_INT);
                $req->bindValue(3, $idModele, PDO::PARAM_INT);
                $req->bindValue(4, $idForfait, PDO::PARAM_INT);
                $req->bindValue(5, $dateDebut, PDO::PARAM_STR);
                $req->bindValue(6, $dateFin, PDO::PARAM_STR);
                $req->execute();

                return true;
            } catch (PDOException $e) {
                echo 'ERREUR ajout a la base de donnee : ' . $e->getMessage();
            }
        }
        return false; // Si la reservation est impossible on retourne false
    }
}