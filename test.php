<?php
require_once 'model/includeModel.php';

$forfaitManager = new ForfaitManager();

$forfaitManager->deleteForfait(2);

$forfaitManager->createForfait(2,'Ouverture d\'esprit', 'Venez vous ouvrir à l\'autre grace a ce forfait fait sur mesure pour les plus ouvert d\'entre vous', 2, 650);








