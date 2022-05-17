function afficherPanier(idModele) {
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

function fermerPanier() {
    let masquerPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    let checkbox = document.querySelectorAll(".radio");
    masquerPanier.style.width = "0";
    bouton.style.display = "none";
    afficherCard.style.opacity = "1";
}

function choixDate(idModele) {
    getDateModele(idModele);
    boutonSuivantPrecedent(idModele);
}