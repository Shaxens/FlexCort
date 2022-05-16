<?php
require_once __DIR__ . './../utils/DateSql.php';

class Reservation
{
    // ATTRIBUT
    private int $idReservation;
    private int $idUtilisateur;
    private int $idModele;
    private int $idForfait;
    private string $dateDebut;
    private string $dateFin;


    // GETTERS
    /**
     * @return int
     */
    public function getIdReservation (): int
    {
        return $this->idReservation;
    }

    /**
     * @return int
     */
    public function getIdUtilisateur (): int
    {
        return $this->idUtilisateur;
    }

    /**
     * @return int
     */
    public function getIdModele (): int
    {
        return $this->idModele;
    }

    /**
     * @return int
     */
    public function getIdForfait (): int
    {
        return $this->idForfait;
    }

    /**
     * @return string
     */
    public function getDateDebut (): string
    {
        return $this->dateDebut;
    }

    /**
     * @return string
     */
    public function getDateFin (): string
    {
        return $this->dateFin;
    }


    // SETTERS
    /**
     * @param int $idReservation
     */
    public function setIdReservation (int $idReservation): void
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @param int $idUtilisateur
     */
    public function setIdUtilisateur (int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @param int $idModele
     */
    public function setIdModele (int $idModele): void
    {
        $this->idModele = $idModele;
    }

    /**
     * @param int $idForfait
     */
    public function setIdForfait (int $idForfait): void
    {
        $this->idForfait = $idForfait;
    }

    /**
     * @param string $dateDebut
     */
    public function setDateDebut (string $date): void
    {
        strtotime('2020-02-02');
        $this->dateDebut = $date;
    }

    /**
     * @param string $dateFin
     */
    public function setDateFin (DateSql $date): void
    {

        $this->dateFin = $date;
    }


    // CONSTRUCTEUR
    /**
     * @param int $idReservation
     * @param int $idUtilisateur
     * @param int $idModele
     * @param int $idForfait
     * @param string $dateDebut
     */
    public function __construct (int $idReservation, int $idUtilisateur, int $idModele, int $idForfait, DateSql $dateDebut)
    {
        $this->setIdReservation($idReservation);
        $this->setIdUtilisateur($idUtilisateur);
        $this->setIdModele($idModele);
        $this->setIdForfait($idForfait);
        $this->setDateDebut($dateDebut);
        $this->setDateFin();
    }
}