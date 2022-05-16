let afficherTaches = document.getElementById("afficherCard");
afficherCard.innerHTML = ``;



window.onload = function() {
    fetch('../../controler/pageModeleControler.php', {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        })
        .then(response => response.json())
        .then(function(tableauModeles) {
            for (modele of tableauModeles) {
                console.log(modele);


                afficherCard.insertAdjacentHTML('beforeend', `
                    <div class="col-4 pb-4">
                        <div class="card zoomCard" style="width: 18rem;" name="${modele.idModele}">
                            <a type="button" href="./modeles/${modele.pseudo}.php">
                            <img src="../images/modeles/${modele.pseudo}.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">${modele.pseudo}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="./modeles/${modele.idModele}.php" class="btn btn-primary">Réservez-moi</a>
                            </div>
                        </div>
                    </div>
                    `);
            }

        })
}