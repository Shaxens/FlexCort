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
     * @param string $date
     */
    public function setDateDebut (string $date): void
    {
        $dateFormatee = DateSql::convertirFormatDateSql($date);
        $this->dateDebut = $dateFormatee;
    }

    /**
     * @param int $nbJour
     */
    public function setDateFin (int $nbJour): void
    {
        $dateFin = DateSql::ajouterJourAUneDate($this->getDateDebut(), $nbJour);
        $this->dateFin = $dateFin;
    }


    // CONSTRUCTEUR
    /**
     * @param int $idReservation
     * @param int $idUtilisateur
     * @param int $idModele
     * @param int $idForfait
     * @param string $date
     * @param int $nbJour
     */
    public function __construct (int $idReservation, int $idUtilisateur, int $idModele, int $idForfait, string $date, int $nbJour)
    {
        $this->setIdReservation($idReservation);
        $this->setIdUtilisateur($idUtilisateur);
        $this->setIdModele($idModele);
        $this->setIdForfait($idForfait);
        $this->setDateDebut($date);
        $this->setDateFin($nbJour);
    }

    // METHODES
    public function hydrate(array $infos)
    {
        foreach ($infos as $clef => $donnee)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $methode = 'set'.$clef;
            // Si le setter correspondant existe.
            if (method_exists($this, $methode))
            {
                // On appelle le setter.
                $this->$methode($donnee);
            }
        }
    }
}