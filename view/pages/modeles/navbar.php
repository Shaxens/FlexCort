<?php
session_start([
    'cookie_lifetime' => 86400,
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
</head>
<body>
<header>
<nav>
    <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="../modeles.php">Nos Modèles</a></li>
        <li><a href="../contact.php">Contact</a></li>
        <?php
        if (isset($_SESSION['connectOK']))
        {
            echo '<li><a href="../compte.php" id="profil">Mon compte</a></li>';
        }
        else
        {
            echo '<li><a href="../connexion.php" id="profil">Se connecter</a></li>';
        }
        ?>

    </ul>
</nav>
</header>
</body>
</html>