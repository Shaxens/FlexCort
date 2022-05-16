<?php
require_once __DIR__ . './../../model/includeModel.php';

$forfaitManager = new ForfaitManager();
$tableau = $forfaitManager->creerListeForfaitFormatJson();

echo $tableau;
exit;