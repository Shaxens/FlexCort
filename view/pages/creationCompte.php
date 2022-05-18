
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22256%22 height=%22256%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 rx=%2220%22 fill=%22%23b900bb%22></rect><path d=%22M37.53 22.37L67.41 22.37Q67.86 23.09 68.27 24.30Q68.67 25.52 68.67 26.96L68.67 26.96Q68.67 29.39 67.55 30.65Q66.42 31.91 64.53 31.91L64.53 31.91L42.84 31.91L42.84 46.22L64.36 46.22Q64.80 46.94 65.21 48.11Q65.61 49.28 65.61 50.72L65.61 50.72Q65.61 53.15 64.49 54.37Q63.36 55.58 61.47 55.58L61.47 55.58L43.02 55.58L43.02 76.91Q42.22 77.09 40.73 77.36Q39.24 77.63 37.63 77.63L37.63 77.63Q34.20 77.63 32.77 76.37Q31.32 75.11 31.32 72.14L31.32 72.14L31.32 28.58Q31.32 25.70 32.99 24.04Q34.66 22.37 37.53 22.37L37.53 22.37Z%22 fill=%22%23fff%22></path></svg>" />
    <title>FlexCort - Création Compte</title>
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