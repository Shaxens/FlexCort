function afficherPanier(IdModele) {
    let afficherPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    afficherCard.style.opacity = "0.7";
    afficherPanier.style.display = "block";
    afficherPanier.style.width = "400px";
    bouton.style.display = "block";
    getModeleById(IdModele);
}

function fermerPanier() {
    let masquerPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    masquerPanier.style.width = "0";
    bouton.style.display = "none";

    afficherCard.style.opacity = "1";
}