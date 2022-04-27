<?PHP

//  <form action="classes/recupFormulaire.php" method="post"><form>

require_once 'UtilisateurManager.php';

$utilisateurManager = new UtilisateurManager();

if (isset($_POST['btnEnvoyer']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $utilisateur = new Utilisateur($nom,$prenom,$email,$mdp);
    $utilisateurManager->createUtilisateur($utilisateur);
}

if (isset($_POST['btnConnexion']))
{
    $email = $_POST['mail'];
    $mdp = $_POST['password'];
    $utilisateur = $utilisateurManager->getUtilisateur($email);
    if ($mdp == $utilisateur->getMdp())
    {
        echo $utilisateur->getPrenom() . "identifié";
    }
    else
    {
        echo "mdp incorrect";
    }
}






