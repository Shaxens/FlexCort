<?php
require_once __DIR__ . './../model/includeModel.php';

function deconnexion()
{
    if (isset($_POST['btnDeconnexion']))
    {
        $_SESSION['utilisateurConnecteIdMail'] = null;
        $_SESSION['connectOK'] = false;
        echo '<script language="JavaScript" type="text/javascript">
                window.location.replace("index.php");
              </script>';
    }
}
