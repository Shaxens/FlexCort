let afficherTaches = document.getElementById("afficherCard");
afficherCard.innerHTML = ``;



window.onload = function() {
        fetch('../../controler/pageModeleControler.php', {
            method: "GET",
            headers: {"Content-type": "application/json; charset=UTF-8"}
        })
            .then(response => response.json())
            .then(function(tableauModeles)
            {
                for (modele of tableauModeles) {
                    console.log(modele);
                }
            })
            .catch(erreur => console.log(erreur))
}