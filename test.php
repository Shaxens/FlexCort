<?php
require_once 'model/includeModel.php';

$modeleManager = new ModeleManager();
$utilisateurManager = new UtilisateurManager();

$listeModele = $modeleManager->getAllModele();
foreach ($listeModele as $modele)
{
    echo '<br>' . $modele->getPseudo();
}

$listeUtilisateur = $utilisateurManager->getAllUtilisateur();
foreach ($listeUtilisateur as $utilisateur)
{
    echo '<br>' . $utilisateur->getmail();
}

