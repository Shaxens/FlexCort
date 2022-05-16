<?php
require_once __DIR__ . './../../model/includeModel.php';

$reservationManager = new ReservationManager();
$idUtilisateur = 1;
$idModele = 5;
$idForfait = 1;
$date = '2022-05-20';

$reponse = $reservationManager->creerReservation($idUtilisateur, $idModele, $idForfait, $date);
$reponseJson = json_encode($reponse);

echo $reponseJson;
