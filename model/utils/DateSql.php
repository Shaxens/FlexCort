<?php

use JetBrains\PhpStorm\Pure;

abstract class DateSql
{
    // ATTRIBUT
    private static string $format = 'Y-m-d';

    // METHODES
    public static function convertirFormatDateSql(string $date) : string
    {
        $dateSetup = date_create($date);
        return date_format($dateSetup, DateSql::$format);
    }

    public static function ajouterJourAUneDate(string $date, int $nbJour) : string
    {
        $dateDepart = strtotime($date);

        //on calcule et retourne la date de fin
        return date(DateSql::$format, strtotime('+' .$nbJour . 'days', $dateDepart));
    }

    public static function creerTableauDeDateConsecutive(string $date, int $nbJour) : array
    {
        $dateFormatee = DateSql::convertirFormatDateSql($date);
        $tableau = [];
        for ($i = 0; $i < $nbJour; $i++)
        {
            $tableau[] = DateSql::ajouterJourAUneDate($dateFormatee, $i);
        }
        return $tableau;
    }

    public static function estPresenteDansTableauDeDate(string $dateAVerifier, array $tableauDate) : bool
    {
        $dateAVerifierFormatee = DateSql::convertirFormatDateSql($dateAVerifier);
        foreach ($tableauDate as $datePresente)
        {
            if ($dateAVerifierFormatee == $datePresente)
            {
                return true;
            }
        }
        return false;
    }

    public static function estPresenteEnComparantDeuxTableau(array $tableauAVerifier, array $tableauxExistants) : bool
    {
        foreach ($tableauxExistants as $tableauEnCoursDeVerif)
        {

            foreach ($tableauEnCoursDeVerif as $dateAVerifier)
            {
                if (DateSql::estPresenteDansTableauDeDate($dateAVerifier, $tableauAVerifier))
                {
                    return true;
                }
            }
        }
        return false;
    }
}