/*
 * On créer les images dans les divs en dynamiques (url dynamiques également)
 */



document.body.onload = function() {
    nbr = 5; // nombre d'images
    position = 0;
    container = document.getElementById("containerCarousel");
    g = document.getElementById("g");
    d = document.getElementById("d");
    container.style.width = (400 * nbr) + "px";
    for (i = 1; i <= nbr; i++) {
        div = document.createElement("div");
        div.className = "photo";
        div.style.backgroundImage = "url('../images/carousel/carousel" + i + ".jpg')";
        div.setAttribute("id", "image-" + i);
        container.appendChild(div);
    }
}

/*
 * On écoute les clics sur le carousel
 */

d.onclick = function() {
    let background = document.getElementById("carouselGlobal");
    if (position > -nbr + 1) {
        position--;
        background.classList.replace("parallaxVip", "parallax");
        background.style.transition = "all 0.5s ease-in-out";
        container.style.transform = "translate(" + position * 400 + "px)";
        container.style.transition = "all 0.5s ease";
        if (position == -4) {
            background.classList.replace("parallax", "parallaxVip");

        }
    } else {
        position = 0;
        background.classList.replace("parallaxVip", "parallax");
        background.style.transition = "all 0.5s ease-in-out";
        container.style.transform = "translate(" + -position * 400 + "px)";
        container.style.transition = "all 0.5s ease";
    }
}

g.onclick = function() {
    let background = document.getElementById("carouselGlobal");
    if (position < 0) {
        position++;
        background.classList.replace("parallaxVip", "parallax");
        background.style.transition = "all 0.5s ease-in-out";
        container.style.transform = "translate(" + position * 400 + "px)";
        container.style.transition = "all 0.5s ease";
    } else {
        position = -4;
        background.classList.replace("parallax", "parallaxVip");
        background.style.transition = "all 0.5s ease-in-out";
        container.style.transform = "translate(" + position * 400 + "px)";
        container.style.transition = "all 0.5s ease";
    }

}


/* 
 * Animation de défilement
 */

/*
var images = new Array();
images[1].push("image-1");
images[2].push("image-2");
images[3].push("image-3");

function changerImage() {
    document.getElementById("image-1").src = images[position];

    if (position < images.length - 1) {
        position++;
    } else {
        position = 0;
    }
    window.setInterval("ChangerImage()", 400);
}*/