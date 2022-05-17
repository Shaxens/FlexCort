let afficherTaches = document.getElementById("afficherCard");
let afficherForfait = document.getElementById("contenuForfait");
let afficherDate = document.getElementById("contenuDate");
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
                    <div style="width: 300px;" name="${modele.IdModele}">
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

function getForfaits(idModele) {
    fetch("../../controler/json/allForfaitJson.php", {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        }).then(response => response.json())
        .then(function(tableauForfaits) {
            afficherForfait.innerHTML = '';

            for (forfait of tableauForfaits) {
                afficherForfait.insertAdjacentHTML('beforeend', `
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <div name="forfait${forfait.IdForfait}">
                            <h4><label for="radioForfait${forfait.IdForfait}">${forfait.NomForfait}</label></h4>
                            <hr style="background-color: white;height: 5px;border-radius: 10px">
                            <input type="radio" id="radioForfait${forfait.IdForfait}" class="radio" name="forfaitRadio">
                            <label for="radioForfait${forfait.IdForfait}" class="forfaitPrix">${forfait.Prix} €</label for="radioForfait${forfait.IdForfait}">
                            <div class="card-body">
                                <label for="radioForfait${forfait.IdForfait}">${forfait.DescriptionForfait}</label>
                                <label for="radioForfait${forfait.IdForfait}">Durée : ${forfait.DureeForfait} jour(s)</label>
                            </div>
                        </div>
                    </div>
                </div>
                `);
            }
            for (modele of tableauForfaits) {
                if (modele.IdForfait == idModele) {
                    afficherForfait.insertAdjacentHTML('beforeend', `
                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-5">
                            <button onclick="choixDate(${modele.idModele})" class="btn btn-primary forfaitSuivant">Suivant</button>
                        </div>
                    </div>
                    `)
                }
            }

        })
}

/*
 * On envoie la date qui nous intéresse pour réserver
 */

function getDateModele(idModele) {
    fetch("../../controler/json/allReservationJson.php", {
            method: "PUT",
            body: JSON.stringify(),
            headers: { "Content-type": "application/json; charset=UTF-8" }
        }).then(response => response.json())
        .then(function(tableauForfaits) {

            afficherDate.insertAdjacentHTML('beforeend', `
            <input type="date" id="start" name="trip-start"
            value="2022-01-01"
            min="2022-01-01" max="2030-12-31">
            `);
            afficherDate.innerHTML = `
            <button onclick="afficherPanier(${idModele})" class="btn btn-primary btnDate">Précédent</button>
            <button onclick="choixDate(${idModele})" class="btn btn-primary btnDate">Confirmer</button>
            `;
        })
}

// function boutonSuivant(idModele) {
//     fetch('../../controler/json/allModelesJson.php', {
//             method: "GET",
//             headers: { "Content-type": "application/json; charset=UTF-8" }
//         })
//         .then(response => response.json())
//         .then(function(tableauModeles) {
//             for (modele of tableauModeles) {
//                 if (modele.IdModele == idModele) {
//                     afficherForfait.insertAdjacentHTML('beforeend', `
//                     <div class="row">
//                         <div class="col-7"></div>
//                         <div class="col-5">
//                             <button onclick="choixDate(${modele.idModele})" class="btn btn-primary forfaitSuivant">Suivant</button>
//                         </div>
//                     </div>
//                     `)
//                 }
//             }
//         })
// }