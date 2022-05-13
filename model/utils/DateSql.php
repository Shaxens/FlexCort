<?php

class DateSql
{
    // ATTRIBUT
    private int $annee;
    private int $mois;
    private int $jour;

    // SETTERS
    /**
     * @param int $annee
     */
    public function setAnnee (int $annee): void
    {
        if ($annee / 1000 >= 1 && $annee / 1000 <= 3)
        {
            $this->annee = $annee;
        }
        else
        {
            throw new InvalidArgumentException("Saisie de l'année non valide Annee = " . $annee);
        }
    }

    /**
     * @param int $mois
     */
    public function setMois (int $mois): void
    {
        if ($mois >= 1 && $mois <= 12)
        {
            $this->mois = $mois;
        }
        else
        {
            throw new InvalidArgumentException("Saisie du mois non valide");
        }
    }

    /**
     * @param int $jour
     */
    public function setJour (int $jour): void
    {
        if ($jour >= 1 && $jour <= 31)
        {
            $this->jour = $jour;
        }
        else
        {
            throw new InvalidArgumentException("Saisie du jour non valide");
        }
    }

    // GETTERS
    /**
     * @return int
     */
    public function getAnnee (): int
    {
        return $this->annee;
    }

    /**
     * @return int
     */
    public function getMois (): int
    {
        return $this->mois;
    }

    /**
     * @return int
     */
    public function getJour (): int
    {
        return $this->jour;
    }

    // CONSTRUCTEUR
    /**
     * @param int $annee
     * @param int $mois
     * @param int $jour
     */
    public function __construct (int $annee, int $mois, int $jour)
    {
        $this->setAnnee($annee);
        $this->setMois($mois);
        $this->setJour($jour);
    }

    // METHODES
    public static function creerDateFormatSqlValide( int $annee, int $mois, int $jour) : String|int
    {
        try {
            $date = new DateSql($annee, $mois, $jour);
            return $date->getAnnee() . '-' . $date->getMois() . '-' . $date->getJour();
        } catch (InvalidArgumentException $iae)
        {
            echo 'Erreur : ' . $iae->getMessage();
        }
        return -1;
    }

}