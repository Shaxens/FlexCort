function afficherPanier() {
    let afficherPanier = document.getElementById("panier");
    let afficherCard = document.getElementById("afficherCard");
    let div = `<div id="drawer" class="drawer"><button onclick="fermerPanier()" class="btn fa-solid fa-xmark fa-3x" id="croix"></button></div>`;
    afficherCard.style.opacity = "0.7";
    afficherPanier.innerHTML += div;
    afficherPanier.innerHTML += croix;
}

function fermerPanier() {
    let panier = document.getElementById("panier");
    let masquerPanier = document.getElementById("drawer");
    let afficherCard = document.getElementById("afficherCard");
    let bouton = document.getElementById("croix");
    masquerPanier.style.width = "0";
    bouton.style.display = "none"

    // panier.removeChild(masquerPanier);
    afficherCard.style.opacity = "1";
}

// function fermerPanier() {
//     let panier = document.getElementById("panier");
//     let masquerPanier = document.getElementById("drawer");
//     let afficherCard = document.getElementById("afficherCard");
//     let bouton = document.getElementById("croix");

//     masquerPanier.style.width = "0";
//     bouton.style.display = "none"
//     afficherCard.style.opacity = "1";
// }