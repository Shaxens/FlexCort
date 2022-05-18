function afficherPanier(idModele) {
    // if (pas connecté) {
    //     alert()
    // } else {

    // }
    let afficherPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    afficherCard.style.opacity = "0.7";
    afficherPanier.style.display = "block";
    afficherPanier.style.width = "23%";
    bouton.style.display = "block";
    getModeleById(idModele);
    getForfaits(idModele);
    boutonSuivant(idModele);


}

function radio(idModele) {

    let radio = document.getElementsByName('forfaitRadio');
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
    getIdForfaitByRadio();
    setDate(idModele);
    boutonConfirmerPrecedent(idModele);
}

function getIdForfaitByRadio() {

    var radios = document.querySelectorAll('[name="btnRadio"]');
    var valeur;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            valeur = radios[i].value;
        }
    }
    return valeur;

}