
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
    <title>Nos chambres</title>
</head>
<body>
    <?php include("navbar.php") ?>

<div class="container-fluid connexion">
    <div class="row">
        <div class="col pinup1">
            <img src="../images/pinup1.jpg" alt="">
        </div>
        <div class="col-5">
            <form action="classes/recupFormulaire.php" method="post">
                <div class="row">
                    <div class="col">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" placeholder="Jacques" id="prenom" name="prenom" required>
                    </div>
                    <div class="col">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" placeholder="Dupont" id="nom" name="nom" required>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="FlexCort@gmail.com" required>
                    <div id="emailHelp" class="form-text">Votre adresse mail ne sera pas divulguée.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe </label>
                    <input type="password" class="form-control" id="password" name="mdp" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" required>
                    <label class="form-check-label" for="checkbox">J'accepte les <a href="cgv.php"> conditions d'utilisations et de ventes</a></label>
                </div>
                <div class="mb-3">
                    <label for="date">Entrez votre date de naissance : </label>

                    <input type="date" id="date" name="date" value="" required>
                </div>
                <button type="submit" class="btn btn-primary" name = "btnEnvoyer">Envoyer</button>
            </form>
        </div>
        <div class="col pinup2">
            <img src="../images/pinup2.jpg" alt="">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>


</body>
</html>

<?php

require_once 'classes/UtilisateurManager.php';

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