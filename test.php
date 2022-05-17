<?php
require_once 'model/includeModel.php';

$reservationManager = new ReservationManager();

$forfaitManager = new ForfaitManager();

$tableauReservationDuModele = $reservationManager->getAllReservationByModele(1);

foreach ($tableauReservationDuModele as $reservation)
{
    $forfait = $forfaitManager->getForfaitById($reservation->getIdForfait());
    echo 'bah ca marche';
}





