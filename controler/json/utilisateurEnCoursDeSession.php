<?php
require_once __DIR__ . './../../model/includeModel.php';
session_start();

$utilisateurManager = new UtilisateurManager();

if (isset($_SESSION['utilisateurConnecteIdMail']) && $_SESSION['utilisateurConnecteIdMail'] != null)
{
    echo $utilisateurManager->creerUtilisateurFormatJson($_SESSION['utilisateurConnecteIdMail']);
}