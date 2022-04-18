<?PHP
require_once 'UtilisateurManager.php';

$utilisateurManager = new UtilisateurManager();

$utilisatest = $utilisateurManager->getUtilisateur('lourd@jesus');

$utilisateurManager->updateMailUtilisateur('lourd@jesus', 'theRealBoss@god.win');

