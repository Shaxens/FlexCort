<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Nos chambres</title>
</head>
<body>

    <?php include("navbar.php") ?>
<br>
<br>
<br>
<div class="container-fluid compte">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form>
                <div class="row">
                <div class="col">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" placeholder="Jacques" id="prenom">
                </div>
                <div class="col">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" placeholder="Dupont" id="nom">
                </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="email">
                    <div id="emailHelp" class="form-text">Nous ne partagerons pas votre adresse mail.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe </label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox">
                    <label class="form-check-label" for="checkbox">J'accepte les conditions d'utilisations et de ventes</label>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col"></div>
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