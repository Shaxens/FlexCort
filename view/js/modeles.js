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
                            <button onclick="afficherPanier()" class="btn ">
                            <img src="../images/modeles/${modele.pseudo}.jpg" class="card-img-top" alt="...">
                            </button>
                            <div class="card-body">
                                <h5 class="card-title">${modele.pseudo}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <button onclick="afficherPanier()" class="btn btn-primary">Réservez-moi</button>
                            </div>
                        </div>
                    </div>
                    `);
            }

        })
}