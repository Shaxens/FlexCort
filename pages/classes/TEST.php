<?PHP
require_once 'UtilisateurManager.php';

$utilisateurManager = new UtilisateurManager();

$utilisatest = $utilisateurManager->getUtilisateur('bxl@enForce.be');
echo $utilisatest->getNom();
echo $utilisatest->getPrenom();

