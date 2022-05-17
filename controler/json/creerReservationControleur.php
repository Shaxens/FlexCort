<?php
require_once __DIR__ . './../../model/includeModel.php';

$reservationManager = new ReservationManager();
$idUtilisateur = 1;
$idModele = 3;
$idForfait = 3;
$date = '2022-7-03';

$reponse = $reservationManager->creerReservation($idUtilisateur, $idModele, $idForfait, $date);
$reponseJson = json_encode($reponse);

echo $reponseJson;
