<?PHP
require_once 'UtilisateurManager.php';

$utilisaTest = new Utilisateur('1234567891', 'Lourd', 'Jesus', 'filsDeDieu@god.win', 'trololo');
echo 'id = ', $utilisaTest->getId(), '<br>';
echo 'nom = ', $utilisaTest->getNom(), '<br>';
echo 'prenom = ', $utilisaTest->getPrenom(), '<br>';
echo 'mail = ', $utilisaTest->getMail(), '<br>';
echo 'mdp = ', $utilisaTest->getMdp(), '<br>';

$utilisateurManager = new UtilisateurManager();

$utilisateurManager->add($utilisaTest);
;
