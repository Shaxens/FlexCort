<?PHP
require_once 'UtilisateurManager.php';

$utilisateurManager = new UtilisateurManager();

$utilisateur = new Utilisateur('juda', 'infame', 'testadresser@gmail','blabla');
$utilisateurManager->createUtilisateur($utilisateur);

