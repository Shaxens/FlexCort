<?php
session_start();
require_once __DIR__ . './../../model/includeModel.php';

    $reservationManager = new ReservationManager();
    $modeleManager = new ModeleManager();
    $utilisateurManager = new UtilisateurManager();

if (isset($_SESSION['connectOK'])) {
    if (isset($_POST['btnConfirmer'])) {

        $mailUtilisateur = $_SESSION['utilisateurConnecteIdMail'];
        $idModele = htmlentities($_POST['idModele']);
        $idForfait = htmlentities($_POST['idForfait']);
        $date = htmlentities($_POST['date']);
        $dateBonFormat = DateSql::convertirFormatDateSql($date);

        $utilisateur = $utilisateurManager->getUtilisateur($mailUtilisateur);
        $modele = $modeleManager->getModeleById($idModele);

        $reponse = $reservationManager->creerReservation($mailUtilisateur, $idModele, $idForfait, $dateBonFormat);
        if ($reponse == false) {
            echo json_encode('Désolé ' . $utilisateur->getPrenom() . ', mais ' . $modele->getPseudo() . ' ne pourra pas s\'occuper de toi, ces dates lui sont déjà prises...');
        } else {
            echo json_encode('Réservation effectué, ' . $modele->getPseudo() . ' a déjà hâte de s\'occuper de toi !)');
        }
    }
}
else
{
    echo json_encode('Vous n\'êtes pas connecté.)');
}








