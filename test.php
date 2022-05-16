<?php
require_once 'model/includeModel.php';

$forfaitManager = new ForfaitManager();

/*$date = date_create("2021-10-20");
$formated_DATE = date_format($date, 'Y-m-d');
$dateDepart = $formated_DATE;
echo $dateDepart. "<br>";
//durée à rajouter : 6 jours;
$duree = 6;

//la première étape est de transformer cette date en timestamp
$dateDepartTimestamp = strtotime($dateDepart);

//on calcule la date de fin
$dateFin = date('Y-m-d', strtotime('+'.$duree. 'days', $dateDepartTimestamp ));

echo $dateFin. "<br>";*/

$dateAuPif ='2000-07-01T00:00:00+00:00';

$tableau = DateSql::creerTableauDeDateConsecutive($dateAuPif, 6);

foreach ($tableau as $date)
{
    echo $date . '<br>';
}


