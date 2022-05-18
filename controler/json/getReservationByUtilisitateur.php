<?php
session_start();
require_once __DIR__ . './../../model/includeModel.php';
$mail = $_SESSION['utilisateurConnecteIdMail'];
$reservationManager = new ReservationManager();
$tableau = $reservationManager->creerListeReservationUtilisateurFormatJson($mail);

echo $tableau;
exit;