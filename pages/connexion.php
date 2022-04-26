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
    <?php include("navbar.php")?>

    <div>
        <img src="../images/connexion/doigts.png" alt="" id="doigts">
        <img src="../images/connexion/shh.png" alt="" id="shh">
    </div>
    <div class="container-fluid compte">
        <h2 style="text-align: center;">Connexion</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="mail">Adresse Mail :</label>
                            <input type="text" name="mail" class="form-control" id="email" placeholder="FlexCort@gmail.com" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                    </div>
                <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <p>Vous n'avez pas de compte ? Vous pouvez en créer un <a href="creationCompte.php">ici</a> !</p>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

</body>
</html>