let afficherTaches = document.getElementById("afficherCard");
let afficherForfait = document.getElementById("contenuForfait");
afficherCard.innerHTML = ``;

/*
 * On récupère tous les modèles et on les ajoute dans le html
 */

window.onload = function getModeles() {
    fetch('../../controler/json/allModelesJson.php', {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        })
        .then(response => response.json())
        .then(function(tableauModeles) {
            for (modele of tableauModeles) {
                afficherCard.insertAdjacentHTML('beforeend', `
                    <div class="col-4 pb-4">
                        <div class="card zoomCard" style="width: 18rem;" name="${modele.IdModele}">
                            <button onclick="afficherPanier(${modele.IdModele})" class="btn ">
                            <img src="../images/modeles/${modele.Pseudo}.jpg" class="card-img-top" alt="...">
                            </button>
                            <div class="card-body">
                                <h5 class="card-title">${modele.Pseudo}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <button onclick="afficherPanier(${modele.IdModele})" class="btn btn-primary">Réservez-moi</button>
                            </div>
                        </div>
                    </div>
                    `);
            }

        })
}

/*
 * On récupère le modèle par ID (utilisé pour le panier)
 */

function getModeleById(idModele) {
    fetch('../../controler/json/allModelesJson.php', {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        })
        .then(response => response.json())
        .then(function(tableauModeles) {
            for (modele of tableauModeles) {
                if (modele.IdModele == idModele) {
                    let drawer = document.getElementById("contenuDrawer");
                    drawer.innerHTML = '';
                    drawer.insertAdjacentHTML('beforeend', `
                <div>
                    <div style="width: 240px;" name="${modele.IdModele}">
                        <img src="../images/modeles/${modele.Pseudo}.jpg" class="card-img-top" alt="..." style="border-bottom-right-radius: 30px;">
                        <div class="card-body">
                            <h5 class="modeleDrawer">${modele.Pseudo}</h5>
                            <h5 class="modeleDrawer">${modele.DateNaissance}</h5>
                        </div>
                    </div>
                </div>
                `)
                }
            }
        })
}

/*
 * On récupère tous les forfaits disponibles
 */

function getForfaits() {
    fetch("../../controler/json/allForfaitJson.php", {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        }).then(response => response.json())
        .then(function(tableauForfaits) {
            afficherForfait.innerHTML = '';

            for (forfait of tableauForfaits) {
                afficherForfait.insertAdjacentHTML('beforeend', `
                <div class="row">
                <div class="col-7"></div>
                <div class="col-5">
                    <div name="forfait${forfait.IdForfait}">
                        <h4>${forfait.NomForfait}</h4>
                        <hr size="5px" style="color: white;">
                        <input type="checkbox" id="checkboxForfait" class="checkbox">
                        <span class="forfaitPrix">${forfait.Prix} €</span>
                        <div class="card-body">
                            <p>${forfait.DescriptionForfait}</p>
                        </div>
                    </div>
                </div>
                </div>

                `);
            }
            afficherForfait.insertAdjacentHTML('beforeend', `
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5">
                <button onclick="choixPrestations(${modele.IdModele})" class="btn btn-primary forfaitSuivant">Suivant</button>
                </div>
            </div>
            `)
        })
}