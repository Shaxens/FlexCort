<?php
require_once __DIR__ . './../model/includeModel.php';

$modeleManager = new ModeleManager();
$tableau = $modeleManager->creerListeModeleFormatJson();

header('Content-Type: application/json');
echo $tableau;
exit;
