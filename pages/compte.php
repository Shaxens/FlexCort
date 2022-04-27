<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
    <title>FlexCort</title>
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="container-fluid ">
        <div class="row">
            <div class="col blueBk">
                <h2>Menu</h2>
                <ul>
                    <li><a href="">Mes informations</a></li>
                    <li><a href="">Réservations passées</a></li>
                    <li><a href="">Mon panier</a></li>
                    <li><a href="">Annuler une réservation</a></li>
                </ul>
                
                
                
                
            </div>
            <div class="col">

            </div>
            <div class="col-5 compte">
                <form>
                    <h2>Informations personnelles</h2>
                    <div class="row">
                        <div class="col">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control" placeholder="Jacques" id="prenom" name="prenom" required>
                        </div>
                        <div class="col">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" placeholder="Dupont" id="nom" name="nom" required>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse mail :</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="FlexCort@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="mdp" required>
                    </div>
                </form>

                <h2>Mon panier</h2>
                <form action="">

                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>