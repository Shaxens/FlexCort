window.onload = function() {
    fetch("../../controler/json/getReservationByUtilisateur.php", {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        }).then(response => response.json())
        .then(function(tableauReservation) {
            for (reservation of tableauReservation) {
                let reservation = document.getElementById('mesReservations');
                reservation.insertAdjacentHTML = ('beforeend', `
                    <div class="row">
                    <div class="col"></div>
                    <div class="col-5 compte">
                        <form method="post">
                            <h2>Informations personnelles</h2>
                            <div class="row">
                                <div class="col">
                                    <label for="prenom">Numéro du modèle :</label>
                                    <input type="text" class="form-control"  id="idModeleRes${reservation.IdModele}" name="idModeleRes" value="${reservation.IdModele}">
                                </div>
                                <div class="col">
                                    <label for="nom">Numéro du forfait :</label>
                                    <input type="text" class="form-control" id="forfaitRes${reservation.IdForfait}" name="forfaitRes" value="${reservation.IdForfait}">
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="prixRes" class="form-label">Prix réservation :</label>
                                <input type="text" class="form-control" id="prixRes${reservation.PrixReservation}" name="prixRes" value="${reservation.PrixReservation}">
                            </div>
                            <div class="mb-3">
                                <label for="dateDebRes" class="form-label">Mot de passe :</label>
                                <input type="text" class="form-control" id="dateDebRes${reservation.PrixReservation}" name="dateDebRes" value="${reservation.DateDebut}">
                                <br>
                                <label for="dateFinRes" class="form-label">Mot de passe :</label>
                                <input type="text" class="form-control" id="dateFinRes${reservation.DateFin}" name="dateFinRes" value="${reservation.DateFin}">
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
                </div>
                `)
            }
        })
}