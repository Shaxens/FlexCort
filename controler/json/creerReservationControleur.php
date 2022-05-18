<?php
session_start();
require_once __DIR__ . './../../model/includeModel.php';

$reservationManager = new ReservationManager();

$mailUtilisateur = null;
if (isset($_SESSION['utilisateurConnecteIdMail']) && $_SESSION['utilisateurConnecteIdMail'] != null)
{
    $mailUtilisateur = $_SESSION['utilisateurConnecteIdMail'];
}






