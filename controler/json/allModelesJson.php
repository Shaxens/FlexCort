<?php
require_once __DIR__ . './../../model/includeModel.php';

$modeleManager = new ModeleManager();
$tableau = $modeleManager->creerListeModeleFormatJson();

echo $tableau;
exit;

