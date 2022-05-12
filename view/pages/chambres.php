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


    <div class="container-fluid chateau" id="carouselGlobal">
    <div class="row">
        <div class="col" id="carouselCol">
            <!-- <div id="bk"><img class="img-responsive" src="../images/background.jpg" alt="Responsive image"></div> -->
            <!-- <div class="row"> -->
                <!-- <div class="col" id="accueil"> -->
                    <h1>Le Chateau des esclaves</h1>
                    <h3>Pour retrouver les émotions de l'ancien temps</h3>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-fluid">
                                <div id="carousel">
                                    <div id="containerCarousel"></div>
                                    <img src="../images/fleche.jpg" alt="" class="bouton" id="d">
                                    <img src="../images/fleche.jpg" alt="" class="bouton" id="g">
                                </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <a href="#test" id="defilement"><img src="../images/defilement.png" alt="fleche"></a>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="../js/chambre.js"></script>

</body>
</html>