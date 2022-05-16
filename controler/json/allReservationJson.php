<?php
require_once __DIR__ . './../../model/includeModel.php';

$reservationManager = new ReservationManager();
$tableau = $reservationManager->creerListeReservationFormatJson();

echo $tableau;
exit;