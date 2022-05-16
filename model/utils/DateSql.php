<?php

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
        $dateDepartTimestamp = strtotime($date);

        //on calcule et retourne la date de fin
        return date(DateSql::$format, strtotime('+' .$nbJour. 'days', $dateDepartTimestamp ));
    }

    public static function creerTableauDeDateConsecutive(string $date, int $nbJour)
    {
        DateSql::convertirFormatDateSql($date);
        $tableau = [];
        for ($i = 0; $i < $nbJour; $i++)
        {
            $tableau[] = DateSql::ajouterJourAUneDate($date, $i);
        }
        return $tableau;
    }

    public static function estPresenteDansTableauDeDate(string $dateAVerifier, array $tableauDate) : bool
    {
        foreach ($tableauDate as $datePresente)
        {
            if ($dateAVerifier == $datePresente)
            {
                return true;
            }
        }
        return false;
    }
}