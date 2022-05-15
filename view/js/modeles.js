let afficherTaches = document.getElementById("afficherCard");
afficherCard.innerHTML = '';



window.onload = function() {
    let listeModeles = [];
    const getPhp = "../../model/entityManager/ModeleManager.php"
    fetch(getPhp, {
        method: "GET",
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        },
        data: { functionname: 'getAllModele()' }
    }).then(reponse => {
        console.log(reponse);
        return reponse.json
    }).then(listeModeles => {
        const result = "<?php echo getAllModele()?>";
        listeModeles = result;
        console.log(listeModeles);

        for (modele of listeModeles) {
            if (modele.id == 0) {
                let modeleCard3 = `
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <div class="card zoomCard" style="width: 18rem;" name="${modele.pseudo}">
                            <a type="button" href="./modeles/${modele.pseudo}.php">
                            <img src="../images/modeles/${modele.pseudo}.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">${modele.pseudo}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="./modeles/${modele.pseudo}.php" class="btn btn-primary">Réservez-moi</a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                afficherCard.innerHTML += modeleCard3;
            }
            let modeleCard = `
            <div class="col">
                <div class="card zoomCard" style="width: 18rem;" name="${modele.pseudo}">
                    <a type="button" href="./modeles/${modele.pseudo}.php">
                    <img src="../images/modeles/${modele.pseudo}.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">${modele.pseudo}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="./modeles/${modele.pseudo}.php" class="btn btn-primary">Réservez-moi</a>
                    </div>
                </div>
            </div>
            `;
            if (modele % 3 == 0) {
                let modeleCard3 = `
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <div class="card zoomCard" style="width: 18rem;" name="${modele.pseudo}">
                            <a type="button" href="./modeles/${modele.pseudo}.php">
                            <img src="../images/modeles/${modele.pseudo}.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">${modele.pseudo}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="./modeles/${modele.pseudo}.php" class="btn btn-primary">Réservez-moi</a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                afficherCard.innerHTML += modeleCard3;
            } else {
                afficherCard.innerHTML += modeleCard
            }
        }

    });


}