function afficherPanier(idModele) {
    let afficherPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let masquerDate = document.getElementById("contenuDate");
    let bouton = document.getElementById("croix");
    masquerDate.innerHTML = '';
    afficherCard.style.opacity = "0.7";
    afficherPanier.style.display = "block";
    afficherPanier.style.width = "23%";
    bouton.style.display = "block";
    getModeleById(idModele);
    getForfaits(idModele);
}

function fermerPanier() {
    let masquerPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    let checkbox = document.querySelectorAll(".radio");
    masquerPanier.style.width = "0";
    bouton.style.display = "none";
    for (element of checkbox) {
        element.style.width = "0";
    }
    afficherCard.style.opacity = "1";
}

function choixDate(idModele) {
    let masquerForfait = document.getElementById("contenuForfait");
    masquerForfait.innerHTML = '';
    getDateModele(idModele);
}