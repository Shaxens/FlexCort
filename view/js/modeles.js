let afficherTaches = document.getElementById("afficherCard");
afficherCard.innerHTML = ``;



window.onload = function getModeles() {
    fetch('../../controler/json/allModelesJson.php', {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        })
        .then(response => response.json())
        .then(function(tableauModeles) {
            for (modele of tableauModeles) {
                console.log(modele);


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
                        <button onclick="afficherPanier()" class="btn ">
                        <img src="../images/modeles/${modele.Pseudo}.jpg" class="card-img-top" alt="...">
                        </button>
                        <div class="card-body">
                            <h5 class="card-title">${modele.Pseudo}</h5>
                        </div>
                    </div>
                </div>
                `)
                }
            }
        })






}