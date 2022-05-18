<?php
require_once __DIR__ . './../../model/includeModel.php';

function creerReservation()
{
    $reservationManager = new ReservationManager();
    $modeleManager = new ModeleManager();
    $utilisateurManager = new UtilisateurManager();
    echo 'coucou';

    if (isset($_POST['btnConfirmer'])) {
        $mailUtilisateur = $_SESSION['utilisateurConnecteIdMail'];
        $idModele = htmlentities($_POST['idModele']);
        $idForfait = htmlentities($_POST['idForfait']);
        $date = htmlentities($_POST['date']);
        $dateBonFormat = DateSql::convertirFormatDateSql($date);

        echo '<br>' . $mailUtilisateur;
        echo '<br>' . $idModele;
        echo '<br>' . $idForfait;
        echo '<br>' . $dateBonFormat;

        $utilisateur = $utilisateurManager->getUtilisateur($mailUtilisateur);
        $modele = $modeleManager->getModeleById($idModele);

        $reponse = $reservationManager->creerReservation($mailUtilisateur, $idModele, $idForfait, $dateBonFormat);
        if ($reponse == false)
        {
            echo json_encode('Désolé ' . $utilisateur->getPrenom() . ', mais ' . $modele->getPseudo() . ' ne pourra pas s\'occuper de toi, ces dates lui sont déjà prises...');
        }
        else
        {
            echo json_encode('Réservation effectué, ' . $modele->getPseudo() . ' a déjà hâte de s\'occuper de toi !)');
        }
    }
}









