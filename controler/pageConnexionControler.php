<?PHP
require_once __DIR__ . './../model/includeModel.php';

function connexion()
{
    $utilisateurManager = new UtilisateurManager();

    if (isset($_POST['btnConnexion']))
    {
        $email = htmlentities($_POST['mail']);
        $mdp = htmlentities($_POST['password']);
        $utilisateur = $utilisateurManager->getUtilisateur($email);
        if ($mdp == $utilisateur->getMdp())
        {
            $_SESSION['utilisateurConnecteIdMail'] = $email;
            $_SESSION['connectOK'] = true;
            echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php");
                  </script>';
        }
    }
}