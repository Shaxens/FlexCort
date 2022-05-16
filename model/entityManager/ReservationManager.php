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
        $tableau[] = array();
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

    public function checkDisponibiliteModele(int $idModele, int $idForfait, string $date) : bool
    {
        $forfaitManager = new ForfaitManager();
        $forfaitVoulu = $forfaitManager->getForfaitById($idForfait);
        $tableauDateVoulu = DateSql::creerTableauDeDateConsecutive($date, $forfaitVoulu->getDureeForfait()); // On créé une liste de date(celles qui corresponde à la date de début et la durée du forfait voulu)
        $tableauReservation = $this->getAllReservation(); // On créé une liste de reservation présent en BDD
        $tableauReservationDuModele[] = array(); // On va filtrer les reservation ne concernant que le modele voulu
        $index = 0;

        foreach ($tableauReservation as $reservation)
        {
            if ($reservation->getIdModele() == $idModele)
            {
                $tableauReservationDuModele[$index] = $reservation;
            }
        }

        $tableauIntervaleDateIndisponible[] = array(); // On va créer un tableau contenant les periodes(tableaux de dates) où le modele est indisponible
        foreach ($tableauReservationDuModele as $reservation)
        {
            $forfait = $forfaitManager->getForfaitById($reservation->getIdForfait()); // On récupere le forfait pour avoir sa durée puis un créé un tableaude date à partir du début de cette reservation
            $tableauIntervaleDateIndisponible[] = DateSql::creerTableauDeDateConsecutive($reservation->getDateDebut(), $forfait->getDureeForfait()); // Une fois créé on l'ajoute au tableau des periode indisponible pour ce modele
        }

        foreach ($tableauDateVoulu as $date)
        {
            echo '<br>' . $date;
        }

        // Enfin on compare le tableau de dates voulu avec les dates indisponible du modele
        if (DateSql::estPresenteEnComparantDeuxTableau($tableauDateVoulu, $tableauIntervaleDateIndisponible))
        {
            echo 'Erreur date indisponible';
            return false;
        }
        else{
            echo 'Date diponible faites vous plaisir !';
            return true;
        }
    }
}