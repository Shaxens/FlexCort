function afficherPanier(idModele) {
    // if (pas connecté) {
    //     alert()
    // } else {

    // }
    let afficherPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    let radio = document.getElementsByName('btnRadio');
    afficherCard.style.opacity = "0.7";
    afficherPanier.style.display = "block";
    afficherPanier.style.width = "23%";
    bouton.style.display = "block";
    getModeleById(idModele);
    getForfaits(idModele);
    let idForfait = null;
    if (!radio.checked) {
        idForfait = document.querySelector('[name="btnRadio"]:checked');
        console.log(idForfait);
    }
    boutonSuivant(idModele, idForfait);
}

function radio(idModele) {
    let radio = document.getElementsByName('btnRadio');
    let btnSuivant = document.getElementById('btnSuivant');
    if (!radio.checked) {
        btnSuivant.style.display = "block";

    }
}

function fermerPanier() {
    let masquerPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    masquerPanier.style.width = "0";
    bouton.style.display = "none";
    afficherCard.style.opacity = "1";
    console.log(document.getElementById('idModele').value); // OK
    console.log(document.getElementById("calendrier").value); // OK
    console.log(document.getElementById('idForfait').value); // Pas bon

}

function choixDate(idModele) {
    let idForfait = getIdForfaitByRadio();
    setDate(idModele);
    boutonConfirmerPrecedent(idModele, idForfait);
}

function getIdForfaitByRadio() {
    var radios = document.querySelector('[name="btnRadio"]:checked');
    console.log(radios.value);
    return radios.value;
}