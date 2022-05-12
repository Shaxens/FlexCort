<?PHP
require_once __DIR__ . './../model/entityManager/UtilisateurManager.php';

function connexion()
{
    $utilisateurManager = new UtilisateurManager();

    if (isset($_POST['btnConnexion']))
    {
        $email = htmlentities($_POST['mail']);
        $mdp = $_POST['password'];
        $utilisateur = $utilisateurManager->getUtilisateur($email);
        if ($mdp == $utilisateur->getMdp())
        {
            $_SESSION['utilisateurConnecte'] = $utilisateur;
            $_SESSION['connectOK'] = true;
            echo $_SESSION['utilisateurConnecte']->getPrenom() . ' connecté';
            header("Refresh:0; url=index.php");

        }
        else
        {
            echo "mdp incorrect";
        }
    }
}