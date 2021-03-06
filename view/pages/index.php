<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22256%22 height=%22256%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 rx=%2220%22 fill=%22%23b900bb%22></rect><path d=%22M37.53 22.37L67.41 22.37Q67.86 23.09 68.27 24.30Q68.67 25.52 68.67 26.96L68.67 26.96Q68.67 29.39 67.55 30.65Q66.42 31.91 64.53 31.91L64.53 31.91L42.84 31.91L42.84 46.22L64.36 46.22Q64.80 46.94 65.21 48.11Q65.61 49.28 65.61 50.72L65.61 50.72Q65.61 53.15 64.49 54.37Q63.36 55.58 61.47 55.58L61.47 55.58L43.02 55.58L43.02 76.91Q42.22 77.09 40.73 77.36Q39.24 77.63 37.63 77.63L37.63 77.63Q34.20 77.63 32.77 76.37Q31.32 75.11 31.32 72.14L31.32 72.14L31.32 28.58Q31.32 25.70 32.99 24.04Q34.66 22.37 37.53 22.37L37.53 22.37Z%22 fill=%22%23fff%22></path></svg>" />
    <title>FlexCort - Accueil</title>
</head>

<body>


    
    <?php include("navbar.php") ?>
    <!-- Gestion du Loader -->
    <div class="background container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5"></div>
            <div class="loader col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 w-100"><img src="../images/defilement.png" alt=""></div>
            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5"></div>
        </div>
    </div>
    <!-- Carousel avec effet parallax-->
    <div class="container-fluid parallax" id="carouselGlobal">
        <div class="row">
            <div class="col" id="carouselCol">
                <h1>FlexCort</h1>
                <h3>Parce que trouver un(e) escort n'a jamais ??t?? aussi simple</h3>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-fluid">
                        <h3 style="padding-bottom: 20px;">Les plus demand??(e)s : </h3>
                        <div id="carousel">
                            <div id="containerCarousel"></div>
                            <img src="../images/fleche.jpg" alt="" class="bouton" id="d">
                            <img src="../images/fleche.jpg" alt="" class="bouton" id="g">
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-fluid">
                        <a href="#test" id="defilement"><img src="../images/defilement.png" alt="fleche"></a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
        <!-- Texte sous carousel -->
    <div class="container" id="test">
        <div class="col" id="contenu">

            <div class="row">
                <div class="col">
                    <h1>Wouhouuu je suis une section</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1>Petits probl??mes</h1>
                    <p>Nous avons peut ??tre ??t?? trop ambitieux avec ce projet</p>
                    <p>Cette page en temoigne, apr??s d'innombrables heures ?? corriger des bugs et surtout chercher des solutions</p>
                    <p>De nombreuses features sont implant??s mais nous n'avons pas eu le temps de correctement les param??trer</p>
                </div>
                <div class="col">
                    <h1>Descriptif du projet</h1>
                    <p>FlexCort est une simulation de site d'escort (tourn?? de fa??on humouristique)</p>
                    <p>Un utilisateur peut et doit s'enregistrer pour passer une r??servation</p>
                    <p>Il doit ??galement ??tre connect??</p>
                    <p>Une fois identifi?? un utilisateur peut passer une r??servation, voir ses informations perso et consulter son panier</p>
                    <p>Une r??servation ne peut ??tre pass?? uniquement si la date voulue (date du d??but du forfait choisit) et les dates qui en d??coulent (date + 1, 2, ou 3 jour suivant le forfait) ne correspondent pas ?? une date o?? le modele choisi est r??serv??</p>
                    <p>Cette v??rification se fait dynamiquement sur le serveur grace ?? un algorithme</p>
                    <p>Nous voulions afficher les bons messages d'erreur si la r??servation n'est pas possible mais nous ne parvenions pas ?? correctement r??cup??rer la r??ponse du serveur pour la r??utiliser en front au bon endroit</p>
                    <p>Les methodes CRUD sont ??galement l??, nous devions param??trer un pannel administrateur pour pouvoir tout modifier ?? notre guise mais par manque de temps cela est impossible</p>
                </div>
            </div>
        </div>
    </div>
    

    <script src="../js/main.js"></script>
</body>

</html>